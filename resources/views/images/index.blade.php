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
      const modal = document.querySelector("#deleteImageModal");
      const trashes = document.querySelectorAll(".trash");
      const deleteTarget = document.querySelector("#deleteTarget");
      const submitDelete = document.querySelector("#submitDelete");
      const dimCancel = document.querySelector("#dimCancel");
      const uploadbtn = document.querySelector("#uploadbtn");

      for (let trash of trashes){
        trash.addEventListener("click", function(e){
          let id = trash.getAttribute("data-id");
          deleteTarget.value = id;
          openModal(modal);
          dimCancel.focus();
        });
      }
      modalOverlay.addEventListener("click", function(e){
        closeModal(modal);
      });
      dimCancel.addEventListener("click", function(e){
        closeModal(modal);
      });
      modal.addEventListener("keydown", function(e){
          if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
              if (document.activeElement === dimCancel) {
                submitDelete.focus();
                e.preventDefault();
              }
            } else /* tab */ {
              if (document.activeElement === submitDelete) {
                dimCancel.focus();
                e.preventDefault();
              }
            }
          }
          if (e.key === "Escape") {
            closeModal(modal);
            modalOverlay.classList.replace("block", "hidden");
            uploadbtn.focus();
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
  <div id="deleteImageModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="dimCancel"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg></button>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to permanently delete this Image? The image will also be removed from all blog posts and albums that feature it.
      <form action="/images" method="post">
        @csrf 
        @method('DELETE')
        <input type="hidden" name="id" id="deleteTarget" value="">
        <button type="submit" id="submitDelete" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Delete Forever</button>
      </form>
    </p>
  </div>
  <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans text-copy-primary" id="imageinfo">
    <h1 class="font-semibold text-2xl mb-4">
      Add Images
    </h1>
    <p class="mb-4">
      Welcome to the Image Storage interface for PocoCMS. This interface allows you to store each photo that you want to use on your website <span class="font-bold">one time</span> rather than multiple times &mdash; no matter how many times you want to use that image. This helps you save valuable storage space.
    </p>
    <p class="mb-4">
      So go ahead and upload and manage your image collection here. Whenever you want to use an image in a blog post or as an album cover, go ahead and go to the editing page for that blog post or album, and you will be directed to a page which will allow you to select which image(s) in your image store you want to be featured by that blog post or album.
    </p>
    <p class="mb-4">
      Do note that when you upload an image, it is mandatory to also provide a written description for that image. This ensures that your website is as accessible as possible, such as for users of screen readers or in poor network conditions.
    </p>
    <p class="mb-4">
      Also note that the max upload size for an image is 2MB, so if your image is larger than that, you will need to resize it by way of image manipulation software, such as GIMP.
    </p>
    <p class="mb-8">
      Finally, please note that, while it is not possible for strangers to visit your site and delete or deface these images, or even upload new ones, it is possible for everyone to see the images you upload here, even before you use them in a blog post or album. <b>This is a publically viewable storage space.</b> Therefore, don't upload anything that you want kept private.
    </p>
    <p class="mb-8">
      Have fun!
    </p>
    <form action="/images" method="post" enctype="multipart/form-data">
      @csrf 
      <div class="mb-4">
        <label for="image_file" class="block text-copy-primary text-sm font-bold mb-3">
          Upload An Image
        </label>
        <input type="file" name="image_file" id="image_file" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('image_file') border-solid border-red-600 border-2 @enderror">
      </div>
      <div class="mb-4">
        <label for="image_description" class="block text-copy-primary text-sm font-bold mb-3">
          Image Description
        </label>
        <input type="text" name="image_description" id="image_description" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('image_description') border-solid border-red-600 border-2 @enderror" value="{{ old('image_description') }}">
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold">
        Upload Image
      </button>
    </form>
  </div>
  @if(count($images) > 0)
    <div id="imageslist" class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto py-6 pb-6 mt-8 font-sans text-copy-primary">
      <div class="mb-4 flex flex-col justify-center items-center text-copy-primary hover:text-copy-secondary cursor-pointer w-auto">
        <h2 class="text-xl font-bold text-copy-primary">Images</h2>
        <div class="flex flex-row mt-2">
          <span class="font-bold">
            {{ $images->count() }} of {{ $images->total() }}
          </span>&nbsp;&nbsp;
          <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M19,2H1C0.447,2,0,2.447,0,3v14c0,0.552,0.447,1,1,1h18c0.553,0,1-0.448,1-1V3C20,2.448,19.553,2,19,2z   M18,16H2V4h16V16z M14.315,10.877l-3.231,1.605l-3.77-6.101L4,14h12L14.315,10.877z M13.25,9c0.69,0,1.25-0.56,1.25-1.25  S13.94,6.5,13.25,6.5S12,7.06,12,7.75S12.56,9,13.25,9z"/>
          </svg>
        </div>
      </div>
      @foreach($images as $image)
        <div class="w-full px-8 py-4 hover:bg-background-secondary hover:text-copy-secondary flex flex-row justify-between">
          <div>
            <img src="/storage/img/{{ $image->location }}" alt="{{ $image->description }}" class="w-2/3 mb-4"> 
            <p class="font-bold mb-2">
              Image Description
            </p>
            <blockquote>
              {{ $image->description }}
            </blockquote>  
            @if(count($image->posts) > 0)
              <p class="font-bold mb-2">
                Blog Posts Featuring This Image
              </p>
              <blockquote>
                <ul>
                @foreach($image->posts as $post)
                  <li>{{ $post->title }}</li>
                @endforeach
                </ul>
              </blockquote>  
            @endif
            @if(count($image->albums) > 0)
              <p class="font-bold mb-2">
                Albums Featuring This Image
              </p>
              <blockquote>
                <ul>
                @foreach($image->albums as $album)
                  <li>{{ $album->title }}</li>
                @endforeach
                </ul>
              </blockquote>  
            @endif
          </div>
          <div>
            <button type="button" class="trash" data-id="{{ $image->id }}">
              <svg version="1.1" class="fill-current w-8 h-8 hover:text-copy-primary" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                <path d="M3.389,7.113L4.49,18.021C4.551,18.482,6.777,19.998,10,20c3.225-0.002,5.451-1.518,5.511-1.979  l1.102-10.908C14.929,8.055,12.412,8.5,10,8.5C7.59,8.5,5.072,8.055,3.389,7.113z M13.168,1.51l-0.859-0.951  C11.977,0.086,11.617,0,10.916,0H9.085c-0.7,0-1.061,0.086-1.392,0.559L6.834,1.51C4.264,1.959,2.4,3.15,2.4,4.029v0.17  C2.4,5.746,5.803,7,10,7c4.198,0,7.601-1.254,7.601-2.801v-0.17C17.601,3.15,15.738,1.959,13.168,1.51z M12.07,4.34L11,3H9  L7.932,4.34h-1.7c0,0,1.862-2.221,2.111-2.522C8.533,1.588,8.727,1.5,8.979,1.5h2.043c0.253,0,0.447,0.088,0.637,0.318  C11.907,2.119,13.77,4.34,13.77,4.34H12.07z"/>
              </svg>
            </button>
          </div>
        </div>
      @endforeach
      @if($images->count() < $images->total())
        <div class="mt-6">
          {{ $images->links() }}
        </div>
      @endif
    </div>
  @else 
    <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans text-center">
      <p class="font-semibold text-lg text-copy-primary">
        No images yet. Add some so you can embed images in your blog posts and albums!
      </p>
    </div>
  @endif
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection