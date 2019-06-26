@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script defer src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script defer>
    document.addEventListener('DOMContentLoaded', (event) => {
      CKEDITOR.config.toolbar = [
        ['Format','Bold','Italic','-','NumberedList','BulletedList','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','Link', 'Unlink']
      ];
      CKEDITOR.replace( 'about-body');
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
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Edit Post</h1>
    <form action="/about" method="post">
      @method('PATCH')
      @csrf 
      <div class="mb-4">
        <label for="post-title" class="block text-copy-primary text-sm font-bold mb-2">
          About Page Title
        </label>
        <input type="text" name="title" id="title" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('title') border-solid border-red-600 border-2 @enderror" value="{{ $about->title }}" autofocus>
      </div>
      <div class="mb-4">
        <label for="post-body" class="block text-copy-primary text-sm font-bold mb-2">
          Post Body
        </label>
        <textarea name="body" id="post-body" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('body') border-solid border-red-600 border-2 @enderror" required>{{ $post->body }}</textarea>
      </div>
      <div class="mb-4">
          <label for="post-summary" class="block text-copy-primary text-sm font-bold mb-2">
            Post Summary
          </label>
          <textarea name="summary" id="post-body" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('body') border-solid border-red-600 border-2 @enderror">{{ $post->summary }}</textarea>
        </div>
        <small class="text-copy-primary">On some pages, such as the page the displays a paginated list of multiple blog posts, it may be unrealistic to display the whole body of the blog post. Instead, we'll display the short, unstyled summary you type in here. Adding a summary is not required, but advised.</small>
      <div class="mt-4 mb-4">
        <label for="is-published" class="block text-copy-primary text-sm font-bold mb-2">
          Publication Status
        </label>
      </div>
      <div class="relative w-full mb-4">
        <select name="is_published" id="is-published" required class="block appearance-none w-full bg-background-secondary text-copy-primary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
          <option value="unpublished" {{ $post->is_published ? '' : 'selected' }}>Unpublished</option>
          <option value="published" {{ $post->is_published ? 'selected' : '' }}>Published</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
      <div class="mt-2 mb-4">
        <small class="text-copy-primary">This determines whether your post is private (and only you can see it when you're logged in) or public (and all visitors to your blog can read it). You can change this option later.</small>
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold w-full">
        Update Post
      </button>
    </form>
    <button type="button" id="delete" class="bg-orange-500 hover:bg-orange-600 text-white hover:text-gray-200 py-2 px-4 rounded font-bold w-full mt-10">
      Delete Post
    </button>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection