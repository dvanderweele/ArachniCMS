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
  @auth
    <div class="max-w-lg w-10/12 mt-8 mx-auto flex flex-row justify-between items-center">
      <a href="/posts/create">
        <button class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold"><svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M10,1.6c-4.639,0-8.4,3.761-8.4,8.4s3.761,8.4,8.4,8.4s8.4-3.761,8.4-8.4S14.639,1.6,10,1.6z M15,11h-4v4H9  v-4H5V9h4V5h2v4h4V11z"/>
        </svg></button>
      </a>
      <div>
        <a href="/posts-feed" class="text-copy-primary hover:text-copy-secondary">
            <svg version="1.1" class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path  d="M2.4,2.4v2.367c7.086,0,12.83,5.746,12.83,12.832h2.369C17.599,9.205,10.794,2.4,2.4,2.4z M2.4,7.137v2.369  c4.469,0,8.093,3.623,8.093,8.094h2.368C12.861,11.822,8.177,7.137,2.4,7.137z M4.669,13.059c-1.254,0-2.27,1.018-2.27,2.271  s1.016,2.27,2.27,2.27s2.269-1.016,2.269-2.27S5.923,13.059,4.669,13.059z"/>
            </svg>&nbsp;<span class="font-bold">RSS</span>
        </a>
      </div>
    </div>
  @endauth
  @if(count($posts) > 0)
    @guest
    <div class="flex flex-row justify-center items-center mt-8">
      <a href="/posts-feed" class="text-copy-primary hover:text-copy-secondary">
          <svg version="1.1" class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path  d="M2.4,2.4v2.367c7.086,0,12.83,5.746,12.83,12.832h2.369C17.599,9.205,10.794,2.4,2.4,2.4z M2.4,7.137v2.369  c4.469,0,8.093,3.623,8.093,8.094h2.368C12.861,11.822,8.177,7.137,2.4,7.137z M4.669,13.059c-1.254,0-2.27,1.018-2.27,2.271  s1.016,2.27,2.27,2.27s2.269-1.016,2.269-2.27S5.923,13.059,4.669,13.059z"/>
          </svg>&nbsp;<span class="font-bold">RSS</span>
      </a>
    </div>
    @endguest
    @foreach($posts as $post)
      <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gsa' ? 'font-sans' : '' }} {{ $settings->font_pref == 'gse' ? 'font-serif' : '' }} {{ $settings->font_pref == 'gmo' ? 'font-mono' : '' }} {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya' : '' }} {{ $settings->font_pref == 'fco' ? 'font-fira-code' : '' }} {{ $settings->font_pref == 'hac' ? 'font-hack' : '' }} {{ $settings->font_pref == 'mon' ? 'font-montserrat' : '' }} {{ $settings->font_pref == 'qui' ? 'font-quicksand' : '' }}">
        <h1 class="font-semibold text-2xl text-copy-primary mb-4 {{ $settings->font_pref == 'asa' ? 'font-alegreya-sans-sc' : '' }} {{ $settings->font_pref == 'ase' ? 'font-alegreya-sc' : '' }}">
          {{ $post->title }}
        </h1>
        <div class="my-4 cursor-default flex flex-row flex-wrap justify-around">
        @auth
        <p class="flex flex-row items-center align-center border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm mx-4 my-2 mx-auto">{{ $post->is_published ? 'Published' : 'Unpublished' }}</p>
          <p class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
            <svg version="1.1" class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M10,4.4C3.439,4.4,0,9.232,0,10c0,0.766,3.439,5.6,10,5.6c6.56,0,10-4.834,10-5.6C20,9.232,16.56,4.4,10,4.4  z M10,14.307c-2.455,0-4.445-1.928-4.445-4.307S7.545,5.691,10,5.691s4.444,1.93,4.444,4.309S12.455,14.307,10,14.307z M10,10  c-0.407-0.447,0.663-2.154,0-2.154c-1.228,0-2.223,0.965-2.223,2.154S8.772,12.154,10,12.154c1.227,0,2.223-0.965,2.223-2.154  C12.223,9.453,10.346,10.379,10,10z"/>
            </svg>&nbsp;&nbsp;{{ $post->views }}
          </p>
        @endauth
        @guest
        @if($settings->view_count_policy)
          <p class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
            <svg version="1.1" class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M10,4.4C3.439,4.4,0,9.232,0,10c0,0.766,3.439,5.6,10,5.6c6.56,0,10-4.834,10-5.6C20,9.232,16.56,4.4,10,4.4  z M10,14.307c-2.455,0-4.445-1.928-4.445-4.307S7.545,5.691,10,5.691s4.444,1.93,4.444,4.309S12.455,14.307,10,14.307z M10,10  c-0.407-0.447,0.663-2.154,0-2.154c-1.228,0-2.223,0.965-2.223,2.154S8.772,12.154,10,12.154c1.227,0,2.223-0.965,2.223-2.154  C12.223,9.453,10.346,10.379,10,10z"/>
            </svg>&nbsp;&nbsp;{{ $post->views }}
          </p>
        @endif
        @endguest
        @if(count($post->images))
          <p class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
          <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M17.125,6.17l-2.046-5.635c-0.151-0.416-0.595-0.637-0.989-0.492L0.492,5.006  C0.098,5.15-0.101,5.603,0.051,6.019l2.156,5.941V8.777c0-1.438,1.148-2.607,2.56-2.607H8.36l4.285-3.008l2.479,3.008H17.125z   M19.238,8H4.767c-0.42,0-0.762,0.334-0.762,0.777v9.42C4.006,18.641,4.348,19,4.767,19h14.471C19.658,19,20,18.641,20,18.197v-9.42  C20,8.334,19.658,8,19.238,8z M18,17H6v-2l1.984-4.018l2.768,3.436l2.598-2.662l3.338-1.205L18,14V17z"/>
          </svg>&nbsp;&times;&nbsp;{{ count($post->images) }}</p>
        @endif
        @if(count($post->youtubevidembeds))
          <p class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
            <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M10,2.3C0.172,2.3,0,3.174,0,10s0.172,7.7,10,7.7s10-0.874,10-7.7S19.828,2.3,10,2.3z M13.205,10.334  l-4.49,2.096C8.322,12.612,8,12.408,8,11.974V8.026C8,7.593,8.322,7.388,8.715,7.57l4.49,2.096  C13.598,9.85,13.598,10.15,13.205,10.334z"/>
              </svg>&nbsp;&times;&nbsp;{{ count($post->youtubevidembeds) }}</p>
        @endif
          <p class="flex flex-row items-center align-center border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm mx-4 my-2 mx-auto">{{ date('F d, Y', strtotime($post->updated_at)) }}</p>
        </div>
        <div id="post-body" class="text-copy-primary">
          @if($post->summary != null)
            <p class="mb-5 {{ $settings->text_selection_policy ? '' : 'select-none' }}">{{ $post->summary }}</p>
          @else 
            <p class="font-bold mb-5">No summary for this post.</p>
          @endif
          <div class="flex flex-row justify-between mx-10">
            <div class="mt-4 flex flex-row justify-center items-center text-copy-primary hover:text-copy-secondary cursor-pointer w-auto">
              <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                <path d="M5.8,12.2V6H2C0.9,6,0,6.9,0,8v6c0,1.1,0.9,2,2,2h1v3l3-3h5c1.1,0,2-0.9,2-2v-1.82  c-0.064,0.014-0.132,0.021-0.2,0.021h-7V12.2z M18,1H9C7.9,1,7,1.9,7,3v8h7l3,3v-3h1c1.1,0,2-0.899,2-2V3C20,1.9,19.1,1,18,1z"/>
                </svg>&nbsp;x&nbsp;<span class="font-bold">
                  @guest 
                    {{ count($post->comments->where('approved', true)) }}
                  @endguest 
                  @auth 
                    {{ count($post->comments) }}
                  @endauth
                </span>
            </div>
            <a href="/posts/{{ $post->url_string }}"><button class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold h-auto">Read more...</button></a>
          </div>
        </div>
      </div>
    @endforeach
    <div class="mt-10">
      {{ $posts->links() }}
    </div>
  @else 
    <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans text-center">
      <p class="font-semibold text-lg text-copy-primary">
        No posts right now. Check back later!
      </p>
    </div>
  @endif
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection