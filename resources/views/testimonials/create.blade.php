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
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Create Testimonial</h1>
    <p class="text-copy-secondary mb-4">The testimonials you create via this page will all be displayed on the landing page of your website. To edit or delete any of them, go to the home page of your website (you must be logged in) and you'll see an edit button that you can click. It's your responsibility and yours alone to make sure you have the rights to the content you publish through this page.</p>
    <form action="/testimonials" method="post">
      @csrf 
      <div class="mb-4">
        <label for="name" class="block text-copy-primary text-sm font-bold mb-2">
          Name
        </label>
        <input type="text" name="name" id="name" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('name') border-solid border-red-600 border-2 @enderror" placeholder="Joe Schmoe from Shmuck's Reviews" value="{{ old('name') }}" autofocus>
      </div>
      <div class="mb-4">
        <label for="quote" class="block text-copy-primary text-sm font-bold mb-2">
          Quote
        </label>
        <textarea name="quote" id="quote" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('quote') border-solid border-red-600 border-2 @enderror" placeholder="I'm LITERALLY OBSESSED with ArachniCMS. The geniuses have done it again!..." required></textarea>
      </div>
      <div class="mb-4">
        <label for="link" class="block text-copy-primary text-sm font-bold mb-2">
          Hyperlink to Source (optional)<br>
          <small class="py-2">Note that you must include the 'http://' or 'https://' part of the web address.</small>
        </label>
        <input type="text" name="link" id="link" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('link') border-solid border-red-600 border-2 @enderror" placeholder="https://www.joeschmoespersonalblog.com/" value="{{ old('link') }}">
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold">
        Create Testimonial
      </button>
    </form>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection