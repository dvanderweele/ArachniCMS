@extends('layouts.app')

@section('title')
  {{ $post->title }} | @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
  <script>
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
        ol.classList.add('list-disc');
      }
      uls = postBody.getElementsByTagName("ul");
      for (let ul of uls)
      {
        ul.classList.add('list-decimal');
      }
      ps = postBody.getElementsByTagName("p");
      for (let p of ps)
      {
        p.classList.add('mb-4');
      }
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
    <div id="post-body" class="text-copy-primary mx-6 ">
      {!! $post->body !!}
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
          All comments are shown below, including unapproved ones. Go to the admin area to approve comments.
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
      @if(count($comments) > 0)
        <div class="mb-4 flex flex-row justify-center items-center text-copy-primary hover:text-copy-secondary cursor-pointer w-auto">
          <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M5.8,12.2V6H2C0.9,6,0,6.9,0,8v6c0,1.1,0.9,2,2,2h1v3l3-3h5c1.1,0,2-0.9,2-2v-1.82  c-0.064,0.014-0.132,0.021-0.2,0.021h-7V12.2z M18,1H9C7.9,1,7,1.9,7,3v8h7l3,3v-3h1c1.1,0,2-0.899,2-2V3C20,1.9,19.1,1,18,1z"/>
            </svg>&nbsp;x&nbsp;<span class="font-bold">
              @guest
                {{ count($comments->where('approved', true)) }}
              @endguest
              @auth 
                {{ count($comments) }}
              @endauth
            </span>
        </div>
        @foreach($comments as $comment)
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
                <p class="font-semibold">Approved: </p>
                @if($comment->approved)
                  {{ date('F d, Y', strtotime($comment->updated_at)) }}
                @else 
                  Not yet.
                @endif
              </div>
              <div class="mb-3">
                <p class="font-semibold">Comment: </p>{{ $comment->body }}
              </div>
            </div>
          @endauth
          @guest
            @if($comment->approved)
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
            @endif
          @endguest
        @endforeach
        <p class="my-4 pt-2">
          {{ $comments->links() }}
        </p>
      @else 
      <p class="font-semibold text-lg text-copy-primary">
        No comments yet. This is your opportunity!
      </p>
      @endif
    </div>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection