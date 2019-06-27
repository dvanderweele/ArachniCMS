@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script defer>
    document.addEventListener("DOMContentLoaded", (event) => {
      let KEYCODE_TAB = 9;
      // grab relevant dom elements
      const modalOverlay = document.querySelector("#modalOverlay");
      const modal = document.querySelector("#deleteVidcodeModal");
      const trashes = document.querySelectorAll(".trash");
      const deleteTarget = document.querySelector("#deleteTarget");
      const submitDelete = document.querySelector("#submitDelete");
      const dvmCancel = document.querySelector("#dvmCancel");
      const nameInput = document.querySelector("#videoname");

      for (let trash of trashes){
        trash.addEventListener("click", function(e){
          let id = trash.getAttribute("data-id");
          deleteTarget.value = id;
          openModal(modal);
          dvmCancel.focus();
        });
      }
      modalOverlay.addEventListener("click", function(e){
        closeModal(modal);
      });
      dvmCancel.addEventListener("click", function(e){
        closeModal(modal);
      });
      modal.addEventListener("keydown", function(e){
        if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
          if ( e.shiftKey ) /* shift + tab */ {
            if (document.activeElement === dvmCancel) {
              submitDelete.focus();
              e.preventDefault();
            }
          } else /* tab */ {
            if (document.activeElement === submitDelete) {
              dvmCancel.focus();
              e.preventDefault();
            }
          }
        }
        if (e.key === "Escape") {
          closeModal(modal);
          modalOverlay.classList.replace("block", "hidden");
          nameInput.focus();
        }
      });
    });

    function openModal(modal){
      modalOverlay.classList.replace("hidden", "block");
      modal.classList.replace("hidden", "block");
    }

    function closeModal(modal){
      modalOverlay.classList.replace("block", "hidden");
      modal.classList.replace("block", "hidden");
    }
  </script>
@endsection

@section('css')
  @include('includes.default-css')
  <style>
    blockquote {
      padding-left: .75rem;
      padding-right: .75rem;
      padding-top: .5rem;
      padding-bottom: .5rem;
      background: var(--bg-background-secondary);
      color: var(--text-copy-secondary);
      font-family: Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
      cursor: pointer;
    }
  </style>
@endsection

@section('nav')
  @include('includes.default-nav')
@endsection

