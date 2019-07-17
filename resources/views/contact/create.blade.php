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
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Contact Form</h1>
    <p class="text-copy-secondary mb-4">All fields required.</p>
    <form action="/contact" method="post">
      @csrf 
      @honeypot 
      <div class="mb-4">
        <label for="name" class="block text-copy-primary text-sm font-bold mb-2">
          Name
        </label>
        <input type="text" name="name" id="name" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('name') border-solid border-red-600 border-2 @enderror" placeholder="Joe Schmoe" value="{{ old('name') }}" autofocus>
      </div>
      <div class="mb-4">
        <label for="email" class="block text-copy-primary text-sm font-bold mb-2">
          Email
        </label>
        <input type="email" name="email" id="email" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('email') border-solid border-red-600 border-2 @enderror" placeholder="email@example.com" value="{{ old('email') }}">
      </div>
      <div class="mb-4">
        <label for="contact-body" class="block text-copy-primary text-sm font-bold mb-2">
          Message
        </label>
        <textarea name="contact-body" id="contact-body" placeholder="I'm your biggest fan!" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('contact-body') border-solid border-red-600 border-2 @enderror" required>{{ old('contact-body') }}</textarea>
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold">
        Submit
      </button>
    </form>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection