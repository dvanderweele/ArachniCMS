@extends('layouts.app')

@section('title')
@include('includes.default-title')
@endsection

@section('js')
@include('includes.default-js')
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script src="{{ asset('js/dab-fcr-s1.js') }}"></script>
@endsection

@section('css')
@include('includes.default-css')
@endsection

@section('nav')
@include('includes.default-nav')
@endsection

@section('content')
<div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans">
  <h1 class="font-semibold text-2xl text-copy-primary mb-4">Create About Page</h1>
  <form action="{{ url('about') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
      <label for="post-title" class="block text-copy-primary text-sm font-bold mb-2">
        About Page Title
      </label>
      <input type="text" name="title" id="title" required
        class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('title') border-solid border-red-600 border-2 @enderror"
        value="{{ old('title') }}" autofocus>
    </div>
    <div class="mb-4">
      <label for="about-body" class="block text-copy-primary text-sm font-bold mb-2">
        About Page Body
      </label>
      <textarea name="about_body" id="about-body"
        class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('body') border-solid border-red-600 border-2 @enderror"
        required>{{ old('about-body') }}</textarea>
    </div>
    <div class="mb-4">
      <label for="image_file" class="block text-copy-primary text-sm font-bold mb-3">
        Upload An Image<br class="my-2">
        <small class="text-copy-primary font-normal text-xs">It isn't required for you to upload an image to create your
          About Page, if that's your style. However, if you decide to upload an image, providing a description for the
          image below is mandatory. Note that the max upload size for an image is 2MB, so if your image is larger than
          that, you will need to resize it by way of image manipulation software, such as GIMP.</small>
      </label>
      <input type="file" name="image_file" id="image_file"
        class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('image_file') border-solid border-red-600 border-2 @enderror">
    </div>
    <div class="mb-4">
      <label for="image_description" class="block text-copy-primary text-sm font-bold mb-3">
        Image Description<br class="my-2">
        <small class="text-copy-primary font-normal text-xs">The description you provide for the image is for situations
          such as disabled users utilizing screen readers or network conditions preventing image loading for visitors to
          your site.</small>
      </label>
      <input type="text" name="image_description" id="image_description"
        class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('image_description') border-solid border-red-600 border-2 @enderror"
        value="{{ old('image_description') }}">
    </div>
    <button type="submit"
      class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold">
      Create About Page
    </button>
  </form>
</div>
@endsection

@section('footer')
@include('includes.default-footer')
@endsection