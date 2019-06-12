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
  <div class="max-w-lg w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-16 font-sans flex-grow">
    <div class="mb-4">
      <h4 class="font-semibold text-2xl text-copy-primary">{{ __('Login') }}</h4>
    </div>
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-4">
        <label class="block text-copy-primary text-sm font-bold mb-2" for="email">
          {{ __('E-Mail Address') }}
        </label>
        <input class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('email') border-solid border-red-600 border-2 @enderror" id="email" name="email" type="text" placeholder="email@example.com" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label class="block text-copy-primary text-sm font-bold mb-2" for="password">
            {{ __('Password') }}
        </label>
        <input class="text-copy-primary bg-background-form shadow appearance-none border rounded w-full py-2 px-3 text-copy-primary leading-tight focus:outline-none focus:shadow-outline focus:bg-background-ruthieslight @error('password') border-solid border-red-600 border-2 @enderror" id="name" name="password" type="password" placeholder="*********" required autocomplete="current-password">
        @error('password')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
          <div class="col-md-6 offset-md-4">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                  </label>
              </div>
          </div>
      </div>

      <div class="mb-4">
          <div class="col-md-8 offset-md-4">
              <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
              </button>

              @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
          </div>
      </div>

    </form>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection