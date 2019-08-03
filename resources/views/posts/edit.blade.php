@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('js/dpo-fed-s1.js') }}"></script>
  @if(count($post->images))
    <script src="{{ asset('js/dpo-fed-s2.js') }}"></script>
  @endif
@endsection

@section('css')
  @include('includes.default-css')
  <link rel="stylesheet" href="{{ asset('css/dpo-fed-s1.css') }}">
@endsection

@section('nav')
  @include('includes.default-nav')
@endsection

@section('content')
  <div id="deletionOverlay" class="fixed inset-0 bg-background-primary z-20 opacity-50 hidden">

  </div>
  <div id="deletionModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="cancelDelete"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to permanently delete this post?
      <form action="/posts" method="post">
        @csrf 
        @method('DELETE')
        <input type="hidden" name="url_string" value="{{ $post->url_string }}">
        <button type="submit" id="submitDelete" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Delete Forever</button>
      </form>
    </p>
  </div>
  <div id="imageableDeletionModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="idmClose"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to remove this image from this post?
      <form action="/imageables" method="post">
        @csrf 
        @method('DELETE')
        <input type="hidden" name="imageable_type" value="App\Post">
        <input type="hidden" name="imageable_id" value="{{ $post->url_string }}">
        <input type="hidden" name="image_id" value="" id="imageableImageIdInput">
        <button type="submit" id="deleteImageableBtn" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Delete</button>
      </form>
    </p>
  </div>
  <div class="max-w-2xl w-10/12 mt-8 mx-auto flex flex-col items-start">
    <a href="/posts/{{ $post->url_string }}" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold h-auto">
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
      <input type="hidden" name="url_string" value="{{ $post->url_string }}">
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
      <div class="flex flex-col items-start mb-4">
        <label for="name" class="font-semibold mb-2 text-copy-secondary">
          Lock Comments
        </label>
        <p class="mb-2 text-copy-secondary">
          <small>While this is set to true, visitors will not be able to comment on this blog post. While it is set to false, visitors will be able to comment on this blog post.</small>
        </p>
        <div class="inline-block relative w-full">
          <select name="comments_locked" class="block appearance-none w-full bg-background-secondary text-copy-primary border px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('comments_locked') border-solid border-red-600 border-2 @enderror" value="{{ $post->comments_locked ? 'true' : 'false' }}" required>
            <option value="true" {{ $post->comments_locked ? 'selected' : '' }}>True</option>
            <option value="false" {{ $post->comments_locked ? '' : 'selected' }}>False</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-copy-primary">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold w-full">
        Update Post
      </button>
    </form>
    <button type="button" id="delete" class="bg-orange-500 hover:bg-orange-600 text-white hover:text-gray-200 py-2 px-4 rounded font-bold w-full mt-10">
      Delete Post
    </button>
  </div>
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Youtube Videos</h1>
    @if(count($post->youtubevidembeds) > 0)
      @foreach($post->youtubevidembeds as $embed)
        <div class="mb-8 videoWrapper absolute w-full h-0">
          <iframe width="560" height="349" src="https://www.youtube.com/embed/{{ $embed->youtubevidcode->vidcode }}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <form action="/youtubevidembeds" method="post" class="mb-16">
          @csrf 
          @method('DELETE') 
          <input type="hidden" name="embed_id" value="{{ $embed->id }}">
          <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white hover:text-gray-200 py-2 px-4 rounded font-bold w-full">
            Remove Video from Post
          </button>
        </form>
      @endforeach
      <button type="button" class="border bg-background-secondary text-copy-secondary rounded hover:bg-background-primary py-2 px-4 mb-2"><a href="/youtubevidembeds/{{ $post->url_string }}" class="font-bold text-center">Embed More Videos</a></button>
      <p class="mb-2 font-bold text-copy-primary">WARNING: if you decide to click that button to start embedding videos, you will navigate to a different page, and any unsaved progress on your post above will be lost.</p>
    @else 
      <p class="text-copy-primary mb-8 text-copy-primary">
        Looks like you haven't embedded any YouTube videos in this post yet. Click the button below to get started. <span class="font-bold">WARNING: if you decide to click that button to start adding videos, you will navigate to a different page, and any unsaved progress on your post above will be lost.</span>
      </p>
      <a href="/youtubevidembeds/{{ $post->url_string }}" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold text-center">Embed Videos</a>
    @endif
  </div>
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Images</h1>
    @if(count($post->images) > 0)
      @foreach($post->images as $image)
      <div class="flex flex-row justify-between">
        <div class="mb-6 text-copy-primary">
          <img src="/storage/img/{{ $image->location }}" alt="{{ $image->description }}" class="w-2/3 mb-4">
          <p class="font-bold mb-2">
            Image Description
          </p>
          <blockquote>
            {{ $image->description }}
          </blockquote> 
        </div>
        <div>
          <button type="button" class="trashImageable" data-id="{{ $image->id }}">
            <svg version="1.1" class="fill-current w-8 h-8 text-copy-primary hover:text-copy-secondary" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M3.389,7.113L4.49,18.021C4.551,18.482,6.777,19.998,10,20c3.225-0.002,5.451-1.518,5.511-1.979  l1.102-10.908C14.929,8.055,12.412,8.5,10,8.5C7.59,8.5,5.072,8.055,3.389,7.113z M13.168,1.51l-0.859-0.951  C11.977,0.086,11.617,0,10.916,0H9.085c-0.7,0-1.061,0.086-1.392,0.559L6.834,1.51C4.264,1.959,2.4,3.15,2.4,4.029v0.17  C2.4,5.746,5.803,7,10,7c4.198,0,7.601-1.254,7.601-2.801v-0.17C17.601,3.15,15.738,1.959,13.168,1.51z M12.07,4.34L11,3H9  L7.932,4.34h-1.7c0,0,1.862-2.221,2.111-2.522C8.533,1.588,8.727,1.5,8.979,1.5h2.043c0.253,0,0.447,0.088,0.637,0.318  C11.907,2.119,13.77,4.34,13.77,4.34H12.07z"/>
            </svg>
          </button>
        </div>
      </div>
      @endforeach
      <button class=""><a href="/imageables/post/{{ $post->url_string }}/create" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold text-center">Embed More Photos</a></button>
      <p class="mb-2 font-bold my-4 text-copy-primary">WARNING: if you decide to click that button to start embedding photos, you will navigate to a different page, and any unsaved progress on your post above will be lost.</p>
    @else 
      <p class="text-copy-primary mb-8 text-copy-primary">
        Looks like you haven't embedded any photos in this post yet. Click the button below to get started. <span class="font-bold">WARNING: if you decide to click that button to start adding photos, you will navigate to a different page, and any unsaved progress on your post above will be lost.</span>
      </p>
      <a href="/imageables/post/{{ $post->url_string }}/create" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold text-center">Embed Photos</a>
    @endif
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection