<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/theme-switch.js') }}" defer></script>
@php 
    $colortheme = 'pink';
@endphp
@if($colortheme == 'gray')
    <script src="{{ asset('js/gray.js') }}" defer></script>
@elseif($colortheme == 'red')
    <script src="{{ asset('js/red.js') }}" defer></script>
@elseif($colortheme == 'orange')
<script src="{{ asset('js/orange.js') }}" defer></script>
@elseif($colortheme == 'yellow')
<script src="{{ asset('js/yellow.js') }}" defer></script>
@elseif($colortheme == 'green')
<script src="{{ asset('js/green.js') }}" defer></script>
@elseif($colortheme == 'teal')
<script src="{{ asset('js/teal.js') }}" defer></script>
@elseif($colortheme == 'blue')
<script src="{{ asset('js/blue.js') }}" defer></script>
@elseif($colortheme == 'indigo')
<script src="{{ asset('js/indigo.js') }}" defer></script>
@elseif($colortheme == 'violet')
<script src="{{ asset('js/violet.js') }}" defer></script>
@elseif($colortheme == 'pink')
<script src="{{ asset('js/pink.js') }}" defer></script>
@else 
<script src="{{ asset('js/gray.js') }}" defer></script>
@endif