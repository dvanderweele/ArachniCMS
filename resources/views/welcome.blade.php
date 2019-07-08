@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
@endsection

@section('css')
  @include('includes.default-css')
  <style>
    #landing-nav {
      background-image: linear-gradient(rgba(178,178,178,.35),rgba(0,0,0,0));
    }
  </style>
@endsection

@section('nav')
  @include('nav.landing')
@endsection

@section('content')
  
  <div class="hero h-screen flex flex-col justify-center items-center text-copy-secondary {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }}">
    <h1 class="text-6xl font-black {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
      @if($settings->landing_header == null)
        Arachni<span class="text-copy-primary">CMS</span>
      @else 
        {{ $settings->landing_header }}
      @endif
    </h1>
    <p class="text-3xl">
      @if($settings->landing_tagline == null)
        Blogging software that just rocks.
      @else 
        {{ $settings->landing_tagline }}
      @endif
    </p>
  </div>

@endsection

@section('footer')
  @include('includes.default-footer')
@endsection