@section('content')
  <div id="modalOverlay" class="fixed inset-0 bg-background-primary z-20 opacity-50 hidden">
  </div>
  <div id="deleteVidcodeModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="dvmCancel"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg></button>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to permanently delete this Youtube Video Code? The video will also be removed from all blog posts where you've embedded it.
      <form action="/youtubevidcodes" method="post">
        @csrf 
        @method('DELETE')
        <input type="hidden" name="id" id="deleteTarget" value="">
        <button type="submit" id="submitDelete" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Delete Forever</button>
      </form>
    </p>
  </div>
  <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans text-copy-primary" id="vidcodeinfo">
    <h1 class="font-semibold text-2xl mb-4">
      Add Youtube Video Codes
    </h1>
    <p class="mb-4">
      PocoCMS takes a unique approach to embedding videos in blog posts. This interface allows you to get it done as securely as possible, and in a way that allows you to easily embed the same video in many different blog posts without a bunch of extra work.
    </p>
    <p class="mb-4">
      The first step is to look at the URL of the video you want to embed. It should look something like this:
    </p>
    <blockquote class="mb-4">
      https://www.youtube.com/watch?v=WzW9ichudto
    </blockquote>
    <p class="mb-4">
      You don't actually need the whole URL. The only thing you need is the video code. That's this part:
    </p>
    <blockquote class="mb-4">
      WzW9ichudto
    </blockquote>
    <p class="mb-4">
      Go ahead and copy that code. <b>Note that you don't need to include the '=' sign.</b> Then, paste that code into the code box below. Before submitting the video code, make sure to also think of a unique name for the code so that it's distinguishable from other videos that you embed in your blog. 
    </p>
    <p class="mb-4">
      That's it! After you've added at least one video code in the form below, a section will appear on the edit page for all blog posts. <i>Note: you can't add embed videos from the page where you initially create blog posts; instead, you'll need to create the blog post first and then go to the edit page for that blog post.</i> It will allow you to embed as many Youtube Videos as you want in any individual blog post!
    </p>
    <p class="mb-4">
      Have fun!
    </p>
    <form action="/youtubevidcodes" method="post">
      @csrf 
      <div class="mb-4">
        <label for="videoname" class="block text-copy-primary text-sm font-bold mb-2">
          Name
        </label>
        <input type="text" name="name" id="videoname" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('name') border-solid border-red-600 border-2 @enderror" value="{{ old('name') }}" autofocus>
      </div>
      <div class="mb-4">
        <label for="videocode" class="block text-copy-primary text-sm font-bold mb-2">
          Video Code
        </label>
        <input type="text" name="code" id="videocode" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('code') border-solid border-red-600 border-2 @enderror" value="{{ old('code') }}">
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold">
        Add Video Code
      </button>
    </form>
  </div>
  @if(count($codes) > 0)
    <div id="vidcodeslist" class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto py-6 pb-6 mt-8 font-sans text-copy-primary">
      <div class="mb-4 flex flex-col justify-center items-center text-copy-primary hover:text-copy-secondary cursor-pointer w-auto">
        <p class="text-xl font-bold text-copy-primary">Youtube Video Codes</p>
        <div class="flex flex-row mt-2">
          <span class="font-bold">
            {{ $codes->count() }} of {{ $codes->total() }}
          </span>&nbsp;&nbsp;
          <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M11.603,9.833L9.357,8.785C9.161,8.694,9,8.796,9,9.013v1.974c0,0.217,0.161,0.319,0.357,0.228l2.245-1.048  C11.799,10.075,11.799,9.925,11.603,9.833z M10,0.4c-5.302,0-9.6,4.298-9.6,9.6s4.298,9.6,9.6,9.6s9.6-4.298,9.6-9.6  S15.302,0.4,10,0.4z M10,13.9c-4.914,0-5-0.443-5-3.9s0.086-3.9,5-3.9s5,0.443,5,3.9S14.914,13.9,10,13.9z"/>
          </svg>
        </div>
      </div>
      @foreach($codes as $code)
        <div class="w-full px-8 py-4 hover:bg-background-secondary hover:text-copy-secondary flex flex-row justify-between">
          <div>
            <p class="font-bold mb-2">
              Name
            </p>
            <blockquote class="mb-4">
              {{ $code->name }}
            </blockquote>  
            <p class="font-bold mb-2">
              Video Code
            </p>
            <blockquote>
              {{ $code->vidcode }}
            </blockquote>  
          </div>
          <div>
            <button type="button" class="trash" data-id="{{ $code->id }}">
              <svg version="1.1" class="fill-current w-8 h-8 hover:text-copy-primary" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                <path d="M3.389,7.113L4.49,18.021C4.551,18.482,6.777,19.998,10,20c3.225-0.002,5.451-1.518,5.511-1.979  l1.102-10.908C14.929,8.055,12.412,8.5,10,8.5C7.59,8.5,5.072,8.055,3.389,7.113z M13.168,1.51l-0.859-0.951  C11.977,0.086,11.617,0,10.916,0H9.085c-0.7,0-1.061,0.086-1.392,0.559L6.834,1.51C4.264,1.959,2.4,3.15,2.4,4.029v0.17  C2.4,5.746,5.803,7,10,7c4.198,0,7.601-1.254,7.601-2.801v-0.17C17.601,3.15,15.738,1.959,13.168,1.51z M12.07,4.34L11,3H9  L7.932,4.34h-1.7c0,0,1.862-2.221,2.111-2.522C8.533,1.588,8.727,1.5,8.979,1.5h2.043c0.253,0,0.447,0.088,0.637,0.318  C11.907,2.119,13.77,4.34,13.77,4.34H12.07z"/>
              </svg>
            </button>
          </div>
        </div>
      @endforeach
      @if($codes->count() < $codes->total())
        <div class="mt-6">
          {{ $codes->links() }}
        </div>
      @endif
    </div>
  @else 
    <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans text-center">
      <p class="font-semibold text-lg text-copy-primary">
        No Youtube Video codes yet. Add some so you can embed Youtube Videos in your blog posts!
      </p>
    </div>
  @endif
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection