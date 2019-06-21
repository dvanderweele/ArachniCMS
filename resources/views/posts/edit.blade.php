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
        ['Format','Bold','Italic','-','NumberedList','BulletedList','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','Link', 'Unlink']
      ];
      CKEDITOR.replace( 'post-body');
      deleteButton = document.getElementById("delete");
      deletionOverlay = document.getElementById("deletionOverlay");
      deletionModal = document.getElementById("deletionModal");
      deleteButton.addEventListener("click", function() {
        deletionModal.classList.replace("hidden", "block");
        deletionOverlay.classList.replace("hidden", "block");
      });
      cancelDelete = document.getElementById("cancelDelete");
      cancelDelete.addEventListener("click", function(){
        deletionModal.classList.replace("block", "hidden");
        deletionOverlay.classList.replace("block", "hidden");
      });
      deletionOverlay.addEventListener("click", function(){
        deletionModal.classList.replace("block", "hidden");
        deletionOverlay.classList.replace("block", "hidden");
      });
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
  <div id="deletionOverlay" class="fixed inset-0 bg-background-primary z-20 opacity-50 hidden">

  </div>
  <div id="deletionModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <svg version="1.1" id="cancelDelete" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to permanently delete this post?
      <form action="/posts" method="post">
        @csrf 
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $post->id }}">
        <button type="submit" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-full rounded py-2 px-4 mt-4">Delete Forever</button>
      </form>
    </p>
  </div>
  <div class="max-w-2xl w-10/12 mt-8 mx-auto flex flex-col items-start">
    <a href="/posts/{{ $post->id }}" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold h-auto">
      <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
      <path d="M19,16.685c0,0-2.225-9.732-11-9.732V2.969L1,9.542l7,6.69v-4.357C12.763,11.874,16.516,12.296,19,16.685z"/>
      </svg>
    </a>
  </div>
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Edit Post</h1>
    <form action="/posts" method="post">
      @method('PATCH')
      @csrf 
      <input type="hidden" name="id" value="{{ $post->id }}">
      <div class="mb-4">
      <label for="post-title" class="block text-copy-primary text-sm font-bold mb-2">
        Post Title
      </label>
      <input type="text" name="title" id="post-title" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('title') border-solid border-red-600 border-2 @enderror" value="{{ $post->title }}" autofocus>
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
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold">
        Update Post
      </button>
    </form>
    <button type="button" id="delete" class="bg-background-ruthiesdark text-copy-primary py-2 px-4 rounded hover:text-copy-secondary font-bold w-full mt-5">
      Delete Post
    </button>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection