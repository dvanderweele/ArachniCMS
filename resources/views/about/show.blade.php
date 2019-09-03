@extends('layouts.app')

@section('title')
  About | @if($about != null)
  {{ $about->title }} | @endif
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script src="{{ asset('js/dab-fsh-s1.js') }}"></script>
@endsection

@section('css')
  @include('includes.default-css')
@endsection

@section('nav')
  @include('includes.default-nav')
@endsection

@section('content')
  @if($about != null)
    <div class="w-full sm:max-w-2xl sm:w-10/12 bg-background-primary text-copy-primary shadow-lg rounded mx-auto px-3 sm:px-4 md:px-8 pt-6 pb-8 mt-8 relative {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }}" id="vidcodeinfo">
      @auth 
        <a href="/about/edit" class="text-copy-primary py-2 px-4 rounded hover:text-copy-secondary font-bold h-auto mr-4 absolute top-0 right-0 mt-4">
          <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M17.561,2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984,7.264L2.21,14.037L1.2,18.799l4.763-1.01  l6.774-6.771l6.052-6.052C18.788,4.966,19.005,3.883,17.561,2.439z M5.68,17.217l-1.624,0.35c-0.156-0.293-0.345-0.586-0.69-0.932  c-0.346-0.346-0.639-0.533-0.932-0.691l0.35-1.623l0.47-0.469c0,0,0.883,0.018,1.881,1.016c0.997,0.996,1.016,1.881,1.016,1.881  L5.68,17.217z"/>
          </svg>
        </a>
      @endauth
      <h1 class="font-semibold text-2xl mb-6 text-copy-secondary text-center {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
        {{ $about->title }}
      </h1>
      @if($about->image_location != null && $about->image_description != null)
        <img src="/storage/{{ $about->image_location }}" alt="{{ $about->image_description }}" class="w-5/6 sm:w-2/3 md:w-1/3 lg:w-1/4 xl:w-1/ h-auto mb-6 rounded-lg mx-auto">
      @endif
      <div class="text-copy-primary select-none" id="about-body-display">
        {!! $about->body !!}
      </div>
  @else 
    @auth 
    <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }}" id="vidcodeinfo">
      <h1 class="font-semibold text-2xl mb-6 text-copy-primary {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
        About Page
      </h1>
      <p class="text-copy-secondary font-semibold mb-4">
        This is your about page. Right now your audiences will see a lonely message that says "Bio coming soon!". To fix that, click the button below to get started.
      </p>
      <a href="/about/create" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold text-center">Create About Page</a>
    </div>
    @endauth
    @guest 
      <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 py-6 mt-8 font-sans text-copy-primary" id="vidcodeinfo">
        <h1 class="font-semibold text-2xl text-center">
          Bio coming soon!
        </h1>
      </div>
    @endguest
  @endif
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection