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
  @foreach($posts as $post)
    <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-16 font-sans">
      <h1 class="font-semibold text-2xl text-copy-primary mb-4">
        {{ $post->title }}
      </h1>
      <div id="post-body" class="text-copy-primary">
        @if($post->summary != null)
          {{ $post->summary }}
        @else 
          <p class="font-bold">No summary for this post.</p>
        @endif
      </div>
    </div>
  @endforeach
  {{ $posts->links() }}
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection