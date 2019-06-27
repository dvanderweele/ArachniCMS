@extends('layouts.app')

@section('title')
  {{ $post->title }} | @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script defer>
    document.addEventListener('DOMContentLoaded', (event) => {
      postBody = document.getElementById('post-body');
      anchors = postBody.getElementsByTagName("a");
      for (let anchor of anchors)
      {
        anchor.classList.add('underline');
        anchor.classList.add('font-semibold');
        anchor.classList.add('hover:text-copy-secondary');
      }
      h1s = postBody.getElementsByTagName("h1");
      for (let h1 of h1s)
      {
        h1.classList.add('text-6xl');
      }
      h2s = postBody.getElementsByTagName("h2");
      for (let h2 of h2s)
      {
        h2.classList.add('text-5xl');
      }
      h3s = postBody.getElementsByTagName("h3");
      for (let h3 of h3s)
      {
        h3.classList.add('text-4xl');
      }
      ols = postBody.getElementsByTagName("ol");
      for (let ol of ols)
      {
        ol.classList.add("list-decimal", "ml-4", "mb-4");
      }
      uls = postBody.getElementsByTagName("ul");
      for (let ul of uls)
      {
        ul.classList.add("list-disc", "ml-4", "mb-4");
      }
      ps = postBody.getElementsByTagName("p");
      for (let p of ps)
      {
        p.classList.add('mb-4');
      }
    });
  </script>
  @auth 
    <script defer>
      // modal management section
      document.addEventListener("DOMContentLoaded", (event) => {
        let KEYCODE_TAB = 9;
        // grab relevant dom elements
        const modalOverlay = document.querySelector("#modalOverlay");
        const commentBody = document.querySelector("#body");
        const deleteCommentModal = document.querySelector("#deleteCommentModal");
        const approveCommentModal = document.querySelector("#approveCommentModal");
        const unapproveCommentModal = document.querySelector("#unapproveCommentModal");
        const dcmCancel = document.querySelector("#dcmCancel");
        const acmCancel = document.querySelector("#acmCancel");
        const ucmCancel = document.querySelector("#ucmCancel");
        const deleteButtons = document.querySelectorAll(".deleteBtn");
        const approveButtons = document.querySelectorAll(".approvalBtn");
        const unapproveButtons = document.querySelectorAll(".unapprovalBtn");
        const deleteTarget = document.querySelector("#deleteTarget");
        const approveTarget = document.querySelector("#approveTarget");
        const unapproveTarget = document.querySelector("#unapproveTarget");
        const submitDelete = document.querySelector("#submitDelete");
        const submitApproval = document.querySelector("#submitApproval");
        const submitUnapproval = document.querySelector("#submitUnapproval");
        
        for (let deleteBtn of deleteButtons){
          deleteBtn.addEventListener("click", function(e){
            let id = e.target.dataset.id;
            deleteTarget.value = id;
            openModal(deleteCommentModal);
            dcmCancel.focus();
          });
        }
        for (let approveBtn of approveButtons){
          approveBtn.addEventListener("click", function(e){
            let id = e.target.dataset.id;
            approveTarget.value = id;
            openModal(approveCommentModal);
            acmCancel.focus();
          });
        }
        for (let unapproveBtn of unapproveButtons){
          unapproveBtn.addEventListener("click", function(e){
            let id = e.target.dataset.id;
            unapproveTarget.value = id;
            openModal(unapproveCommentModal);
            ucmCancel.focus();
          });
        }
        modalOverlay.addEventListener("click", function(e){
          closeModal(deleteCommentModal);
          closeModal(approveCommentModal);
          closeModal(unapproveCommentModal);
        });
        dcmCancel.addEventListener("click", function(e){
          closeModal(deleteCommentModal);
        });
        acmCancel.addEventListener("click", function(e){
          closeModal(approveCommentModal);
        });
        ucmCancel.addEventListener("click", function(e){
          closeModal(unapproveCommentModal);
        });
        deleteCommentModal.addEventListener("keydown", function(e){
          if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
              if (document.activeElement === dcmCancel) {
                submitDelete.focus();
                e.preventDefault();
              }
            } else /* tab */ {
              if (document.activeElement === submitDelete) {
                dcmCancel.focus();
                e.preventDefault();
              }
            }
          }
          if (e.key === "Escape") {
            closeModal(deleteCommentModal);
            modalOverlay.classList.replace("block", "hidden");
            commentBody.focus();
          }
        });
        approveCommentModal.addEventListener("keydown", function(e){
          if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
              if (document.activeElement === acmCancel) {
              submitApproval.focus();
                e.preventDefault();
              }
            } else /* tab */ {
              if (document.activeElement ===submitApproval) {
                acmCancel.focus();
                e.preventDefault();
              }
            }
          }
          if (e.key === "Escape") {
            closeModal(approveCommentModal);
            modalOverlay.classList.replace("block", "hidden");
            commentBody.focus();
          }
        });
        unapproveCommentModal.addEventListener("keydown", function(e){
          if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
              if (document.activeElement === ucmCancel) {
                submitUnapproval.focus();
                e.preventDefault();
              }
            } else /* tab */ {
              if (document.activeElement === submitUnapproval) {
                ucmCancel.focus();
                e.preventDefault();
              }
            }
          }
          if (e.key === "Escape") {
            closeModal(unapproveCommentModal);
            modalOverlay.classList.replace("block", "hidden");
            commentBody.focus();
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
  @endauth
@endsection

@section('css')
  @include('includes.default-css')
  <style>
    .videoWrapper {
      position: relative;
      padding-bottom: 56.25%; /* 16:9 */
      padding-top: 25px;
      height: 0;
    }
    .videoWrapper iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
@endsection

@section('nav')
  @include('includes.default-nav')
@endsection

@section('content')
  <div id="modalOverlay" class="fixed inset-0 bg-background-primary z-20 opacity-50 hidden">
  </div>
  <div id="deleteCommentModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="dcmCancel"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg></button>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to permanently delete this comment?
      <form action="/comments" method="post">
        @csrf 
        @method('DELETE')
        <input type="hidden" name="id" id="deleteTarget" value="">
        <button type="submit" id="submitDelete" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Delete Forever</button>
      </form>
    </p>
  </div>
  <div id="approveCommentModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="acmCancel"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg></button>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to approve this comment and make it publicly visible?
      <form action="/comments" method="post">
        @csrf 
        @method('PATCH')
        <input type="hidden" name="id" id="approveTarget" value="">
        <input type="hidden" name="approve" value="true">
        <button type="submit" id="submitApproval" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Approve Comment</button>
      </form>
    </p>
  </div>
  <div id="unapproveCommentModal" class="fixed z-30 bg-background-primary border text-copy-primary rounded mx-auto max-w-3xl w-11/12 hidden text-center py-4 px-6 container inset-x-0 h-auto my-8 md:my-16">
    <div class="flex flex-row justify-end">
      <button type="button" id="ucmCancel"><svg version="1.1" class="fill-current h-8 w-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M16,2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C18,2.9,17.1,2,16,2z M13.061,14.789  L10,11.729l-3.061,3.06L5.21,13.061L8.271,10l-3.06-3.061L6.94,5.21L10,8.271l3.059-3.061l1.729,1.729L11.729,10l3.06,3.061  L13.061,14.789z"/>
      </svg></button>
    </div>
    <p class="font-bold text-2xl">
      Are you sure you want to unapprove this comment and hide it from public view?
      <form action="/comments" method="post">
        @csrf 
        @method('PATCH')
        <input type="hidden" name="id" id="unapproveTarget" value="">
        <input type="hidden" name="unapprove" value="true">
        <button type="submit" id="submitUnapproval" class="bg-background-secondary border text-copy-secondary hover:text-copy-primary font-bold w-5/6 rounded py-2 px-4 mt-4">Unapprove Comment</button>
      </form>
    </p>
  </div>
  <div class="max-w-2xl w-10/12 mt-8 mx-auto flex flex-col items-start">
    <a href="/posts" class="border bg-background-primary text-copy-secondary py-2 px-4 rounded hover:bg-background-secondary font-bold h-auto">
      <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
      <path d="M19,16.685c0,0-2.225-9.732-11-9.732V2.969L1,9.542l7,6.69v-4.357C12.763,11.874,16.516,12.296,19,16.685z"/>
      </svg>
    </a>
  </div>
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans relative">
    @auth 
      <a href="/posts/{{ $post->id }}/edit" class="text-copy-primary py-2 px-4 rounded hover:text-copy-secondary font-bold h-auto mr-4 absolute top-0 right-0 mt-4">
        <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M17.561,2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984,7.264L2.21,14.037L1.2,18.799l4.763-1.01  l6.774-6.771l6.052-6.052C18.788,4.966,19.005,3.883,17.561,2.439z M5.68,17.217l-1.624,0.35c-0.156-0.293-0.345-0.586-0.69-0.932  c-0.346-0.346-0.639-0.533-0.932-0.691l0.35-1.623l0.47-0.469c0,0,0.883,0.018,1.881,1.016c0.997,0.996,1.016,1.881,1.016,1.881  L5.68,17.217z"/>
        </svg>
      </a>
    @endauth
    <div class="flex flex-row">
      <h1 class="font-semibold text-2xl text-copy-primary mb-4">
        {{ $post->title }}
      </h1>
    </div>
    <div class="my-4 cursor-default flex flex-row justify-around">
    @auth
      <span class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm">{{ $post->is_published ? 'Published' : 'Unpublished' }}</span>
    @endauth
      <span class="border w-auto bg-background-secondary text-copy-primary hover:text-copy-secondary font-semibold rounded-full py-2 px-4 text-sm">{{ date('F d, Y', strtotime($post->updated_at)) }}</span>
    </div>
    <div id="post-body" class="text-copy-primary mx-6 my-4">
      {!! $post->body !!}
    </div>
    <div class="mb-8 mx-6">
      @foreach($post->youtubevidembeds as $embed)
        <div class="mb-8 videoWrapper absolute w-full h-0">
          <iframe width="560" height="349" src="https://www.youtube.com/embed/{{ $embed->youtubevidcode->vidcode }}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      @endforeach
    </div>
  </div>
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto pt-6 pb-8 mt-8 font-sans relative">
    <div class="flex flex-col items-start px-8">
      <h1 class="font-semibold text-2xl text-copy-primary mb-4">
        Comments
      </h1>
      <p class="mb-4 text-copy-primary">
        @guest 
          Feel free to leave a respectful comment. All comments, without exception, are subject to a manual approval process. If you misbehave and fail to act like a decent person, you will be banned from the site.
        @endguest 
        @auth 
          Here, visitors to your site will see a warning that admonishes them to be respectful and decent when commenting. It also warns them that they can be banned if they fail to do so.
        @endauth
      </p>
      <p class="mb-4 text-copy-primary">
        @auth 
          All comments are shown below. There is one section each for approved and unapproved comments.
        @endauth 
        @guest 
          Only comments that have been manually approved are shown below. If yours is awaiting approval, thank you for your patience!
        @endguest
      </p>
    </div>
    @auth 
      <form action="/comments" method="post" class="px-8 pb-10">
        @csrf 
        <input type="hidden" name="post_id" value="{{ $post->id }}" required>
        <div class="flex flex-col items-start mt-4 text-copy-secondary">
          <label for="body" class="font-semibold mb-2">Comment</label>
          <textarea name="body" id="body" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('body') border-solid border-red-600 border-2 @enderror">{{ old('body') }}</textarea>
        </div>
        <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold mt-4">Submit</button>
      </form>
    @endauth
    @guest
      <form action="/comments" method="post" class="px-8 pb-10">
        @csrf 
        <input type="hidden" name="post_id" value="{{ $post->id }}" required>
        <div class="flex flex-col items-start">
          <label for="name" class="font-semibold mb-2 text-copy-secondary">Name</label>
          <input type="text" name="name" id="name" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('name') border-solid border-red-600 border-2 @enderror" value="{{ old('name') }}" autofocus>
        </div>
        <div class="flex flex-col items-start mt-4">
          <label for="email" class="font-semibold mb-2 text-copy-secondary">Email Address</label>
          <input type="email" name="email" id="email" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('email') border-solid border-red-600 border-2 @enderror" value="{{ old('email') }}">
        </div>
        <div class="flex flex-col items-start mt-4 text-copy-secondary">
          <label for="body" class="font-semibold mb-2">Comment</label>
          <textarea name="body" id="body" required class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('body') border-solid border-red-600 border-2 @enderror">{{ old('body') }}</textarea>
        </div>
        <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold mt-4">Submit</button>
      </form>
    @endguest
    <div class="">
      @auth 
        @if(count($unapproved) > 0)
          <div class="mb-4 flex flex-col justify-center items-center text-copy-primary hover:text-copy-secondary cursor-pointer w-auto">
            <p class="text-xl font-bold text-copy-primary">Unapproved</p>
            <div class="flex flex-row mt-2">
              <span class="font-bold">
                {{ $unapproved->count() }} of {{ $unapproved->total() }}
              </span>&nbsp;&nbsp;
              <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                <path d="M5.8,12.2V6H2C0.9,6,0,6.9,0,8v6c0,1.1,0.9,2,2,2h1v3l3-3h5c1.1,0,2-0.9,2-2v-1.82  c-0.064,0.014-0.132,0.021-0.2,0.021h-7V12.2z M18,1H9C7.9,1,7,1.9,7,3v8h7l3,3v-3h1c1.1,0,2-0.899,2-2V3C20,1.9,19.1,1,18,1z"/>
              </svg>
            </div>
          </div>
          @foreach($unapproved as $comment)
            <div class="hover:bg-background-primary bg-background-secondary hover:text-copy-primary px-8 text-copy-secondary py-4 mb-3">
              <div class="mb-4">
                <p class="font-semibold">Commenter Name: </p>{{ $comment->name }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Commenter Email: </p>{{ $comment->email }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Commenter IP Address: </p>{{ $comment->ip_address }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Date: </p>{{ date('F d, Y', strtotime($comment->created_at)) }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Comment: </p>{{ $comment->body }}
              </div>
              <div class="flex flex-row w-full mb-3 justify-around">
                <button type="button" class="approvalBtn border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold" data-id="{{ $comment->id }}">Approve</button>
                <button type="button" class="deleteBtn border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold" data-id="{{ $comment->id }}">Delete</button>
              </div>
            </div>
          @endforeach
          <p class="my-4 pt-2">
            {{ $unapproved->links() }}
          </p>
        @else 
          <p class="px-8 pt-4 font-semibold text-lg text-copy-primary text-center">
            No unapproved comments right now.
          </p>
        @endif
      @endauth
      @if(count($approved) > 0)
        <div class="my-4 flex flex-col justify-center items-center text-copy-primary hover:text-copy-secondary cursor-pointer w-auto">
          <p class="text-xl font-bold text-copy-primary">Approved</p>
          <div class="flex flex-row mt-2">
            <span class="font-bold">
                {{ $approved->count() }} of {{ $approved->total() }}
            </span>&nbsp;&nbsp;
            <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M5.8,12.2V6H2C0.9,6,0,6.9,0,8v6c0,1.1,0.9,2,2,2h1v3l3-3h5c1.1,0,2-0.9,2-2v-1.82  c-0.064,0.014-0.132,0.021-0.2,0.021h-7V12.2z M18,1H9C7.9,1,7,1.9,7,3v8h7l3,3v-3h1c1.1,0,2-0.899,2-2V3C20,1.9,19.1,1,18,1z"/>
            </svg>
          </div>
        </div>
        @foreach($approved as $comment)
          @auth
            <div class="hover:bg-background-primary bg-background-secondary hover:text-copy-primary px-8 text-copy-secondary py-4 mb-3">
              <div class="mb-4">
                <p class="font-semibold">Commenter Name: </p>{{ $comment->name }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Commenter Email: </p>{{ $comment->email }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Commenter IP Address: </p>{{ $comment->ip_address }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Date: </p>{{ date('F d, Y', strtotime($comment->created_at)) }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Comment: </p>{{ $comment->body }}
              </div>
              <div class="flex flex-row w-full mb-3 justify-around">
                <button type="button" class="unapprovalBtn border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold" data-id="{{ $comment->id }}">Unapprove</button>
                <button type="button" class="deleteBtn border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold" data-id="{{ $comment->id }}">Delete</button>
              </div>
            </div>
          @endauth
          @guest
            <div class="hover:bg-background-primary bg-background-secondary hover:text-copy-primary px-8 text-copy-secondary py-4 mb-3">
              <div class="mb-4">
                <p class="font-semibold">Commenter Name: </p>{{ $comment->name }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Date: </p>{{ date('F d, Y', strtotime($comment->created_at)) }}
              </div>
              <div class="mb-3">
                <p class="font-semibold">Comment: </p>{{ $comment->body }}
              </div>
            </div>
          @endguest
        @endforeach
        <p class="my-4 pt-2">
          {{ $approved->links() }}
        </p>
      @else 
      <p class="px-8 pt-4 font-semibold text-lg text-copy-primary text-center">
        @auth 
          No approved comments right now.
        @endauth
        @guest 
          No comments yet. This is your chance!
        @endguest
      </p>
      @endif
    </div>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection