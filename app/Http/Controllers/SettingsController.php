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
      'fontPref' => 'required',
      'enableSubscription' => 'required',
      'subscribe_form_title' => 'nullable',
      'subscribe_form_copy' => 'nullable',
      'thank_you_title' => 'nullable',
      'thank_you_copy' => 'nullable',
      'enableBackups' => 'required',
      'facebook' => 'nullable',
      'instagram' => 'nullable',
      'twitter' => 'nullable',
      'pinterest' => 'nullable',
      'youtube' => 'nullable',
      'linkedin' => 'nullable',
      'github' => 'nullable',
      'themePref' => 'required',
      'patreon' => 'nullable',
      'liberapay' => 'nullable'
    ]);
    $settings->enable_backups = $request->enableBackups == 'true' ? true : false;
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
    // determine theme pref
    switch($request->themePref) {
      case 'gray': 
        $settings->theme_pref = 'gray';
        break;
      case 'red': 
        $settings->theme_pref = 'red';
        break;
      case 'orange': 
        $settings->theme_pref = 'orange';
        break;
      case 'yellow': 
        $settings->theme_pref = 'yellow';
        break;
      case 'green': 
        $settings->theme_pref = 'green';
        break;
      case 'teal': 
        $settings->theme_pref = 'teal';
        break;
      case 'blue': 
        $settings->theme_pref = 'blue';
        break;
      case 'indigo': 
        $settings->theme_pref = 'indigo';
        break;
      case 'violet': 
        $settings->theme_pref = 'violet';
        break;
      case 'pink': 
        $settings->theme_pref = 'pink'; 
        break;
      default: 
        $settings->theme_pref = 'gray';        
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
          'hero_description' => 'required|min:2'
        ]);
        $filenameWithExt = $request->file('hero_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('hero_image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('hero_image')->storeAs('public', $fileNameToStore);

        $settings->hero_location = $fileNameToStore;
        $settings->hero_description = $request->hero_description;
      }
    }
    switch($request->enableSubscription) {
      case "true": 
        $settings->enable_subscribe_form = true;
        break;
      default: 
        $settings->enable_subscribe_form = false;
    }
    switch($request->subscribe_form_title) {
      case null: 
        $settings->subscribe_form_title = null;
        break;
      default: 
        $settings->subscribe_form_title = $request->subscribe_form_title;
    }
    switch($request->subscribe_form_copy) {
      case null: 
        $settings->subscribe_form_copy = null;
        break;
      default: 
        $settings->subscribe_form_copy = $request->subscribe_form_copy;
    }
    switch($request->thank_you_title) {
      case null: 
        $settings->thank_you_title = null;
        break;
      default: 
        $settings->thank_you_title = $request->thank_you_title;
    }
    switch($request->thank_you_copy) {
      case null: 
        $settings->thank_you_copy = null;
        break;
      default: 
        $settings->thank_you_copy = $request->thank_you_copy;
    }
    if($request->facebook == null && $request->instagram == null && $request->twitter == null && $request->pinterest == null && $request->youtube == null && $request->linkedin == null && $request->github == null){
      $settings->has_social_media = false;
    } else {
      $settings->has_social_media = true;
      $settings->facebook = $request->facebook == null ? null : $request->facebook;
      $settings->instagram = $request->instagram == null ? null : $request->instagram;
      $settings->twitter = $request->twitter == null ? null : $request->twitter;
      $settings->pinterest = $request->pinterest == null ? null : $request->pinterest;
      $settings->youtube = $request->youtube == null ? null : $request->youtube;
      $settings->linkedin = $request->linkedin == null ? null : $request->linkedin;
      $settings->github = $request->github == null ? null : $request->github;
    }
    $settings->patreon_url = $request->patreon == null ? null : $request->patreon;
    $settings->liberapay_url = $request->liberapay == null ? null : $request->liberapay;
    $settings->save();
    return view('settings.show')->with([
      'settings' => $settings
    ]);
  }
}
