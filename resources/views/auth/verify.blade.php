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
  @if(session('resent'))
    <div class="bg-background-primary text-center py-4 lg:px-4 m-4">
      <div class="p-2 bg-background-secondary items-center text-copy-primary leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-copy-secondary uppercase px-2 py-1 text-xs font-bold mr-3">Sent</span>
        <span class="font-semibold mr-2 text-left flex-auto">{{ __('A fresh verification link has been sent to your email address.') }}</span>
      </div>
    </div>
  @endif

  <div class="max-w-lg w-10/12 h-auto bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-20 md:mt-24 lg:mt-32 mb-4 font-sans text-copy-primary">
    <div class="mb-4">
      <h4 class="font-semibold text-2xl">{{ __('Verify Your Email Address') }}</h4>
    </div>
    <div class="mb-4">
      {{ __('Before proceeding, please check your email for a verification link.') }}
      {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
    </div>
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection