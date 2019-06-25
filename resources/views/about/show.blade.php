@extends('layouts.app')

@section('title')
  About | @if($about != null)
  {{ $about->title }} | @endif
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
  @if($about != null)
    <div class="max-w-2xl w-10/12 bg-background-primary text-copy-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans" id="vidcodeinfo">
      <h1 class="font-semibold text-2xl mb-6 text-copy-secondary text-center">
        {{ $about->title }}
      </h1>
      @if($about->image_location != null && $about->image_description != null)
        <img src="/storage/{{ $about->image_location }}" alt="{{ $about->image_description }}" class="w-5/6 sm:w-2/3 md:w-1/3 lg:w-1/4 xl:w-1/ h-auto mb-6 rounded-lg mx-auto">
      @endif
      <div class="text-copy-primary select-none">
        {!! $about->body !!}
      </div>
  @else 
    @auth 
    <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans" id="vidcodeinfo">
      <h1 class="font-semibold text-2xl mb-6 text-copy-primary">
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