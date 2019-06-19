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
  <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-16 font-sans">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">
      {{ $post->title }}
    </h1>
    <div id="post-body" class="text-copy-primary">
      {!! $post->body !!}
    </div>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection