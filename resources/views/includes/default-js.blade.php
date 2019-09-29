<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/theme-switch.js') }}" defer></script>
<script src="{{ asset('js/menu-switch.js') }}"></script>
@php
  if(!isset($settings)){
    $settings = \App\Settings::firstOrFail();
  }
@endphp
@if($settings->theme_pref == 'gray')
    <script src="{{ asset('js/gray.js') }}" defer></script>
@elseif($settings->theme_pref == 'red')
    <script src="{{ asset('js/red.js') }}" defer></script>
@elseif($settings->theme_pref == 'orange')
<script src="{{ asset('js/orange.js') }}" defer></script>
@elseif($settings->theme_pref == 'yellow')
<script src="{{ asset('js/yellow.js') }}" defer></script>
@elseif($settings->theme_pref == 'green')
<script src="{{ asset('js/green.js') }}" defer></script>
@elseif($settings->theme_pref == 'teal')
<script src="{{ asset('js/teal.js') }}" defer></script>
@elseif($settings->theme_pref == 'blue')
<script src="{{ asset('js/blue.js') }}" defer></script>
@elseif($settings->theme_pref == 'indigo')
<script src="{{ asset('js/indigo.js') }}" defer></script>
@elseif($settings->theme_pref == 'violet')
<script src="{{ asset('js/violet.js') }}" defer></script>
@elseif($settings->theme_pref == 'pink')
<script src="{{ asset('js/pink.js') }}" defer></script>
@else 
<script src="{{ asset('js/gray.js') }}" defer></script>
@endif