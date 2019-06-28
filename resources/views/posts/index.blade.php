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
    <div class="max-w-lg w-10/12 mt-8 mx-auto flex flex-col items-start">
      <a href="/posts/create" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold h-auto">
        <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M10,1.6c-4.639,0-8.4,3.761-8.4,8.4s3.761,8.4,8.4,8.4s8.4-3.761,8.4-8.4S14.639,1.6,10,1.6z M15,11h-4v4H9  v-4H5V9h4V5h2v4h4V11z"/>
        </svg>
      </a>
    </div>
  @endauth
  @if(count($posts) > 0)
    @foreach($posts as $post)
      <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans">
        <h1 class="font-semibold text-2xl text-copy-primary mb-4">
          {{ $post->title }}
        </h1>
        <div class="my-4 cursor-default flex flex-row flex-wrap justify-around">
        @auth
          <span class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm mx-4 my-2 mx-auto">{{ $post->is_published ? 'Published' : 'Unpublished' }}</span>
          <p class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm flex flex-row items-center align-center mx-4 my-2 mx-auto">
              <svg version="1.1" class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                <path fill="#FFFFFF" d="M10,4.4C3.439,4.4,0,9.232,0,10c0,0.766,3.439,5.6,10,5.6c6.56,0,10-4.834,10-5.6C20,9.232,16.56,4.4,10,4.4  z M10,14.307c-2.455,0-4.445-1.928-4.445-4.307S7.545,5.691,10,5.691s4.444,1.93,4.444,4.309S12.455,14.307,10,14.307z M10,10  c-0.407-0.447,0.663-2.154,0-2.154c-1.228,0-2.223,0.965-2.223,2.154S8.772,12.154,10,12.154c1.227,0,2.223-0.965,2.223-2.154  C12.223,9.453,10.346,10.379,10,10z"/>
              </svg>&nbsp;&nbsp;{{ $post->views }}
          </p>
        @endauth
          <span class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm mx-4 my-2 mx-auto">{{ date('F d, Y', strtotime($post->updated_at)) }}</span>
        </div>
        <div id="post-body" class="text-copy-primary">
          @if($post->summary != null)
            <p class="mb-5">{{ $post->summary }}</p>
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
            <a href="/posts/{{ $post->id }}" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold h-auto">Read more...</a>
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