<script src="{{ secure_asset('js/app.js') }}" defer></script>
<script src="{{ secure_asset('js/theme-switch.js') }}" defer></script>
<script src="{{ secure_asset('js/menu-switch.js') }}"></script>
@php
  if(!isset($settings)){
    $settings = \App\Settings::firstOrFail();
  }
@endphp
@if($settings->theme_pref == 'gray')
    <script src="{{ secure_asset('js/gray.js') }}" defer></script>
@elseif($settings->theme_pref == 'red')
    <script src="{{ secure_asset('js/red.js') }}" defer></script>
@elseif($settings->theme_pref == 'orange')
<script src="{{ secure_asset('js/orange.js') }}" defer></script>
@elseif($settings->theme_pref == 'yellow')
<script src="{{ secure_asset('js/yellow.js') }}" defer></script>
@elseif($settings->theme_pref == 'green')
<script src="{{ secure_asset('js/green.js') }}" defer></script>
@elseif($settings->theme_pref == 'teal')
<script src="{{ secure_asset('js/teal.js') }}" defer></script>
@elseif($settings->theme_pref == 'blue')
<script src="{{ secure_asset('js/blue.js') }}" defer></script>
@elseif($settings->theme_pref == 'indigo')
<script src="{{ secure_asset('js/indigo.js') }}" defer></script>
@elseif($settings->theme_pref == 'violet')
<script src="{{ secure_asset('js/violet.js') }}" defer></script>
@elseif($settings->theme_pref == 'pink')
<script src="{{ secure_asset('js/pink.js') }}" defer></script>
@else 
<script src="{{ secure_asset('js/gray.js') }}" defer></script>
@endif