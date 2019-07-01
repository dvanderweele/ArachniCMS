@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
@endsection

@section('css')
  @include('includes.default-css')
@endsection

@section('nav')
  @include('includes.default-nav')
@endsection

@section('content')
  <div class="flex flex-col lg:flex-row justify-between min-h-full">
    @include('nav.admin')
    <main class="lg:w-4/5">
      <section class="py-10 px-10 select-none font-serif">
        <p class="text-3xl text-copy-secondary">Hello, {{ auth()->user()->name }}.</p>
        <h1 class="text-6xl text-copy-secondary lg:ml-4">Welcome to <span class="font-bold font-sans text-copy-primary">PocoCMS</span>.</h1>
        <p class="text-xl text-copy-secondary mt-4 md:px-12 md:mr-4 leading-relaxed">
          PocoCMS is a blogging tool developed specifically with musicians in mind. Naturally, the standard blogging tools are available to you. You will also, however, find tools to allow you to manage your discography listings and <span class="italic">even integrate those listings with your blog posts.</span>
        </p>
        <p class="text-xl text-copy-secondary mt-4 md:px-12 md:mr-4 leading-relaxed">
          PocoCMS is a product of <a class="underline text-bold text-copy-primary" href="https://www.arachni.dev">Arachnidev LLC</a>, and it may not be resold or distributed without prior written permission.
        </p>
      </section>
    </main>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection