<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    if($request->hasFile('logo'))
    {
      if($request->logo_description == null){
        return redirect()->back();
      } else {
        // first let's get rid of the old image if there is one
        if($settings->logo_location != null){
          Storage::delete($settings->logo_location);
        }
        // let's validate and store that logo
        $request->validate([
          'logo' => 'image|dimensions:min_width=500,max_width=800,min_height=100,max_height=300|max:1999',
          'logo_description' => 'required|min:2'
        ]);
        $filenameWithExt = $request->file('logo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('logo')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('logo')->storeAs('public', $fileNameToStore);

        $settings->logo_location = $fileNameToStore;
        $settings->logo_description = $request->logo_description;
      }
    }
    if($request->hasFile('hero_image'))
    {
      if($request->hero_description == null){
        return redirect()->back();
      } else {
        // first let's get rid of the old image if there is one
        if($settings->hero_location != null){
          Storage::delete($settings->hero_location);
        }
        // let's validate and store that logo
        $request->validate([
          'hero_image' => 'image|required|max:1999',
          'logo_description' => 'required|min:2'
        ]);
        $filenameWithExt = $request->file('hero_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('hero_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('hero_image')->storeAs('public', $fileNameToStore);

        $settings->hero_location = $fileNameToStore;
        $settings->hero_description = $request->logo_description;
      }
    }
    $settings->save();
    return view('settings.show')->with([
      'settings' => $settings
    ]);
  }
}
