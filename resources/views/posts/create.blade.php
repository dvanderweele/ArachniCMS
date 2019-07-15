@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      CKEDITOR.config.toolbar = [
        ['Format','Bold','Italic','-','NumberedList','BulletedList','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','Link', 'Unlink']
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
  <div class="max-w-2xl w-10/12 mt-8 mx-auto flex flex-col items-start">
    <a href="/posts" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold h-auto">
      <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
      <path d="M19,16.685c0,0-2.225-9.732-11-9.732V2.969L1,9.542l7,6.69v-4.357C12.763,11.874,16.516,12.296,19,16.685z"/>
      </svg>
    </a>
  </div>
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Create New Post</h1>
    <form action="/posts" method="post">
      @csrf 
      <div class="mb-4">
      <label for="post-title" class="block text-copy-primary text-sm font-bold mb-2">
        Post Title
      </label>
      <input type="text" name="title" id="post-title" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('title') border-solid border-red-600 border-2 @enderror" value="{{ old('title') }}" autofocus>
      </div>
      <div class="mb-4">
        <label for="post-body" class="block text-copy-primary text-sm font-bold mb-2">
          Post Body
        </label>
        <textarea name="body" id="post-body" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('body') border-solid border-red-600 border-2 @enderror" required></textarea>
      </div>
      <div class="mb-4">
          <label for="post-summary" class="block text-copy-primary text-sm font-bold mb-2">
            Post Summary
          </label>
          <textarea name="summary" id="post-summary" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('summary') border-solid border-red-600 border-2 @enderror"></textarea>
        </div>
        <small class="text-copy-primary">On some pages, such as the page the displays a paginated list of multiple blog posts, it may be unrealistic to display the whole body of the blog post. Instead, we'll display the short, unstyled summary you type in here. Adding a summary is not required, but advised. Your post will never be featured on the landing page no matter how many views it gets, if it has no summary.</small>
      <div class="mt-4 mb-4">
        <label for="is-published" class="block text-copy-primary text-sm font-bold mb-2">
          Publication Status
        </label>
      </div>
      <div class="relative w-full mb-4">
        <select name="is_published" id="is-published" required class="block appearance-none w-full bg-background-secondary text-copy-primary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
          <option value="unpublished" selected>Unpublished</option>
          <option value="published">Published</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
      <div class="mt-2 mb-4">
        <small class="text-copy-primary">This determines whether your post is private (and only you can see it when you're logged in) or public (and all visitors to your blog can read it). You can change this option later.</small>
      </div>
      <div class="flex flex-col items-start mb-4">
        <label for="name" class="font-semibold mb-2 text-copy-secondary">
          Lock Comments
        </label>
        <p class="mb-2 text-copy-secondary">
          @if($settings->comment_lock_policy)
            <small>Per your global site policy, this post will automatically be created with locked comments. If you don't want your posts to be created with comments automatically locked, head over to your site settings in the admin section and unlock commenting. Either way, after this post is created, you will be able to toggle the comment lock for this individual post on its edit page.</small>
            <input type="hidden" name="comments_locked" value="true">
          @else
          <small>While this is set to true, visitors will not be able to comment on this blog post. While it is set to false, visitors will be able to comment on this blog post.</small>
        </p>
        <div class="inline-block relative w-full">
          <select name="comments_locked" class="block appearance-none w-full bg-background-secondary text-copy-primary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('comments_locked') border-solid border-red-600 border-2 @enderror" required>
            <option value="true">True</option>
            <option value="false" selected>False</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-copy-primary">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>@endif
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold">
        Create Post
      </button>
    </form>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection