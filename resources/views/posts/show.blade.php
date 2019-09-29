@extends('layouts.app')

@section('title')
  {{ $post->title }} | @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  @if(count($post->images))
    <script src="{{ asset('js/dpo-fsh-s1.js') }}"></script>
  @endif
  <script src="{{ asset('js/dpo-fsh-s2.js') }}"></script>
  @auth 
    <script src="{{ asset('js/dpo-fsh-s3.js') }}"></script>
  @endauth
@endsection

@section('css')
  @include('includes.default-css')
  <link rel="stylesheet" href="{{ asset('css/dpo-fsh-s1.css') }}">
@endsection

@section('nav')
  @include('includes.default-nav')
@endsection

@section('content')
  <div id="modalOverlay" class="fixed inset-0 bg-background-primary z-20 opacity-50 hidden">
  </div>
  <div id="deleteCommentModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="dcmCancel"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg></button>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to permanently delete this comment?
      <form action="/comments" method="post">
        @csrf 
        @method('DELETE')
        <input type="hidden" name="id" id="deleteTarget" value="">
        <button type="submit" id="submitDelete" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Delete Forever</button>
      </form>
    </p>
  </div>
  <div id="approveCommentModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="acmCancel"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg></button>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to approve this comment and make it publicly visible?
      <form action="/comments" method="post">
        @csrf 
        @method('PATCH')
        <input type="hidden" name="id" id="approveTarget" value="">
        <input type="hidden" name="approve" value="true">
        <button type="submit" id="submitApproval" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Approve Comment</button>
      </form>
    </p>
  </div>
  <div id="unapproveCommentModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="ucmCancel"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg></button>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to unapprove this comment and hide it from public view?
      <form action="/comments" method="post">
        @csrf 
        @method('PATCH')
        <input type="hidden" name="id" id="unapproveTarget" value="">
        <input type="hidden" name="unapprove" value="true">
        <button type="submit" id="submitUnapproval" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Unapprove Comment</button>
      </form>
    </p>
  </div>
  <div class="fixed inset-0 bg-black z-20 hidden max-h-screen" id="image-gallery">
    <div class="flex flex-row justify-end py-2 px-4">
      <button type="button" id="big-img-cancel"><svg version="1.1" class="fill-current text-copy-primary h-5 w-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg></button>
    </div>
    <img src="" alt="" class="w-auto h-auto mx-auto mb-4" id="big-img">
    <p class="w-full bg-background-secondary rounded px-4 py-2 text-copy-primary hover:text-copy-secondary cursor-default">
      <span class="font-bold">Caption:&nbsp;</span><span id="caption"></span>
    </p>
  </div>
  <div class="max-w-2xl w-10/12 mt-8 mx-auto flex 
    @auth
    flex-row justify-between flex-wrap
    @endauth
    @guest 
    flex-col items-start
    @endguest
  ">
    <a href="/posts" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold h-auto inline-block mx-2 my-2 sm:my-0">
      <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M19,16.685c0,0-2.225-9.732-11-9.732V2.969L1,9.542l7,6.69v-4.357C12.763,11.874,16.516,12.296,19,16.685z"/>
      </svg>
    </a>
    @auth 
      <a href="/imageables/post/{{ $post->url_string }}/create" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold h-auto flex flex-row justify-center items-center mx-2 my-2 sm:my-0">
        <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M10,1.6c-4.639,0-8.4,3.761-8.4,8.4s3.761,8.4,8.4,8.4s8.4-3.761,8.4-8.4S14.639,1.6,10,1.6z M15,11h-4v4H9  v-4H5V9h4V5h2v4h4V11z"/>
        </svg>
        <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M17.125,6.17l-2.046-5.635c-0.151-0.416-0.595-0.637-0.989-0.492L0.492,5.006  C0.098,5.15-0.101,5.603,0.051,6.019l2.156,5.941V8.777c0-1.438,1.148-2.607,2.56-2.607H8.36l4.285-3.008l2.479,3.008H17.125z   M19.238,8H4.767c-0.42,0-0.762,0.334-0.762,0.777v9.42C4.006,18.641,4.348,19,4.767,19h14.471C19.658,19,20,18.641,20,18.197v-9.42  C20,8.334,19.658,8,19.238,8z M18,17H6v-2l1.984-4.018l2.768,3.436l2.598-2.662l3.338-1.205L18,14V17z"/>
        </svg><span class="sr-hidden">Embed Photos</span>
      </a>
      <a href="/youtubevidembeds/{{ $post->url_string }}" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold h-auto flex flex-row justify-center items-center mx-2 my-2 sm:my-0">
        <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M10,1.6c-4.639,0-8.4,3.761-8.4,8.4s3.761,8.4,8.4,8.4s8.4-3.761,8.4-8.4S14.639,1.6,10,1.6z M15,11h-4v4H9  v-4H5V9h4V5h2v4h4V11z"/>
        </svg>
        <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M11.603,9.833L9.357,8.785C9.161,8.694,9,8.796,9,9.013v1.974c0,0.217,0.161,0.319,0.357,0.228l2.245-1.048  C11.799,10.075,11.799,9.925,11.603,9.833z M10,0.4c-5.302,0-9.6,4.298-9.6,9.6s4.298,9.6,9.6,9.6s9.6-4.298,9.6-9.6  S15.302,0.4,10,0.4z M10,13.9c-4.914,0-5-0.443-5-3.9s0.086-3.9,5-3.9s5,0.443,5,3.9S14.914,13.9,10,13.9z"/>
        </svg><span class="sr-hidden">Embed YouTube Videos</span>
      </a>
      <a href="/posts/{{ $post->url_string }}/edit" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold h-auto inline-block mx-2 my-2 sm:my-0">
        <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M17.561,2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984,7.264L2.21,14.037L1.2,18.799l4.763-1.01  l6.774-6.771l6.052-6.052C18.788,4.966,19.005,3.883,17.561,2.439z M5.68,17.217l-1.624,0.35c-0.156-0.293-0.345-0.586-0.69-0.932  c-0.346-0.346-0.639-0.533-0.932-0.691l0.35-1.623l0.47-0.469c0,0,0.883,0.018,1.881,1.016c0.997,0.996,1.016,1.881,1.016,1.881  L5.68,17.217z"/>
        </svg><span class="sr-hidden">Edit Post</span>
      </a>
    @endauth
  </div>
  <article class="w-full sm:max-w-2xl sm:w-10/12 bg-background-primary shadow-lg rounded mx-auto px-3 md:px-8 pt-6 pb-8 mt-8 relative {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }}">
    <div class="flex flex-row">
      <h1 class="font-semibold text-2xl text-copy-primary mb-4 {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
        {{ $post->title }}
      </h1>
    </div>
    @if(count($post->images))
      <div class="my-6 w-full overflow-x-auto px-2 rounded bg-background-secondary flex flex-row ">
        @foreach($post->images as $image)
          <img src="/storage/img/{{ $image->location }}" alt="{{ $image->description }}" class="thumbnail w-1/4 mx-2 cursor-pointer flex-shrink-0">
        @endforeach
      </div>
    @endif
    <dl class="my-4 cursor-default flex flex-row flex-wrap justify-around">
    @auth
      <dt class="sr-hidden">Publication Status</dt>
      <dd class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm mx-4 my-2 mx-auto">{{ $post->is_published ? 'Published' : 'Unpublished' }}</dd>
      <dt class="sr-hidden">View Count</dt>
      <dd class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
        <svg version="1.1" class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M10,4.4C3.439,4.4,0,9.232,0,10c0,0.766,3.439,5.6,10,5.6c6.56,0,10-4.834,10-5.6C20,9.232,16.56,4.4,10,4.4  z M10,14.307c-2.455,0-4.445-1.928-4.445-4.307S7.545,5.691,10,5.691s4.444,1.93,4.444,4.309S12.455,14.307,10,14.307z M10,10  c-0.407-0.447,0.663-2.154,0-2.154c-1.228,0-2.223,0.965-2.223,2.154S8.772,12.154,10,12.154c1.227,0,2.223-0.965,2.223-2.154  C12.223,9.453,10.346,10.379,10,10z"/>
        </svg>&nbsp;&nbsp;{{ $post->views }}
      </dd>
    @endauth
    @guest
    @if($settings->view_count_policy)
      <dt class="sr-hidden">View Count</dt>
      <dd class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
        <svg version="1.1" class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M10,4.4C3.439,4.4,0,9.232,0,10c0,0.766,3.439,5.6,10,5.6c6.56,0,10-4.834,10-5.6C20,9.232,16.56,4.4,10,4.4  z M10,14.307c-2.455,0-4.445-1.928-4.445-4.307S7.545,5.691,10,5.691s4.444,1.93,4.444,4.309S12.455,14.307,10,14.307z M10,10  c-0.407-0.447,0.663-2.154,0-2.154c-1.228,0-2.223,0.965-2.223,2.154S8.772,12.154,10,12.154c1.227,0,2.223-0.965,2.223-2.154  C12.223,9.453,10.346,10.379,10,10z"/>
        </svg>&nbsp;&nbsp;{{ $post->views }}
      </dd>
    @endif
    @endguest
      <dt class="sr-hidden">Publication Time</dt>
      <dd class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm mx-4 my-2 mx-auto">{{ date('F d, Y', strtotime($post->updated_at)) }}</dd>
    </dl>
    <section id="post-body" class="text-copy-primary mx-2 md:mx-6 my-4 {{ $settings->text_selection_policy ? '' : 'select-none' }}">
      {!! $post->body !!}
    </section>
    <section class="mb-8 mx-6">
      @foreach($post->youtubevidembeds as $embed)
        <div class="mb-8 videoWrapper absolute w-full h-0">
          <iframe nonce="{{ csp_nonce() }}" width="560" height="349" src="https://www.youtube.com/embed/{{ $embed->youtubevidcode->vidcode }}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      @endforeach
    </section>
    @if($settings->enable_subscribe_form == true)
    <section class="text-copy-secondary bg-background-secondary border px-6 py-6 rounded-lg mx-6 my-4">
        <h2 class="mb-4 text-xl font-bold">
          @switch($settings->subscribe_form_title)
            @case(!null)
              {{ $settings->subscribe_form_title }}
              @break
            @default 
              Subscribe
          @endswitch
        </h2>
        <p class="mb-4">
          @switch($settings->subscribe_form_copy)
            @case(!null)
              {{ $settings->subscribe_form_copy }}
              @break
            @default
              Thank you for visiting! Please consider subscribing to the email list:
          @endswitch
        </p>
        <form action="/subscriptions" method="post" class="flex flex-col items-start justify-between">
          @csrf 
          @honeypot 
          <label for="subscription-email" class="font-semibold mb-2">Email Address</label>
          <input type="email" name="email" id="subscription-email" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('email') border-solid border-red-600 border-2 @enderror" value="{{ old('email') }}" required>
          <button type="submit" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:text-copy-primary font-bold mt-4">Subscribe</button>
        </form>
    </section>
    @endif
    <section class="mb-8 mx-6 text-copy-primary">
      <p class="text-xl font-black mb-4 text-center tracking-wide">Share:</p>
      <div class="flex flex-row justify-around">
        <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}">
          <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path  d="M10,0.4c-5.302,0-9.6,4.298-9.6,9.6s4.298,9.6,9.6,9.6s9.6-4.298,9.6-9.6S15.302,0.4,10,0.4z M12.274,7.034  h-1.443c-0.171,0-0.361,0.225-0.361,0.524V8.6h1.805l-0.273,1.486H10.47v4.461H8.767v-4.461H7.222V8.6h1.545V7.726  c0-1.254,0.87-2.273,2.064-2.273h1.443V7.034z"/>
          </svg>
        </a>
        
        <a href="https://twitter.com/share?url={{ url()->current() }}">
          <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M10,0.4c-5.302,0-9.6,4.298-9.6,9.6s4.298,9.6,9.6,9.6s9.6-4.298,9.6-9.6S15.302,0.4,10,0.4z M13.905,8.264  c0.004,0.082,0.005,0.164,0.005,0.244c0,2.5-1.901,5.381-5.379,5.381c-1.068,0-2.062-0.312-2.898-0.85  c0.147,0.018,0.298,0.025,0.451,0.025c0.886,0,1.701-0.301,2.348-0.809c-0.827-0.016-1.525-0.562-1.766-1.312  c0.115,0.021,0.233,0.033,0.355,0.033c0.172,0,0.34-0.023,0.498-0.066c-0.865-0.174-1.517-0.938-1.517-1.854V9.033  C6.257,9.174,6.549,9.26,6.859,9.27C6.351,8.93,6.018,8.352,6.018,7.695c0-0.346,0.093-0.672,0.256-0.951  c0.933,1.144,2.325,1.896,3.897,1.977c-0.033-0.139-0.049-0.283-0.049-0.432c0-1.043,0.846-1.891,1.891-1.891  c0.543,0,1.035,0.23,1.38,0.598c0.431-0.086,0.835-0.242,1.2-0.459c-0.141,0.441-0.44,0.812-0.831,1.047  c0.383-0.047,0.747-0.148,1.086-0.299C14.595,7.664,14.274,7.998,13.905,8.264z"/>
          </svg>
        </a>
        
        <a href="https://pinterest.com/pin/create/bookmarklet/?url={{ url()->current() }}">
          <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M10,0.4c-5.302,0-9.6,4.298-9.6,9.6s4.298,9.6,9.6,9.6s9.6-4.298,9.6-9.6S15.302,0.4,10,0.4z M10.657,12.275  c-0.616-0.047-0.874-0.352-1.356-0.644c-0.265,1.391-0.589,2.725-1.549,3.422c-0.297-2.104,0.434-3.682,0.774-5.359  C7.947,8.719,8.595,6.758,9.817,7.24c1.503,0.596-1.302,3.625,0.581,4.004c1.966,0.394,2.769-3.412,1.55-4.648  c-1.762-1.787-5.127-0.041-4.713,2.517c0.1,0.625,0.747,0.815,0.258,1.678c-1.127-0.25-1.464-1.139-1.42-2.324  c0.069-1.94,1.743-3.299,3.421-3.486c2.123-0.236,4.115,0.779,4.391,2.777C14.194,10.012,12.926,12.451,10.657,12.275z"/>
          </svg>
        </a>
        
        <a href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}">
          <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M10,0.4c-5.302,0-9.6,4.298-9.6,9.6s4.298,9.6,9.6,9.6s9.6-4.298,9.6-9.6S15.302,0.4,10,0.4z M7.65,13.979  H5.706V7.723H7.65V13.979z M6.666,6.955c-0.614,0-1.011-0.435-1.011-0.973c0-0.549,0.409-0.971,1.036-0.971s1.011,0.422,1.023,0.971  C7.714,6.52,7.318,6.955,6.666,6.955z M14.75,13.979h-1.944v-3.467c0-0.807-0.282-1.355-0.985-1.355  c-0.537,0-0.856,0.371-0.997,0.728c-0.052,0.127-0.065,0.307-0.065,0.486v3.607H8.814v-4.26c0-0.781-0.025-1.434-0.051-1.996h1.689  l0.089,0.869h0.039c0.256-0.408,0.883-1.01,1.932-1.01c1.279,0,2.238,0.857,2.238,2.699V13.979z"/>
          </svg>
        </a>
        
        <a href="https://www.tumblr.com/share/link?url={{ url()->current() }}">
          <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M10,0.4c-5.302,0-9.6,4.298-9.6,9.6s4.298,9.6,9.6,9.6s9.6-4.298,9.6-9.6S15.302,0.4,10,0.4z M12.577,14.141  c-0.393,0.188-0.748,0.318-1.066,0.395c-0.318,0.074-0.662,0.113-1.031,0.113c-0.42,0-0.791-0.055-1.114-0.162  c-0.323-0.107-0.598-0.26-0.826-0.459c-0.228-0.197-0.386-0.41-0.474-0.633c-0.088-0.225-0.132-0.549-0.132-0.973V9.16H6.918V7.846  c0.359-0.119,0.67-0.289,0.927-0.512c0.257-0.221,0.464-0.486,0.619-0.797C8.62,6.227,8.727,5.83,8.786,5.352h1.307v2.35h2.18V9.16  h-2.18v2.385c0,0.539,0.028,0.885,0.085,1.037c0.056,0.154,0.161,0.275,0.315,0.367c0.204,0.123,0.437,0.185,0.697,0.185  c0.466,0,0.928-0.154,1.388-0.461v1.468H12.577z"/>
          </svg>
        </a>
        
        <!-- Following Reddit Icon designed by Yaroslav Samoylov of Standart.io. Icon is likely a trademark of the Reddit Corporation. -->
        <a href="https://reddit.com/submit?url={{ url()->current() }}">
          <svg class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.958 16.905h.013c1.395 0 2.42-.256 3.024-.859a.688.688 0 1 1 .971.973c-.927.927-2.268 1.26-3.995 1.26a.703.703 0 0 1-.026 0c-1.728 0-3.07-.333-3.996-1.26a.687.687 0 1 1 .972-.972c.602.602 1.628.857 3.024.857h.013zM12.482 6.13l1.559-4.93a.688.688 0 0 1 .813-.461l4.006.943a2.463 2.463 0 1 1-.277 1.347l-3.423-.806-1.244 3.933c2.429.149 4.638.831 6.348 1.882a2.938 2.938 0 0 1 4.728 2.332 2.94 2.94 0 0 1-1.244 2.404c.031.228.047.46.047.694 0 4.132-4.92 7.343-10.887 7.343-5.966 0-10.886-3.211-10.886-7.343 0-.232.016-.46.046-.684a2.94 2.94 0 1 1 3.476-4.74C7.391 6.907 9.821 6.2 12.482 6.13zm-8.146 2.79a1.565 1.565 0 0 0-1.843 2.385c.396-.88 1.027-1.685 1.843-2.384zm18.982 2.372a1.564 1.564 0 0 0-1.842-2.376c.814.697 1.445 1.5 1.842 2.376zm-1.193-8.46a1.088 1.088 0 1 0-2.175 0 1.088 1.088 0 0 0 2.175 0zm.295 10.636c0-3.22-4.212-5.968-9.512-5.968-5.299 0-9.51 2.748-9.51 5.968 0 3.219 4.211 5.968 9.51 5.968 5.3 0 9.512-2.75 9.512-5.968zm-11.173-1.3a1.88 1.88 0 1 1-3.76.001 1.88 1.88 0 0 1 3.76 0zm-1.375 0a.504.504 0 1 0-1.009 0 .504.504 0 0 0 1.01 0zm8.56 0a1.88 1.88 0 1 1-3.758.002 1.88 1.88 0 0 1 3.759-.002zm-1.374 0a.504.504 0 1 0-1.008 0 .504.504 0 0 0 1.008 0z" fill-rule="nonzero"/>
          </svg>
        </a>
      </div>
    </section>
    @if($settings->patreon_url != null || $settings->liberapay_url != null)
    <section class="px-6 py-6 mx-auto my-4 w-5/6">
      <h2 class="mb-4 text-2xl font-bold text-center text-copy-primary">
        Show Your Support Through Membership
      </h2>
      @if($settings->patreon_url == null)
      <a href="{{ $settings->patreon_url }}">
        <img src="{{ url('liberapay.png') }}" alt="The Liberapay Logo" class="h-auto w-full">
      </a>
      @elseif($settings->liberapay_url == null)
      <a href="{{ $settings->liberapay_url }}">
        <img src="{{ url('patreon.jpg') }}" alt="The Patreon Logo" class="h-auto w-full">
      </a>
      @else 
      <div class="block md:flex md:flex-row">
        <a href="{{ $settings->patreon_url }}">
          <img src="{{ url('patreon.jpg') }}" alt="The Patreon Logo" class="h-auto w-full md:w-1/3 my-4 mx-auto">
        </a>
        <a href="{{ $settings->liberapay_url }}">
          <img src="{{ url('liberapay.png') }}" alt="The Liberapay Logo" class="h-auto w-full md:w-1/3 my-4 mx-auto">
        </a>
      </div>
      @endif
    </section>
    @endif
  </article>
  <article class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto pt-6 pb-8 mt-8 font-sans relative {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }}">
    <section class="flex flex-col items-start px-8">
      <h1 class="font-semibold text-2xl text-copy-primary mb-4 {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
        Comments
      </h1>
      <div class="mb-4 text-copy-primary flex flex-col">
        @guest 
          @if(!$post->comments_locked)
            <p>Feel free to leave a respectful comment. All comments, without exception, are subject to a manual approval process. If you misbehave and fail to act like a decent person, you will be banned from the site.</p>
          @else 
          <div class="flex flex-row items-center justify-center">
            <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path  d="M15.8,8H14V5.6C14,2.703,12.665,1,10,1C7.334,1,6,2.703,6,5.6V8H4C3.447,8,3,8.646,3,9.199V17  c0,0.549,0.428,1.139,0.951,1.307l1.197,0.387C5.672,18.861,6.55,19,7.1,19h5.8c0.549,0,1.428-0.139,1.951-0.307l1.196-0.387  C16.571,18.139,17,17.549,17,17V9.199C17,8.646,16.352,8,15.8,8z M12,8H8V5.199C8,3.754,8.797,3,10,3s2,0.754,2,2.199V8z"/>
            </svg>
            <span class="font-bold">&nbsp;&nbsp;Comments locked.&nbsp;&nbsp;</span>
            <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path  d="M15.8,8H14V5.6C14,2.703,12.665,1,10,1C7.334,1,6,2.703,6,5.6V8H4C3.447,8,3,8.646,3,9.199V17  c0,0.549,0.428,1.139,0.951,1.307l1.197,0.387C5.672,18.861,6.55,19,7.1,19h5.8c0.549,0,1.428-0.139,1.951-0.307l1.196-0.387  C16.571,18.139,17,17.549,17,17V9.199C17,8.646,16.352,8,15.8,8z M12,8H8V5.199C8,3.754,8.797,3,10,3s2,0.754,2,2.199V8z"/>
            </svg>
          </div>
          @endif
        @endguest 
        @auth 
          @if($post->comments_locked)
            <p>Looks like you have comments locked on this post. You can still comment, but your visitors won't be able to.</p>
          @else
            <p>Here, visitors to your site will see a warning that admonishes them to be respectful and decent when commenting. It also warns them that they can be banned if they fail to do so.</p>
          @endif
        @endauth
      </div>
      <p class="mb-4 text-copy-primary">
        @auth 
          All comments are shown below. There is one section each for approved and unapproved comments.
        @endauth 
        @guest 
          Only comments that have been manually approved are shown below. If yours is awaiting approval, thank you for your patience!
        @endguest
      </p>
    </section>
    @auth 
      <form action="/comments" method="post" class="px-8 pb-10">
        @csrf 
        @honeypot
        <input type="hidden" name="post_url_string" value="{{ $post->url_string }}" required>
        <div class="flex flex-col items-start mt-4 text-copy-secondary">
          <label for="body" class="font-semibold mb-2">Comment</label>
          <textarea name="body" id="body" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('body') border-solid border-red-600 border-2 @enderror">{{ old('body') }}</textarea>
        </div>
        <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold mt-4">Submit</button>
      </form>
    @endauth
    @guest
      @if(!$post->comments_locked)
      <form action="/comments" method="post" class="px-8 pb-10">
        @csrf 
        @honeypot
        <input type="hidden" name="post_url_string" value="{{ $post->url_string }}" required>
        <div class="flex flex-col items-start">
          <label for="name" class="font-semibold mb-2 text-copy-secondary">Name</label>
          <input type="text" name="name" id="name" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('name') border-solid border-red-600 border-2 @enderror" value="{{ old('name') }}">
        </div>
        <div class="flex flex-col items-start mt-4">
          <label for="email" class="font-semibold mb-2 text-copy-secondary">Email Address</label>
          <input type="email" name="email" id="email" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('email') border-solid border-red-600 border-2 @enderror" value="{{ old('email') }}">
        </div>
        <div class="flex flex-col items-start mt-4 text-copy-secondary">
          <label for="body" class="font-semibold mb-2">Comment</label>
          <textarea name="body" id="body" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('body') border-solid border-red-600 border-2 @enderror">{{ old('body') }}</textarea>
        </div>
        <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold mt-4">Submit</button>
      </form>
      @endif
    @endguest
    <section class="">
      @auth 
        @if(count($unapproved) > 0)
          <div class="mb-4 flex flex-col justify-center items-center text-copy-primary hover:text-copy-secondary cursor-pointer w-auto">
            <p class="text-xl font-bold text-copy-primary {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">Unapproved</p>
            <div class="flex flex-row mt-2">
              <span class="font-bold">
                {{ $unapproved->count() }} of {{ $unapproved->total() }}
              </span>&nbsp;&nbsp;
              <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                <path d="M5.8,12.2V6H2C0.9,6,0,6.9,0,8v6c0,1.1,0.9,2,2,2h1v3l3-3h5c1.1,0,2-0.9,2-2v-1.82  c-0.064,0.014-0.132,0.021-0.2,0.021h-7V12.2z M18,1H9C7.9,1,7,1.9,7,3v8h7l3,3v-3h1c1.1,0,2-0.899,2-2V3C20,1.9,19.1,1,18,1z"/>
              </svg>
            </div>
          </div>
          @foreach($unapproved as $comment)
            <div class="bg-background-primary hover:text-copy-primary px-8 text-copy-secondary py-4 mb-3 cursor-default">
              <div class="mb-4">
                <p class="font-semibold">Commenter Name: </p>{{ $comment->name }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Commenter Email: </p>{{ $comment->email }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Commenter IP Address: </p>{{ $comment->ip_address }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Date: </p>{{ date('F d, Y', strtotime($comment->created_at)) }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Comment: </p>{{ $comment->body }}
              </div>
              <div class="flex flex-row w-full mb-3 justify-around">
                <button type="button" class="approvalBtn border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold" data-id="{{ $comment->id }}">Approve</button>
                <button type="button" class="deleteBtn border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold" data-id="{{ $comment->id }}">Delete</button>
              </div>
            </div>
          @endforeach
          <p class="my-4 pt-2">
            {{ $unapproved->links() }}
          </p>
        @else 
          <p class="px-8 pt-4 font-semibold text-lg text-copy-primary text-center">
            No unapproved comments right now.
          </p>
        @endif
      @endauth
      @if(count($approved) > 0)
        <div class="my-4 flex flex-col justify-center items-center text-copy-primary hover:text-copy-secondary cursor-pointer w-auto">
          <p class="text-xl font-bold text-copy-primary {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">Approved</p>
          <div class="flex flex-row mt-2">
            <span class="font-bold">
                {{ $approved->count() }} of {{ $approved->total() }}
            </span>&nbsp;&nbsp;
            <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M5.8,12.2V6H2C0.9,6,0,6.9,0,8v6c0,1.1,0.9,2,2,2h1v3l3-3h5c1.1,0,2-0.9,2-2v-1.82  c-0.064,0.014-0.132,0.021-0.2,0.021h-7V12.2z M18,1H9C7.9,1,7,1.9,7,3v8h7l3,3v-3h1c1.1,0,2-0.899,2-2V3C20,1.9,19.1,1,18,1z"/>
            </svg>
          </div>
        </div>
        @foreach($approved as $comment)
          @auth
            <div class="bg-background-primary hover:text-copy-primary px-8 text-copy-secondary py-4 mb-3 cursor-default">
              <div class="mb-4">
                <p class="font-semibold">Commenter Name: </p>{{ $comment->name }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Commenter Email: </p>{{ $comment->email }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Commenter IP Address: </p>{{ $comment->ip_address }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Date: </p>{{ date('F d, Y', strtotime($comment->created_at)) }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Comment: </p>{{ $comment->body }}
              </div>
              <div class="flex flex-row w-full mb-3 justify-around">
                <button type="button" class="unapprovalBtn border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold" data-id="{{ $comment->id }}">Unapprove</button>
                <button type="button" class="deleteBtn border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold" data-id="{{ $comment->id }}">Delete</button>
              </div>
            </div>
          @endauth
          @guest
            <div class="bg-background-primary hover:text-copy-primary px-8 text-copy-secondary py-4 mb-3 cursor-default">
              <div class="mb-4">
                <p class="font-semibold">Commenter Name: </p>{{ $comment->name }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Date: </p>{{ date('F d, Y', strtotime($comment->created_at)) }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Comment: </p>{{ $comment->body }}
              </div>
            </div>
          @endguest
        @endforeach
        <p class="my-4 pt-2">
          {{ $approved->links() }}
        </p>
      @else 
      <p class="px-8 pt-4 font-semibold text-lg text-copy-primary text-center">
        @auth 
          No approved comments right now.
        @endauth
        @guest 
          No comments yet. This is your chance!
        @endguest
      </p>
      @endif
    </section>
  </article>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection