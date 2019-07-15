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
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Edit Testimonial</h1>
    <form action="/testimonials" method="post">
      @csrf 
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $testimonial->id }}">
      <div class="mb-4">
        <label for="name" class="block text-copy-primary text-sm font-bold mb-2">
          Name
        </label>
        <input type="text" name="name" id="name" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('name') border-solid border-red-600 border-2 @enderror" placeholder="Joe Schmoe from Shmuck's Reviews" value="{{ $testimonial->name }}" autofocus>
      </div>
      <div class="mb-4">
        <label for="quote" class="block text-copy-primary text-sm font-bold mb-2">
          Quote
        </label>
        <textarea name="quote" id="quote" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('quote') border-solid border-red-600 border-2 @enderror" placeholder="I'm LITERALLY OBSESSED with ArachniCMS. The geniuses have done it again!..." required>{{ $testimonial->quote }}</textarea>
      </div>
      <div class="mb-4">
        <label for="link" class="block text-copy-primary text-sm font-bold mb-2">
          Hyperlink to Source (optional)<br>
          <small class="py-2">Note that you must include the 'http://' or 'https://' part of the web address.</small>
        </label>
        <input type="text" name="link" id="link" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('link') border-solid border-red-600 border-2 @enderror" placeholder="https://www.joeschmoespersonalblog.com/" value="{{ $testimonial->link }}">
      </div>
      <div class="flex flex-row justify-around">
        <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold w-full">
          Update Testimonial
        </button>
      </div>
    </form>
    <form action="/testimonials" method="POST" class="mt-4">
      @csrf 
      @method('DELETE')
      <input type="hidden" name="id" value="{{ $testimonial->id }}">
      <button type="submit" class="border text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold w-full bg-orange-500">
        Delete Forever
      </button>
    </form>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection