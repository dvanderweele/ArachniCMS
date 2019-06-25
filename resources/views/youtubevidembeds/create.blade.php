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
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">Embed Youtube Videos</h1>
    <p class="text-lg text-copy-primary mb-4"><span class="text-copy-secondary font-bold">Post Title:&nbsp;</span> {{ $post->title }}</p>
    @if($post->summary != null)
      <p class="text-lg text-copy-primary mb-4"><span class="text-copy-secondary font-bold">Post Description:&nbsp;</span>{{ $post->summary }}</p>
    @else 
      <p class="text-lg text-copy-primary mb-4"><span class="text-copy-secondary font-bold">Post Summary:&nbsp;</span>None.</p>
    @endif
    @if(count($youtubevidcodes) > 0)
      <div class="mb-4 flex flex-col justify-center items-center text-copy-primary w-auto">
        <p class="text-xl mt-2 font-bold text-copy-primary">Youtube Video Codes</p>
        <div class="flex flex-row mt-2">
          <span class="font-bold">
            {{ $youtubevidcodes->count() }} of {{ $youtubevidcodes->total() }}
          </span>&nbsp;&nbsp;
          <svg version="1.1" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M11.603,9.833L9.357,8.785C9.161,8.694,9,8.796,9,9.013v1.974c0,0.217,0.161,0.319,0.357,0.228l2.245-1.048  C11.799,10.075,11.799,9.925,11.603,9.833z M10,0.4c-5.302,0-9.6,4.298-9.6,9.6s4.298,9.6,9.6,9.6s9.6-4.298,9.6-9.6  S15.302,0.4,10,0.4z M10,13.9c-4.914,0-5-0.443-5-3.9s0.086-3.9,5-3.9s5,0.443,5,3.9S14.914,13.9,10,13.9z"/>
          </svg>
        </div>
      </div>
      @foreach($youtubevidcodes as $code)
        <div class="w-full px-8 py-4 justify-between text-copy-secondary">
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
            <blockquote class="mb-4">
              {{ $code->vidcode }}
            </blockquote>  
            @if(count($code->youtubevidembeds) > 0)
              <p class="font-bold mb-2">
                Posts this video already appears in
              </p>
              <blockquote class="mb-6">
                  @foreach($code->youtubevidembeds as $embed) 
                    <ul>
                      <li><span class="font-bold">Title:&nbsp;</span>{{ $embed->post->title }}</li>
                    </ul>
                  @endforeach
              </blockquote> 
            @endif
            <form action="/youtubevidembeds" method="post">
              @csrf 
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <input type="hidden" name="vidcode_id" value="{{ $code->id }}">
              <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold w-full">Embed Video</button>
            </form>
          </div>
        </div>
      @endforeach
      @if($youtubevidcodes->count() < $youtubevidcodes->total())
        <div class="mt-6">
          {{ $youtubevidcodes->links() }}
        </div>
      @endif
    @else 
      <p class="text-xl text-copy-primary font-semibold mb-4">No YouTube Video Codes are available to embed in your blog post.</p>
        @if(count($post->youtubevidembeds) > 0)
          <p class="text-xl text-copy-primary font-semibold mb-4">It looks like you have already embedded all available video codes into this blog post.</p>
          <a href="/youtubevidcodes" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold text-center">Add more here</a>
        @else 
          <p class="text-xl text-copy-primary font-semibold mb-4">Looks like you haven't added any Youtube Video Codes yet!</p>
          <a href="/youtubevidcodes" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold text-center">Add some here</a>
        @endif
    @endif
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection