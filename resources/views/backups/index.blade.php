@extends('layouts.app')

@section('title')
  @include('includes.default-title')
@endsection

@section('js')
  @include('includes.default-js')
@endsection

@section('css')
  @include('includes.default-css')
  <link rel="stylesheet" href="{{ asset('css/dbo-fin-s1.css') }}">
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
        Note that the backup archives, if you choose to peruse them or utilize them, will need to be unzipped or extracted with a proper archive manipulation tool, rather than the built-in file browser extraction tool offered in some operating systems such as Windows. A free tool like 7Zip will do the trick. Otherwise, you will notice some of your files missing. Content like testimonials, blog posts, and comments, will be in the form of a database dump.
    </p>
    <p class="mb-4 text-copy-secondary">
      To grab the latest backup, the timestamp in the name of the backup can be interpreted as follows: Year-Month-Day-Hour-Minute-Second.
    </p>
    @if(count($files) > 0)
      @foreach($files as $file)
      <div class="bg-background-secondary text-copy-primary text-sm md:text-lg font-bold font-mono my-3 py-2 px-4 rounded flex flex-row justify-between items-center overflow-x-auto">
        {{ $file }}
        <form action="/backup/download" method="POST">
          @csrf 
          <input type="hidden" name="backup" value="{{ $file }}">
          <button type="submit">
            <svg version="1.1" class="fill-current w-8 h-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M15,7h-3V1H8v6H5l5,5L15,7z M19.338,13.532c-0.21-0.224-1.611-1.723-2.011-2.114  C17.062,11.159,16.683,11,16.285,11h-1.757l3.064,2.994h-3.544c-0.102,0-0.194,0.052-0.24,0.133L12.992,16H7.008l-0.816-1.873  c-0.046-0.081-0.139-0.133-0.24-0.133H2.408L5.471,11H3.715c-0.397,0-0.776,0.159-1.042,0.418c-0.4,0.392-1.801,1.891-2.011,2.114  c-0.489,0.521-0.758,0.936-0.63,1.449l0.561,3.074c0.128,0.514,0.691,0.936,1.252,0.936h16.312c0.561,0,1.124-0.422,1.252-0.936  l0.561-3.074C20.096,14.468,19.828,14.053,19.338,13.532z"/>
            </svg>
            <span class="sr-hidden">Download Backup</span>
          </button>
        </form>
      </div>
      @endforeach
    @else 
      <p class="mb-4 text-copy-secondary">
        Looks like you don't have any backups right now. If you have them enabled, they are configured to run once per day very early in the morning. Check back again tomorrow. Note that once you start running out of space, the backups will stop working.
      </p>
    @endif
  </div>
@endsection

@section('footer')
  @include('includes.default-footer')
@endsection