@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      CKEDITOR.config.toolbar = [
        ['Styles','Format','Font','FontSize'],
        '/',
        ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut',     'Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print'],
        '/',
        ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter',     'JustifyRight','JustifyBlock'],
        ['Link', 'Unlink']
      ];
      CKEDITOR.replace( 'post-body');
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
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Create New Post</h1>
    <form action="/posts" method="post">
      @csrf 
      <div class="mb-4">
      <label for="post-title" class="block text-copy-primary text-sm font-bold mb-2">
        Post Title
      </label>
      <input type="text" name="title" id="post-title" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('title') border-solid border-red-600 border-2 @enderror" value="{{ old('name') }}" autofocus>
      </div>
      <div class="mb-4">
      <label for="post-body" class="block text-copy-primary text-sm font-bold mb-2">
        Post Body
      </label>
      <textarea name="body" id="post-body" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('body') border-solid border-red-600 border-2 @enderror" required></textarea>
      </div>
      <div class="mb-4">
      <label for="is-published" class="block text-copy-primary text-sm font-bold mb-2">
        Publication Status
      </label>
      <div class="inline-block relative w-full">
      <select name="is_published" id="is-published" required class="block appearance-none w-full bg-background-secondary text-copy-primary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <option value="unpublished" selected>Unpublished</option>
        <option value="published">Published</option>
      </select>
      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
      </div>
    </div>
      <small class="text-copy-primary mt-2 mb-4">This determines whether your post is private (and only you can see it when you're logged in) or public (and all visitors to your blog can read it). You can change this option later.</small>
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary">
        Create Post
      </button>
    </form>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection