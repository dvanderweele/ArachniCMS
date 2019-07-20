<?php

namespace App\Http\Controllers;

use Newsletter;
use App\Settings;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
  public function store(Request $request)
  {
    $settings = Settings::firstOrFail();
    switch($settings->enable_subscribe_form){
      case false:
        return redirect('/posts');
        break;
      default: 
        $request->validate([
          'email' => 'required|email',
        ]);
        if(Newsletter::isSubscribed($request->email)){
          return redirect('/posts');
        } else {
          Newsletter::subscribe($request->email);
        }
    }
    $request->session()->flash('sub_success', true);
    return redirect('/thankyou');
  }

  public function show(Request $request){
    if($request->session()->get('sub_success', false) == true){
      $settings = Settings::firstOrFail();
      return view('thankyou')->with('settings', $settings);
    } else {
      return redirect('/posts');
    }
  }
}
