@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
@endsection

@section('css')
  @include('includes.default-css')
@endsection

@section('nav')
  @include('includes.default-nav')
@endsection

@section('content')
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans relative">
    <div class="flex flex-row">
      <h1 class="font-semibold text-2xl text-copy-primary mb-4">
        Global Site Settings
      </h1>
    </div>
    <form action="/settings" method="post" enctype="multipart/form-data">
      @csrf 
      @method('PUT')
      <div class="flex flex-col items-start mb-4">
        <label for="name" class="font-semibold mb-2 text-copy-secondary">
          Publicize Blog Post View Count
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>While this is set to true, visitors to your site will be able to see the view count for each of your blog posts, just like you can. When it is set to false, this information will be private and only you can view it.</small>
        </p>
        <div class="inline-block relative w-full">
          <select name="viewCountPolicy" class="block appearance-none w-full bg-background-secondary text-copy-secondary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('viewCountPolicy') border-solid border-red-600 border-2 @enderror" required>
            <option value="true" {{ $settings->view_count_policy ? 'selected' : '' }}>True</option>
            <option value="false" {{ !$settings->view_count_policy ? 'selected' : '' }}>False</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-copy-primary">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="name" class="font-semibold mb-2 text-copy-secondary">
          Automatically Lock Comments on Future Blog Posts
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>While this is set to true, all blog posts created will not permit visitors to create comments. While it is set to false, all blog posts created will permit visitors to create comments. Note that changing this setting does not affect whether or not comments are locked on previously created blog posts. You can always lock or unlock comments on the individual edit pages of existing blog posts.</small>
        </p>
        <div class="inline-block relative w-full">
          <select name="commentLockPolicy" class="block appearance-none w-full bg-background-secondary text-copy-secondary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('commentLockPolicy') border-solid border-red-600 border-2 @enderror" required>
            <option value="true" {{ $settings->comment_lock_policy ? 'selected' : '' }}>True</option>
            <option value="false" {{ !$settings->comment_lock_policy ? 'selected' : '' }}>False</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-copy-primary">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="name" class="font-semibold mb-2 text-copy-secondary">
          Automatically Approve Comments
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>While this is set to true, all comments successfully created anywhere on your blog will be automatically approved without any intervention from you. While it is set to false, all comments successfully created anywhere on your blog will by default be unapproved, requiring your manual approval for them to appear publically below your blog posts. Note that changing this setting does not affect previously approved or unapproved comments.</small>
        </p>
        <div class="inline-block relative w-full">
          <select name="commentApprovalPolicy" class="block appearance-none w-full bg-background-secondary text-copy-secondary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('commentApprovalPolicy') border-solid border-red-600 border-2 @enderror" required>
            <option value="true" {{ $settings->comment_approval_policy ? 'selected' : '' }}>True</option>
            <option value="false" {{ !$settings->comment_approval_policy ? 'selected' : '' }}>False</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-copy-primary">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="name" class="font-semibold mb-2 text-copy-secondary">
          Landing Page Header
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>The text that you put here will become the header on the landing page of the site. It is advised to put something here, otherwise your site visitors will see the name of this CMS software.</small>
        </p>
        <input type="text" name="landingHeader" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('landingHeader') border-solid border-red-600 border-2 @enderror" value="{{ $settings->landing_header != null ? $settings->landing_header : '' }}" placeholder="ArachniCMS">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="name" class="font-semibold mb-2 text-copy-secondary">
          Landing Page Tagline
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>The text that you put here will become displayed on the landing page in smaller text right below the site header. It's a good place to put a slogan associated with your brand, or perhaps a reference to an upcoming event or sale associated with your brand. If you don't put anything here, visitors to your site won't see anything in that location.</small>
        </p>
        <input type="text" name="landingTagline" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('landingTagline') border-solid border-red-600 border-2 @enderror" value="{{ $settings->landing_tagline != null ? $settings->landing_tagline : '' }}">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="name" class="font-semibold mb-2 text-copy-secondary">
          Allow Blog Post Text Selection
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>When this is set to true, your blog posts will allow visitors to utilize their mouse cursor to select and then copy and paste portions of your blog posts. When this is set to false, they won't be able to do this. It is important to note that this is only a soft measure, and it isn't intended to be rock-solid DRM technology. In other words, while setting this to false may help deter low-effort, unskilled attempts at copyright infringement, savvy web browser users will be able to get around this measure.</small>
        </p>
        <div class="inline-block relative w-full">
          <select name="textSelectionPolicy" class="block appearance-none w-full bg-background-secondary text-copy-secondary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('textSelectionPolicy') border-solid border-red-600 border-2 @enderror" required>
            <option value="true" {{ $settings->text_selection_policy ? 'selected' : '' }}>True</option>
            <option value="false" {{ $settings->text_selection_policy ? '' : 'selected' }}>False</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-copy-primary">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="name" class="font-semibold mb-2 text-copy-secondary">
          Contact Form Email
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>If you would like to have your contact form submissions sent to an email address other than your login email, put that here. Otherwise, all such submissions will be sent to your login email address.</small>
        </p>
        <input type="text" name="contactFormEmail" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('contactFormEmail') border-solid border-red-600 border-2 @enderror" value="{{ $settings->contact_form_email }}" placeholder="{{ auth()->user()->email }}">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="logo_file_input" class="font-semibold mb-2 text-copy-secondary">
          Logo Image
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>This is optional but highly recommended. The file you upload here will be the logo displayed in the navigation area at the top of the site. If you don't upload one, users will see the name of this software instead. The ideal dimensions of your logo would be something like 650 pixels wide and 200 pixels high, including a bit of embedded padding. However, the upload will allow an image with the following dimensional parameters: minimum height - 100 pixels; maximum height - 300 pixels; minimum width - 500 pixels; maximum width - 800 pixels. Like other images, upload size is limited to 2MB.</small>
        </p>
        @if($settings->logo_location == null)
          <p class="mb-2 text-copy-secondary">
            <small>Looks like you haven't uploaded a logo yet. Go ahead!</small>
          </p>
        @else 
          <p class="mb-2 text-copy-secondary">
            <small>Looks like you've already uploaded a logo. You don't have to upload anything here again, unless of course you want to replace the logo with another one.</small>
          </p>
        @endif
        <input type="file" name="logo" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('logo') border-solid border-red-600 border-2 @enderror" id="logo_file_input">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="logo_description_input" class="font-semibold mb-2 text-copy-secondary">
          Logo Description
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>If you are uploading a logo, you are required to provide a written description of it here. This is to make your site more accessible, such as for users with screen readers or in poor network conditions. If you've already uploaded a logo in the past, you'll find your existing description below. Changes to it will only be saved if you are uploading a new logo.</small>
        </p>
        <input type="text" name="logo_description" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('logo_description') border-solid border-red-600 border-2 @enderror" placeholder="This is a pretty nifty logo, eh?" value="{{ $settings->logo_description == null ? '' : $settings->logo_description }}" id="logo_description_input">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="hero_image_input" class="font-semibold mb-2 text-copy-secondary">
          Hero Image
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>This is also optional but highly recommended. The file you upload here will be the "hero image" displayed as the background on the landing page. If you don't upload one, users will see a plain background color instead. There are no limits aspect ratio limits, but keep in mind that images with extreme aspect ratios may end up looking very weird in your users' browsers. Like other images, upload size is limited to 2MB.</small>
        </p>
        @if($settings->hero_location == null)
          <p class="mb-2 text-copy-secondary">
            <small>Looks like you haven't uploaded a hero image yet. Go ahead!</small>
          </p>
        @else 
          <p class="mb-2 text-copy-secondary">
            <small>Looks like you've already uploaded a hero image. You don't have to upload anything here again, unless of course you want to replace the hero image with another one.</small>
          </p>
        @endif
        <input type="file" name="hero_image" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('hero_image') border-solid border-red-600 border-2 @enderror" id="hero_image_input">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="subscribe_form_title_input" class="font-semibold mb-2 text-copy-secondary">
          Hero Description
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>If you are uploading a hero image for your landing page, you are required to provide a written description of it here. This is to make your site more accessible, such as for users with screen readers or in poor network conditions. If you've already uploaded a hero image in the past, you'll find your existing description below. Changes to it will only be saved if you are uploading a new hero image.</small>
        </p>
        <input id="subscribe_form_title_input" type="text" name="subscribe_form_title" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('subscribe_form_title') border-solid border-red-600 border-2 @enderror" placeholder="This is a pretty nifty logo, eh?" value="{{ $settings->subscribe_form_title == null ? '' : $settings->subscribe_form_title }}">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="enableSubscription" class="font-semibold mb-2 text-copy-secondary">
          Enable Email List Subscriptions
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>ArachniCMS comes with a simple, no fuss integration with MailChimp, so you can use your website to capture emails and start building your audience! The email capture form will display at the end of each blog post as well as on the bottom of the landing page. Once you've started gathering emails, use the handy tools over at MailChimp to starting marketing. In order to use this feature, the environment file will need to have been filled out with your MailChimp account details during the deployment of ArachniCMS to your web host. That's why this setting defaults to false. You should not enable this setting (and therefore start displaying the email collection form), unless your environment file has the appropriate MailChimp credentials configured. Contact Arachnidev LLC if you need help!</small>
        </p>
        <div class="inline-block relative w-full">
          <select name="enableSubscription" class="block appearance-none w-full bg-background-secondary text-copy-secondary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('enableSubscription') border-solid border-red-600 border-2 @enderror" required>
            <option value="true" {{ $settings->enable_subscribe_form ? 'selected' : '' }}>True</option>
            <option value="false" {{ $settings->enable_subscribe_form ? '' : 'selected' }}>False</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-copy-primary">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="subscribe_form_title" class="font-semibold mb-2 text-copy-secondary">
          Subscribe Form Title
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>Leave this blank if you have not enabled the email list subscription form. If you do not provide a custom title here for the email subscription form when it is enabled, the title will default to "Subscribe".</small>
        </p>
        <input id="subscribe_form_title" type="text" name="subscribe_form_title" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('subscribe_form_title') border-solid border-red-600 border-2 @enderror" placeholder="Subscribe" value="{{ $settings->subscribe_form_title == null ? '' : $settings->subscribe_form_title }}">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="subscribe_form_copy" class="font-semibold mb-2 text-copy-secondary">
          Subscribe Form Copy
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>Leave this blank if you have not enabled the email list subscription form. If you do not provide custom copy here for the email subscription form when it is enabled, the form will default to saying "Thank you for visiting! Please consider subscribing to the email list:".</small>
        </p>
        <input id="subscribe_form_copy" type="text" name="subscribe_form_copy" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('subscribe_form_copy') border-solid border-red-600 border-2 @enderror" placeholder="Thank you for visiting! Please consider subscribing to the email list:" value="{{ $settings->subscribe_form_copy == null ? '' : $settings->subscribe_form_copy }}">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="thank_you_title" class="font-semibold mb-2 text-copy-secondary">
          Thank You Page Title
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>Leave this blank if you have not enabled the email list subscription form. If you do not provide a custom title here for the thank you page that is displayed when people subscribe to your email list, the title will default to "Thank You!".</small>
        </p>
        <input id="thank_you_title" type="text" name="thank_you_title" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('thank_you_title') border-solid border-red-600 border-2 @enderror" placeholder="Thank You!" value="{{ $settings->thank_you_title == null ? '' : $settings->thank_you_title }}">
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="thank_you_copy" class="font-semibold mb-2 text-copy-secondary">
          Thank You Page Copy
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>Leave this blank if you have not enabled the email list subscription form. If you do not provide custom copy here for the thank you page that is displayed when people subscribe to your email list, the page will default to saying "Your subscription means a lot!".</small>
        </p>
        <input id="thank_you_copy" type="text" name="thank_you_copy" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('thank_you_copy') border-solid border-red-600 border-2 @enderror" placeholder="Your subscription means a lot!" value="{{ $settings->thank_you_copy == null ? '' : $settings->thank_you_copy }}">
      </div>
      <div class="flex flex-col items-start mb-4 py-4 text-copy-secondary">
        <p class="font-semibold text-xl mb-2">
          Font Preference
        </p>
        <p class="mb-2">
          <small>Your selection here determines which font will be preferred for key areas of your website like blog posts and your landing page.</small>
        </p>
        <div class="py-4 pl-2 my-2 flex flex-row justify-between focus:text-copy-primary bg-background-secondary rounded-lg font-sans pr-6">
          <input type="radio" name="fontPref" id="generic-sans" value="generic-sans" class="mr-6" {{ $settings->font_pref == 'gsa' ? 'checked' : '' }}>
          <label for="generic-sans">
            <p class="font-semibold text-lg mb-2">Generic Sans</p>
            <p class="mb-2"><small>Sample:</small></p>
            <p class="font-semibold text-lg mb-2">The Quick Brown Fox Jumps Over The Lazy Dog</p>
            <p>Jived fox nymph grabs quick waltz. Glib jocks quiz nymph to vex dwarf. Sphinx of black quartz, judge my vow. How vexingly quick daft zebras jump! The five boxing wizards jump quickly. Pack my box with five dozen liquor jugs.</p>
          </label>
        </div>
        <div class="py-4 pl-2 my-2 flex flex-row justify-between focus:text-copy-primary bg-background-secondary rounded-lg font-serif pr-6">
          <input type="radio" name="fontPref" id="generic-serif" value="generic-serif" class="mr-6" {{ $settings->font_pref == 'gse' ? 'checked' : '' }}>
          <label for="generic-serif">
            <p class="font-semibold text-lg mb-2">Generic Serif</p>
            <p class="mb-2"><small>Sample:</small></p>
            <p class="font-semibold text-lg mb-2">The Quick Brown Fox Jumps Over The Lazy Dog</p>
            <p>Jived fox nymph grabs quick waltz. Glib jocks quiz nymph to vex dwarf. Sphinx of black quartz, judge my vow. How vexingly quick daft zebras jump! The five boxing wizards jump quickly. Pack my box with five dozen liquor jugs.</p>
          </label>
        </div>
        <div class="py-4 pl-2 my-2 flex flex-row justify-between focus:text-copy-primary bg-background-secondary rounded-lg font-mono pr-6">
          <input type="radio" name="fontPref" id="generic-mono" value="generic-mono" class="mr-6" {{ $settings->font_pref == 'gmo' ? 'checked' : '' }}>
          <label for="generic-mono">
            <p class="font-semibold text-lg mb-2">Generic Mono</p>
            <p class="mb-2"><small>Sample:</small></p>
            <p class="font-semibold text-lg mb-2">The Quick Brown Fox Jumps Over The Lazy Dog</p>
            <p>Jived fox nymph grabs quick waltz. Glib jocks quiz nymph to vex dwarf. Sphinx of black quartz, judge my vow. How vexingly quick daft zebras jump! The five boxing wizards jump quickly. Pack my box with five dozen liquor jugs.</p>
          </label>
        </div>
        <div class="py-4 pl-2 my-2 flex flex-row justify-between focus:text-copy-primary bg-background-secondary rounded-lg font-alegreya-sans pr-6">
          <input type="radio" name="fontPref" id="alegreya-sans" value="alegreya-sans" class="mr-6" {{ $settings->font_pref == 'asa' ? 'checked' : '' }}>
          <label for="alegreya-sans">
              <p class="font-semibold text-lg mb-2">Alegreya Sans</p>
              <p class="mb-2 "><small>Sample:</small></p>
              <p class="font-semibold text-lg mb-2 font-alegreya-sans-sc">The Quick Brown Fox Jumps Over The Lazy Dog</p>
              <p class="">Jived fox nymph grabs quick waltz. Glib jocks quiz nymph to vex dwarf. Sphinx of black quartz, judge my vow. How vexingly quick daft zebras jump! The five boxing wizards jump quickly. Pack my box with five dozen liquor jugs.</p>
            </label>
        </div>
        <div class="py-4 pl-2 my-2 flex flex-row justify-between focus:text-copy-primary bg-background-secondary rounded-lg font-alegreya pr-6">
          <input type="radio" name="fontPref" id="alegreya-serif" value="alegreya-serif" class="mr-6" {{ $settings->font_pref == 'ase' ? 'checked' : '' }}>
          <label for="alegreya-serif">
            <p class="font-semibold text-lg mb-2">Alegreya Serif</p>
            <p class="mb-2"><small>Sample:</small></p>
            <p class="font-semibold text-lg mb-2 font-alegreya-sc">The Quick Brown Fox Jumps Over The Lazy Dog</p>
            <p>Jived fox nymph grabs quick waltz. Glib jocks quiz nymph to vex dwarf. Sphinx of black quartz, judge my vow. How vexingly quick daft zebras jump! The five boxing wizards jump quickly. Pack my box with five dozen liquor jugs.</p>
          </label>
        </div>
        <div class="py-4 pl-2 my-2 flex flex-row justify-between focus:text-copy-primary bg-background-secondary rounded-lg font-fira-code pr-6">
          <input type="radio" name="fontPref" id="fira-code" value="fira-code" class="mr-6" {{ $settings->font_pref == 'fco' ? 'checked' : '' }}>
          <label for="fira-code">
            <p class="font-semibold text-lg mb-2">Fira Code</p>
            <p class="mb-2"><small>Sample:</small></p>
            <p class="font-semibold text-lg mb-2">The Quick Brown Fox Jumps Over The Lazy Dog</p>
            <p>Jived fox nymph grabs quick waltz. Glib jocks quiz nymph to vex dwarf. Sphinx of black quartz, judge my vow. How vexingly quick daft zebras jump! The five boxing wizards jump quickly. Pack my box with five dozen liquor jugs.</p>
          </label>
        </div>
        <div class="py-4 pl-2 my-2 flex flex-row justify-between focus:text-copy-primary bg-background-secondary rounded-lg font-hack pr-6">
          <input type="radio" name="fontPref" id="hack" value="hack" class="mr-6" {{ $settings->font_pref == 'hac' ? 'checked' : '' }}>
          <label for="hack">
            <p class="font-semibold text-lg mb-2">Hack</p>
            <p class="mb-2"><small>Sample:</small></p>
            <p class="font-semibold text-lg mb-2">The Quick Brown Fox Jumps Over The Lazy Dog</p>
            <p>Jived fox nymph grabs quick waltz. Glib jocks quiz nymph to vex dwarf. Sphinx of black quartz, judge my vow. How vexingly quick daft zebras jump! The five boxing wizards jump quickly. Pack my box with five dozen liquor jugs.</p>
          </label>
        </div>
        <div class="py-4 pl-2 my-2 flex flex-row justify-between focus:text-copy-primary bg-background-secondary rounded-lg font-montserrat pr-6">
          <input type="radio" name="fontPref" id="montserrat" value="montserrat" class="mr-6" {{ $settings->font_pref == 'mon' ? 'checked' : '' }}>
          <label for="montserrat">
            <p class="font-semibold text-lg mb-2">Montserrat</p>
            <p class="mb-2"><small>Sample:</small></p>
            <p class="font-semibold text-lg mb-2">The Quick Brown Fox Jumps Over The Lazy Dog</p>
            <p>Jived fox nymph grabs quick waltz. Glib jocks quiz nymph to vex dwarf. Sphinx of black quartz, judge my vow. How vexingly quick daft zebras jump! The five boxing wizards jump quickly. Pack my box with five dozen liquor jugs.</p>
          </label>
        </div>
        <div class="py-4 pl-2 my-2 flex flex-row justify-between focus:text-copy-primary bg-background-secondary rounded-lg font-quicksand pr-6">
          <input type="radio" name="fontPref" id="quicksand" value="quicksand" class="mr-6" {{ $settings->font_pref == 'qui' ? 'checked' : '' }}>
          <label for="quicksand">
            <p class="font-semibold text-lg mb-2">Quicksand</p>
            <p class="mb-2"><small>Sample:</small></p>
            <p class="font-semibold text-lg mb-2">The Quick Brown Fox Jumps Over The Lazy Dog</p>
            <p>Jived fox nymph grabs quick waltz. Glib jocks quiz nymph to vex dwarf. Sphinx of black quartz, judge my vow. How vexingly quick daft zebras jump! The five boxing wizards jump quickly. Pack my box with five dozen liquor jugs.</p>
          </label>
        </div>
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold mt-4">Save Settings</button>
    </form>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection