@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script>
    document.addEventListener('DOMContentLoaded', function(){
      let burger = document.querySelector("#menu-burger");
      let cancel = document.querySelector("#menu-cancel");
      let menuItems = document.querySelectorAll('.menu-item');

      burger.addEventListener("click", function(){
        for (let menuItem of menuItems) {
          menuItem.classList.replace("hidden", "block");
        }
        burger.classList.replace("block", "hidden");
        cancel.classList.replace("hidden", "block");
      });

      cancel.addEventListener("click", function(){
        for (let menuItem of menuItems) {
          menuItem.classList.replace("block", "hidden");
        }
        cancel.classList.replace("block", "hidden");
        burger.classList.replace("hidden", "block");
      });
    })
  </script>
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
  
  <div class="relative hero h-screen flex flex-col justify-center items-center text-copy-secondary {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }}" 
  @if($settings->hero_location != null)
    style="background: url('{{ asset('storage/'.$settings->hero_location) }}') no-repeat center center / cover;"
  @endif
  >
    <div class="w-full h-full z-10 absolute" style="background: rgba(178,178,178,.65);"></div>
    <h1 class="z-20 px-6  text-6xl text-copy-primary font-black {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
      @if($settings->landing_header == null)
        Arachni<span class="text-copy-primary">CMS</span>
      @else 
        {{ $settings->landing_header }}
      @endif
    </h1>
    <p class="z-20 px-6   text-3xl text-copy-primary font-bold">
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