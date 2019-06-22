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
  <div class="max-w-2xl w-10/12 mt-8 mx-auto flex flex-col items-start">
    <a href="/admin" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold h-auto">
      <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
      <path d="M19,16.685c0,0-2.225-9.732-11-9.732V2.969L1,9.542l7,6.69v-4.357C12.763,11.874,16.516,12.296,19,16.685z"/>
      </svg>
    </a>
  </div>
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans relative">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">
      Unapproved Comments
    </h1>
    @if(count($unapproved) > 0)
      
    @else 
      <p class="font-semibold text-lg text-copy-primary">
        No unapproved comments.
      </p>
    @endif
  </div>
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans relative">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">
      Approved Comments
    </h1>
    @if(count($approved) > 0)

    @else 
      <p class="font-semibold text-lg text-copy-primary">
        No approved comments.
      </p>
    @endif
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection