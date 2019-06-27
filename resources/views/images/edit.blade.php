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
  <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans text-copy-primary" id="imageedit">
    <h1 class="font-semibold text-2xl mb-4">
      Edit Image Description
    </h1>
    <form action="/images" method="post" class="mb-4">
      @csrf 
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $image->id }}">
      <div class="mb-4">
        <label for="description" class="block text-copy-primary text-sm font-bold mb-3">
          Image Description
        </label>
        <input type="text" name="description" id="description" class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('description') border-solid border-red-600 border-2 @enderror" value="{{ $image->description }}">
      </div>
      <button type="submit" class="border bg-background-secondary text-copy-secondary py-2 px-4 rounded hover:bg-background-primary font-bold">
        Update
      </button>
    </form>
    <img src="/storage/img/{{ $image->location }}" alt="{{ $image->description }}" class="w-2/3 mb-4 mx-auto"> 
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection