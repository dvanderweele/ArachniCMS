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
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans flex flex-col items-center">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Thank You!</h1>
    <p class="text-copy-secondary mb-4">Your subscription means a lot!</p>
    <a href="/posts" class="py-2 px-4 rounded w-full font-bold mt-4 bg-green-400 hover:bg-green-500 border border-black text-center">Keep Reading...</a>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection