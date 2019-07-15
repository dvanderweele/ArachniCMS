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

  @if($testimonials != null)
    <div class="font-bold py-10 {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }} flex flex-col items-center justify-center h-auto">
      <h2 class="text-4xl {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">What People Are Saying</h2>
      <article class="flex flex-row items-start w-full overflow-x-auto px-2 py-1 h-auto">
        @foreach($testimonials as $testimonial)
          <section class="flex flex-col justify-center items-center my-auto w-full sm:w-2/3 md:w-1/3 lg:w-1/4 xl:w-1/5 px-3 flex-shrink-0">
            <p class="font-semibold text-lg mx-4 text-center">
              @if($testimonial->link != null)
                <a href="{{ $testimonial->link }}" _target="blank" class="text-teal-700 hover:text-teal-900 hover:underline">{{$testimonial->name}}</a>
                @auth 
                  <a href="/testimonials/{{ $testimonial->id }}/edit">
                    <button type="button">
                      <svg version="1.1" class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                        <path d="M17.561,2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984,7.264L2.21,14.037L1.2,18.799l4.763-1.01  l6.774-6.771l6.052-6.052C18.788,4.966,19.005,3.883,17.561,2.439z M5.68,17.217l-1.624,0.35c-0.156-0.293-0.345-0.586-0.69-0.932  c-0.346-0.346-0.639-0.533-0.932-0.691l0.35-1.623l0.47-0.469c0,0,0.883,0.018,1.881,1.016c0.997,0.996,1.016,1.881,1.016,1.881  L5.68,17.217z"/>
                      </svg>
                    </button>
                  </a>
                @endauth
              @else 
                {{ $testimonial->name }}
              @endif
            </p>
            <p class="w-full text-center">{{ $testimonial->quote }}</p>
          </section>
        @endforeach
      </article>
    </div>
  @endif 
  @if($bestposts != null)
    <div class="font-bold py-10 {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }} flex flex-col items-center justify-center h-auto">
      <h2 class="text-4xl {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">Top Posts</h2>
      <section class="flex flex-row flex-wrap items-center justify-around w-full px-2 py-1 h-auto">
        @foreach($bestposts as $post)
          <article class="flex-shrink-0 py-4 px-6 rounded-lg shadow-2xl border border-black border-2 mx-6 my-6 w-5/6 sm:w-5/12 md:1/3 lg:1/4">
            <h3 class="text-2xl font-bold text-center">
              {{ $post->title }}
            </h3>
            <p>
              @if($post->summary != null)
                {{ $post->summary }}
              @else 
                No summary.
              @endif
            </p>
            <a href="/posts/{{ $post->url_string }}" class="inline-block w-full rounded border border-black text-center font-bold bg-green-400 hover:bg-green-500 mt-4 py-2">
              Read More
            </a>
          </article>
        @endforeach
      </section>
    </div>
  @endif

@endsection

@section('footer')
  @include('includes.default-footer')
@endsection