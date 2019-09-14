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
    <p class="mb-4">
      For your convenience, below is a bar measuring the approximate amount of storage space available on your web server. Please note that it is an estimate and can vary based on your web server. Additionally, remember that other types of content besides backups, such as blog posts, system files, and images also constribute to this storage space.
    </p>
    @php 
      $freeGb = disk_free_space('/') / 1024 / 1024 / 1024;
      $totalGb = disk_total_space('/') / 1024 / 1024 / 1024;
    @endphp
    <progress value="{{ round($freeGb,2) }}" max="{{ round($totalGb,2) }}" class="w-full mb-2 h-6"></progress>
    <p class="mb-4 text-center font-bold">
      {{ round($freeGb,2) }}&nbsp;GB <span class="font-hairline">out of</span> {{ round($totalGb,2) }}&nbsp;GB
    </p>
    @if(count($files) > 0)
      @foreach($files as $file)
      <div class="bg-background-secondary text-copy-primary text-sm md:text-lg font-bold font-mono my-3 py-2 px-4 rounded flex flex-row justify-between items-center overflow-x-auto">
        {{ $file }}
        <form action="/backup/download" method="POST" class="ml-2 py-2 px-2">
          @csrf 
          <input type="hidden" name="backup" value="{{ $file }}">
          <button type="submit">
            <svg version="1.1" class="fill-current w-8 h-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M15,7h-3V1H8v6H5l5,5L15,7z M19.338,13.532c-0.21-0.224-1.611-1.723-2.011-2.114  C17.062,11.159,16.683,11,16.285,11h-1.757l3.064,2.994h-3.544c-0.102,0-0.194,0.052-0.24,0.133L12.992,16H7.008l-0.816-1.873  c-0.046-0.081-0.139-0.133-0.24-0.133H2.408L5.471,11H3.715c-0.397,0-0.776,0.159-1.042,0.418c-0.4,0.392-1.801,1.891-2.011,2.114  c-0.489,0.521-0.758,0.936-0.63,1.449l0.561,3.074c0.128,0.514,0.691,0.936,1.252,0.936h16.312c0.561,0,1.124-0.422,1.252-0.936  l0.561-3.074C20.096,14.468,19.828,14.053,19.338,13.532z"/>
            </svg>
            <span class="sr-hidden">Download Backup</span>
          </button>
        </form>
        <form action="/backup/delete" method="POST" class="ml-2 py-2 px-2">
          @csrf 
          @method('DELETE')
          <input type="hidden" name="backup" value="{{ $file }}">
          <button type="submit">
            <svg version="1.1" class="fill-current w-8 h-8 cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
              <path d="M3.389,7.113L4.49,18.021C4.551,18.482,6.777,19.998,10,20c3.225-0.002,5.451-1.518,5.511-1.979  l1.102-10.908C14.929,8.055,12.412,8.5,10,8.5C7.59,8.5,5.072,8.055,3.389,7.113z M13.168,1.51l-0.859-0.951  C11.977,0.086,11.617,0,10.916,0H9.085c-0.7,0-1.061,0.086-1.392,0.559L6.834,1.51C4.264,1.959,2.4,3.15,2.4,4.029v0.17  C2.4,5.746,5.803,7,10,7c4.198,0,7.601-1.254,7.601-2.801v-0.17C17.601,3.15,15.738,1.959,13.168,1.51z M12.07,4.34L11,3H9  L7.932,4.34h-1.7c0,0,1.862-2.221,2.111-2.522C8.533,1.588,8.727,1.5,8.979,1.5h2.043c0.253,0,0.447,0.088,0.637,0.318  C11.907,2.119,13.77,4.34,13.77,4.34H12.07z"/>
            </svg>
            <span class="sr-hidden">Delete Backup</span>
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