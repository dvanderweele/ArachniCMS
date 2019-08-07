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
    <article class="lg:w-4/5">
      <section class="py-10 px-10 select-none font-serif">
        <p class="text-3xl text-copy-secondary">Hello, {{ auth()->user()->name }}.</p>
        <h1 class="text-6xl text-copy-secondary lg:ml-4">Welcome to <span class="font-bold font-sans text-copy-primary">ArachniCMS 1.0.0</span>.</h1>
        <p class="text-xl text-copy-secondary mt-4 md:px-12 md:mr-4 leading-relaxed">
          ArachniCMS is a versatile blogging platform designed to enhance your experience of publishing and operating a website. Naturally, the standard blogging tools are available to you. You should go to the Settings page and familiarize yourself with the available options.
        </p>
        <p class="text-xl text-copy-secondary mt-4 md:px-12 md:mr-4 leading-relaxed">
          Not all features require configuration on your part; for example, an RSS feed is generated for your blog posts automatically, and forms for submitting comments are similarly protected from spam by way of a honeypot system and other server-side security measures.
        </p>
        <p class="text-xl text-copy-secondary mt-4 md:px-12 md:mr-4 leading-relaxed">
          ArachniCMS is a product of <a class="underline text-bold text-copy-primary" href="https://www.arachni.dev">Arachnidev LLC</a>, and it may not be modified, resold, or redistributed without explicit prior written permission.
        </p>
      </section>
    </article>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection