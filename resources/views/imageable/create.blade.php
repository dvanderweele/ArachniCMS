@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
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
  <div class="max-w-2xl w-10/12 bg-background-primary text-copy-primary shadow-lg rounded mx-auto pt-6 pb-8 mt-8 font-sans">
    <h1 class="font-semibold text-2xl mb-4 px-8">Embed Photos</h1>
    @if($post)
      <p class="text-lg mb-6 px-8"><span class="text-copy-secondary font-bold">Post Title:</span><br class="mb-3"><a href="/posts/{{ $post->url_string }}/edit" class="text-blue-500 underline">{{ $post->title }}</a></p>
      @if($post->summary != null)
        <p class="text-lg mb-6 px-8"><span class="text-copy-secondary font-bold">Post Description:</span><br class="mb-3">{{ $post->summary }}</p>
      @else 
        <p class="text-lg mb-4 px-8"><span class="text-copy-secondary font-bold">Post Description:</span>None.</p>
      @endif
      @if(count($images) > 0)
        <div class="flex flex-row mt-2 mx-auto w-full justify-center">
          <span class="font-bold">
            {{ $images->count() }} of {{ $images->total() }}
          </span>&nbsp;&nbsp;
          <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M17.125,6.17l-2.046-5.635c-0.151-0.416-0.595-0.637-0.989-0.492L0.492,5.006  C0.098,5.15-0.101,5.603,0.051,6.019l2.156,5.941V8.777c0-1.438,1.148-2.607,2.56-2.607H8.36l4.285-3.008l2.479,3.008H17.125z   M19.238,8H4.767c-0.42,0-0.762,0.334-0.762,0.777v9.42C4.006,18.641,4.348,19,4.767,19h14.471C19.658,19,20,18.641,20,18.197v-9.42  C20,8.334,19.658,8,19.238,8z M18,17H6v-2l1.984-4.018l2.768,3.436l2.598-2.662l3.338-1.205L18,14V17z"/>
          </svg>
        </div>
        @foreach($images as $image)
          <div class="hover:bg-background-secondary my-4 py-4 px-8 w-full">
            <div class="flex flex-row justify-between items-start w-full">
              <img src="/storage/img/{{ $image->location }}" alt="{{ $image->description }}" class="w-2/3 mb-4"> 
              <form action="/imageables" method="post">
                @csrf 
                <input type="hidden" name="imageable_type" value="App\Post">
                <input type="hidden" name="imageable_id" value="{{ $post->url_string }}">
                <input type="hidden" name="image_id" value="{{ $image->id }}">
                <button type="submit">
                  <svg version="1.1" class="fill-current hover:text-copy-secondary w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                    <path d="M10,1.6c-4.639,0-8.4,3.761-8.4,8.4s3.761,8.4,8.4,8.4s8.4-3.761,8.4-8.4S14.639,1.6,10,1.6z M15,11h-4v4H9  v-4H5V9h4V5h2v4h4V11z"/>
                  </svg>
                </button>
              </form>
            </div>
            <p class="font-bold mb-2">
              Image Description
            </p>
            <blockquote>
              {{ $image->description }}
            </blockquote> 
          </div>
        @endforeach
        @if($images->count() < $images->total())
          <div class="mt-6">
            {{ $images->links() }}
          </div>
        @endif
      @else 
        <p class="mb-4 text-copy-primary text-lg px-8">
          Looks like you haven't uploaded any photos yet! You have to upload photos to your collection before you can embed them in your blog posts. <a href="/images" class="text-blue-500 underline">Go here</a> to upload images and manage your collection. You can also get there by going to the Admin section.
        </p>
      @endif
    @elseif ($album)

    @endif
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection