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
  <div class="max-w-2xl w-10/12 bg-background-primary shadow-lg rounded mx-auto px-8 pt-6 pb-8 mt-8 font-sans relative">
    <h1 class="font-semibold text-2xl text-copy-primary mb-4">
      Backups
    </h1>
    <p class="mb-4 text-copy-secondary">
        Backups are currently&nbsp;<span class="font-semibold">{{ $settings->enable_backups ? 'enabled.' : 'disabled.' }}</span>&nbsp; You can toggle this in your global site settings.
    </p>
    <p class="mb-4 text-copy-secondary">
        Note that the backup archives, if you choose to peruse them or utilize them, will need to be unzipped or extracted with a proper archive manipulation tool, rather than the built-in file browser extraction tool offered in some operating systems such as Windows. A free tool like 7Zip will do the trick. Otherwise, you will notice some of your files missing.
    </p>
    @if(count($files) > 0)
      @foreach($files as $file)
        {{ $file }}
      @endforeach
    @else 
      Looks like you don't have any backups right now. If you have them enabled, they are configured to run once per day very early in the morning. Check back again tomorrow. Note that once you start running out of space, the backups will stop working.
    @endif
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection