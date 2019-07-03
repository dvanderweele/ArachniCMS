<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
  public function show(){
    $settings = Settings::first();
    if($settings == null){
      $settings = new Settings();
      $settings->view_count_policy = true;
      $settings->comment_lock_policy = false;
      $settings->comment_approval_policy = false;
      $settings->landing_header = null;
      $settings->landing_tagline = null;
      $settings->text_selection_policy = false;
      $settings->contact_form_email = auth()->user()->email;
      $settings->font_pref = 'gsa';
      $settings->save();
      return view('settings.show')->with([
        'settings' => $settings
      ]);
    } else {
      return view('settings.show')->with([
        'settings' => $settings
      ]);
    }
  }

  public function update(Request $request){
    $settings = Settings::firstOrFail();
    $request->validate([
      'viewCountPolicy' => 'required',
      'commentLockPolicy' => 'required',
      'commentApprovalPolicy' => 'required',
      'landingHeader' => 'nullable',
      'landingTagline' => 'nullable',
      'textSelectionPolicy' => 'required',
      'contactFormEmail' => 'required|email',
      'fontPref' => 'required'
    ]);
    $settings->view_count_policy = $request->viewCountPolicy == 'true' ? true : false;
    $settings->comment_lock_policy = $request->commentLockPolicy == 'true' ? true : false;
    $settings->landing_header = $request->landingHeader;
    $settings->landing_tagline = $request->landingTagline;
    $settings->text_selection_policy = $request->textSelectionPolicy == 'true' ? true : false;
    $settings->contact_form_email = $request->contactFormEmail;
    // determine font pref
    switch($request->fontPref) {
      case 'generic-sans': 
        $settings->font_pref = 'gsa';
        break;
      case 'generic-serif': 
        $settings->font_pref = 'gse';
        break;
      case 'generic-mono': 
        $settings->font_pref = 'gmo';
        break;
      case 'alegreya-sans': 
        $settings->font_pref = 'asa';
        break;
      case 'alegreya-serif': 
        $settings->font_pref = 'ase';
        break;
      case 'fira-code': 
        $settings->font_pref = 'fco';
        break;
      case 'hack': 
        $settings->font_pref = 'hac';
        break;
      case 'montserrat': 
        $settings->font_pref = 'mon';
        break;
      case 'quicksand': 
        $settings->font_pref = 'qui';
        break;
      default: 
        $settings->font_pref = 'gsa';        
    }
    $settings->save();
    return view('settings.show')->with([
      'settings' => $settings
    ]);
  }
}
