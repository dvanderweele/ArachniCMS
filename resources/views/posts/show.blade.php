@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      postBody = document.getElementById('post-body');
      anchors = postBody.getElementsByTagName("a");
      for (let anchor of anchors)
      {
        anchor.classList.add('underline');
        anchor.classList.add('font-semibold');
        anchor.classList.add('hover:text-copy-secondary');
      }
      h1s = postBody.getElementsByTagName("h1");
      for (let h1 of h1s)
      {
        h1.classList.add('text-6xl');
      }
      h2s = postBody.getElementsByTagName("h2");
      for (let h2 of h2s)
      {
        h2.classList.add('text-5xl');
      }
      h3s = postBody.getElementsByTagName("h3");
      for (let h3 of h3s)
      {
        h3.classList.add('text-4xl');
      }
      ols = postBody.getElementsByTagName("ol");
      for (let ol of ols)
      {
        ol.classList.add('list-disc');
      }
      uls = postBody.getElementsByTagName("ul");
      for (let ul of uls)
      {
        ul.classList.add('list-decimal');
      }
    });
  </script>
@endsection

@section('css')
  @include('includes.default-css')
@endsection

@section('nav')
  @include('includes.default-nav')
@endsection

@section('content')
  <div class="max-w-2xl w-10/12 mt-8 mx-auto flex flex-col items-start">
    <a href="/posts" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold h-auto">
      <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
      <path d="M19,16.685c0,0-2.225-9.732-11-9.732V2.969L1,9.542l7,6.69v-4.357C12.763,11.874,16.516,12.296,19,16.685z"/>
      </svg>
    </a>
  </div>
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans relative">
    @auth 
      <a href="/posts/{{ $post->id }}/edit" class="text-copy-primary py-2 px-4 rounded hover:text-copy-secondary font-bold h-auto mr-4 absolute top-0 right-0 mt-4">
        <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M17.561,2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984,7.264L2.21,14.037L1.2,18.799l4.763-1.01  l6.774-6.771l6.052-6.052C18.788,4.966,19.005,3.883,17.561,2.439z M5.68,17.217l-1.624,0.35c-0.156-0.293-0.345-0.586-0.69-0.932  c-0.346-0.346-0.639-0.533-0.932-0.691l0.35-1.623l0.47-0.469c0,0,0.883,0.018,1.881,1.016c0.997,0.996,1.016,1.881,1.016,1.881  L5.68,17.217z"/>
        </svg>
      </a>
    @endauth
    <div class="flex flex-row">
      <h1 class="font-semibold text-2xl text-copy-primary mb-4">
        {{ $post->title }}
      </h1>
    </div>
    <div class="my-4 cursor-default flex flex-row justify-around">
    @auth
      <span class="w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm">{{ $post->is_published ? 'Published' : 'Unpublished' }}</span>
    @endauth
      <span class="w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm">{{ date('F d, Y', strtotime($post->updated_at)) }}</span>
    </div>
    <div id="post-body" class="text-copy-primary mx-6">
      {!! $post->body !!}
    </div>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection