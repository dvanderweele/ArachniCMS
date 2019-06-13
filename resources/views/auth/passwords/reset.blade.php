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
<div class="max-w-lg w-10/12 h-auto bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-20 md:mt-24 lg:mt-32 mb-4 font-sans text-copy-primary">
  <div class="mb-4">
    <h4 class="font-semibold text-2xl">{{ __('Reset Password') }}</h4>
  </div>
  <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="mb-4">
      <label class="block text-copy-secondary text-sm font-bold mb-2" for="email">
          {{ __('E-Mail Address') }}
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-copy-secondary leading-tight focus:outline-none focus:bg-background-ruthieslight focus:shadow-outline @error('email') border-solid border-red-600 border-2 @enderror" id="email" name="email" type="text" placeholder="email@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
      @error('email')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label class="block text-copy-secondary text-sm font-bold mb-2" for="password">
          {{ __('Password') }}
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-copy-secondary leading-tight focus:bg-background-ruthieslight focus:outline-none focus:shadow-outline @error('password') border-solid border-red-600 border-2 @enderror" id="password" name="password" type="password" placeholder="*********" required autocomplete="new-password">
      @error('password')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label class="block text-copy-secondary text-sm font-bold mb-2" for="password-confirm">
        {{ __('Confirm Password') }}
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-copy-secondary leading-tight focus:bg-background-ruthieslight focus:outline-none focus:shadow-outline @error('password') border-solid border-red-600 border-2 @enderror" id="password-confirm" name="password-confirmation" type="password" placeholder="*********" required autocomplete="new-password">
    </div>

    <div class="mb-4 flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            {{ __('Reset Password') }}
        </button>
    </div>

  </form>
</div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection