@extends('layouts.app')

@section('title')
@include('includes.default-title')
@endsection

@section('js')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/fwe-s1.js') }}"></script>
@endsection

@section('css')
@include('includes.default-css')
<link rel="stylesheet" href="{{ asset('css/fwe-s1.css') }}">
@if($settings->hero_location != null)
<style nonce="{{ csp_nonce() }}">
  #relative-hero {
    background: url('{{ asset('storage/'.$settings->hero_location) }}') no-repeat center center / cover;
  }
</style>
@endif
<style nonce="{{ csp_nonce() }}">
  #bg-fuzz {
    background: rgba(178, 178, 178, .65);
  }
</style>
@endsection

@section('nav')
@include('nav.landing')
@endsection

@section('content')

<div
  class="relative hero h-screen flex flex-col justify-center items-center text-copy-secondary {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }}"
  @if($settings->hero_location != null)
  id="relative-hero"
  @endif
  >
  <div class="w-full h-full z-10 absolute" id="bg-fuzz"></div>
  <h1
    class="z-20 px-6 text-center mx-4 text-2xl sm:text-3xl md:text-5xl lg:text-6xl text-copy-primary font-black {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
    @if($settings->landing_header == null)
    Arachni<span class="text-copy-primary">CMS</span>
    @else
    {{ $settings->landing_header }}
    @endif
  </h1>
  <p class="z-20 px-6 text-center mx-4 text-lg sm:text-xl md:text-2xl lg:text-4xl text-copy-primary font-bold">
    @if($settings->landing_tagline == null)
    Blogging software that just rocks.
    @else
    {{ $settings->landing_tagline }}
    @endif
  </p>
</div>

@if(isset($testimonials) && $testimonials->count())
<div
  class="font-bold py-10 {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }} flex flex-col items-center justify-center h-auto">
  <h2
    class="text-4xl {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
    What People Are Saying</h2>
  <article class="flex flex-row items-start w-full overflow-x-auto px-2 py-1 h-auto">
    @foreach($testimonials as $testimonial)
    <section
      class="flex flex-col justify-center items-center my-auto w-full sm:w-2/3 md:w-1/3 lg:w-1/4 xl:w-1/5 px-3 flex-shrink-0">
      <p class="font-semibold text-lg mx-4 text-center">
        @if($testimonial->link != null)
        <a href="{{ $testimonial->link }}" _target="blank"
          class="text-teal-700 hover:text-teal-900 hover:underline">{{$testimonial->name}}</a>
        @auth
        <a href="/testimonials/{{ $testimonial->id }}/edit">
          <button type="button">
            <svg version="1.1" class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20"
              enable-background="new 0 0 20 20" xml:space="preserve">
              <path
                d="M17.561,2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984,7.264L2.21,14.037L1.2,18.799l4.763-1.01  l6.774-6.771l6.052-6.052C18.788,4.966,19.005,3.883,17.561,2.439z M5.68,17.217l-1.624,0.35c-0.156-0.293-0.345-0.586-0.69-0.932  c-0.346-0.346-0.639-0.533-0.932-0.691l0.35-1.623l0.47-0.469c0,0,0.883,0.018,1.881,1.016c0.997,0.996,1.016,1.881,1.016,1.881  L5.68,17.217z" />
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
@if(isset($bestposts) && $bestposts->count())
<div
  class="font-bold pt-10 {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }} flex flex-col items-center justify-center h-auto">
  <h2
    class="text-4xl {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
    Top Posts</h2>
  <section class="flex flex-row flex-wrap items-center justify-around w-full px-2 py-1 h-auto">
    @foreach($bestposts as $post)
    <article
      class="flex-shrink-0 py-4 px-6 rounded-lg shadow-2xl border border-black border-2 mx-6 my-6 w-5/6 sm:w-5/12 md:w-1/3 lg:w-1/4">
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
      <dl class="mt-4 cursor-default flex flex-row flex-wrap justify-around">
        @guest
        @if($settings->view_count_policy)
        <dt class="sr-hidden">View Count</dt>
        <dd
          class="w-auto bg-gray-700 text-gray-100 hover:text-gray-200 hover:bg-gray-800 font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
          <svg version="1.1" class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20"
            enable-background="new 0 0 20 20" xml:space="preserve">
            <path
              d="M10,4.4C3.439,4.4,0,9.232,0,10c0,0.766,3.439,5.6,10,5.6c6.56,0,10-4.834,10-5.6C20,9.232,16.56,4.4,10,4.4  z M10,14.307c-2.455,0-4.445-1.928-4.445-4.307S7.545,5.691,10,5.691s4.444,1.93,4.444,4.309S12.455,14.307,10,14.307z M10,10  c-0.407-0.447,0.663-2.154,0-2.154c-1.228,0-2.223,0.965-2.223,2.154S8.772,12.154,10,12.154c1.227,0,2.223-0.965,2.223-2.154  C12.223,9.453,10.346,10.379,10,10z" />
          </svg>&nbsp;&nbsp;{{ $post->views }}
        </dd>
        @endif
        @endguest
        @if(count($post->images))
        <dt class="sr-hidden">Image Count</dt>
        <dd
          class="w-auto bg-gray-700 text-gray-100 hover:text-gray-200 hover:bg-gray-800 font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
          <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20"
            enable-background="new 0 0 20 20" xml:space="preserve">
            <path
              d="M17.125,6.17l-2.046-5.635c-0.151-0.416-0.595-0.637-0.989-0.492L0.492,5.006  C0.098,5.15-0.101,5.603,0.051,6.019l2.156,5.941V8.777c0-1.438,1.148-2.607,2.56-2.607H8.36l4.285-3.008l2.479,3.008H17.125z   M19.238,8H4.767c-0.42,0-0.762,0.334-0.762,0.777v9.42C4.006,18.641,4.348,19,4.767,19h14.471C19.658,19,20,18.641,20,18.197v-9.42  C20,8.334,19.658,8,19.238,8z M18,17H6v-2l1.984-4.018l2.768,3.436l2.598-2.662l3.338-1.205L18,14V17z" />
          </svg>&nbsp;&times;&nbsp;{{ count($post->images) }}</dd>
        @endif
        @if(count($post->youtubevidembeds))
        <dt class="sr-hidden">Youtube Video Count</dt>
        <dd
          class="w-auto bg-gray-700 text-gray-100 hover:text-gray-200 hover:bg-gray-800 font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
          <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20"
            enable-background="new 0 0 20 20" xml:space="preserve">
            <path
              d="M10,2.3C0.172,2.3,0,3.174,0,10s0.172,7.7,10,7.7s10-0.874,10-7.7S19.828,2.3,10,2.3z M13.205,10.334  l-4.49,2.096C8.322,12.612,8,12.408,8,11.974V8.026C8,7.593,8.322,7.388,8.715,7.57l4.49,2.096  C13.598,9.85,13.598,10.15,13.205,10.334z" />
          </svg>&nbsp;&times;&nbsp;{{ count($post->youtubevidembeds) }}</dd>
        @endif
        <dt class="sr-hidden">Publication Time</dt>
        <dd
          class="flex flex-row items-center align-center w-auto bg-gray-700 text-gray-100 hover:text-gray-200 hover:bg-gray-800 font-semibold rounded-full py-2 px-4 text-sm mx-4 my-2 mx-auto">
          {{ date('F d, Y', strtotime($post->created_at)) }}</dd>
      </dl>
      <a href="/posts/{{ $post->url_string }}"
        class="inline-block w-full rounded border border-black text-center font-bold bg-green-400 hover:bg-green-500 mt-4 py-2">
        Read More
      </a>
    </article>
    @endforeach
  </section>
  @if($settings->enable_subscribe_form == true)
  <section
    class="rounded-lg shadow-2xl border border-black border-2 px-6 py-6 mx-6 my-4 w-5/6 sm:w-3/4 md:w-1/2 lg:w-1/3">
    <h2 class="mb-4 text-2xl font-bold text-center">
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
      <input type="email" name="email" id="subscription-email"
        class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight text-center @error('email') border-solid border-red-600 border-2 @enderror"
        value="{{ old('email') }}" required>
      <button type="submit"
        class="py-2 px-4 rounded w-full font-bold mt-4 bg-green-400 hover:bg-green-500 border border-black">Subscribe</button>
    </form>
  </section>
  @endif
</div>
@endif

@if($settings->patreon_url != null || $settings->liberapay_url != null)
<section class="px-6 py-6 mx-auto my-4 w-5/6">
  <h2 class="mb-4 text-2xl font-bold text-center text-copy-primary">
    Show Your Support Through Membership
  </h2>
  @if($settings->patreon_url == null)
  <a href="{{ $settings->liberapay_url }}" aria-label="Show Your Support via Liberapay">
    <img src="{{ url('liberapay.png') }}" alt="The Liberapay Logo" class="h-auto w-full">
  </a>
  @elseif($settings->liberapay_url == null)
  <a href="{{ $settings->patreon_url }}" aria-label="Show Your Support via Patreon">
    <img src="{{ url('patreon.jpg') }}" alt="The Patreon Logo" class="h-auto w-full">
  </a>
  @else
  <div class="block md:flex md:flex-row">
    <a href="{{ $settings->patreon_url }}" aria-label="Show Your Support via Patreon">
      <img src="{{ url('patreon.jpg') }}" alt="The Patreon Logo" class="h-auto w-full md:w-1/3 my-4 mx-auto">
    </a>
    <a href="{{ $settings->liberapay_url }}" aria-label="Show Your Support via Liberapay">
      <img src="{{ url('liberapay.png') }}" alt="The Liberapay Logo" class="h-auto w-full md:w-1/3 my-4 mx-auto">
    </a>
  </div>
  @endif
</section>
@endif

@endsection

@section('footer')
@include('includes.default-footer')
@endsection