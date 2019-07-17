<nav class="min-w-full py-4 m-0 flex flex-col md:flex-row items-center flex-wrap justify-around font-serif px-6 bg-background-primary text-xl text-copy-primary">
  <div class="flex flex-row items-center">
    @if($settings->logo_location != null && $settings->logo_description != null)
      <a href="/"><img class="h-16" src="{{ asset('storage/'.$settings->logo_location) }}" alt="{{ $settings->logo_description }}"></a>
    @else 
      <a href="/" class="font-bold text-3xl text-copy-secondary">Arachni<span class="text-copy-primary">CMS</span></a>
    @endif
  </div>
  <div class="flex flex-col md:flex-row items-center justify-between flex-wrap">
    <div class="mr-8 ml-4">
      <svg id="theme-switcher" class="fill-current h-8 w-8 cursor-pointer" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M19,9.199c-0.182,0-0.799,0-0.98,0c-0.553,0-1,0.359-1,0.801c0,0.441,0.447,0.799,1,0.799  c0.182,0,0.799,0,0.98,0c0.552,0,1-0.357,1-0.799C20,9.559,19.551,9.199,19,9.199z M10,4.5c-3.051,0-5.5,2.449-5.5,5.5  s2.449,5.5,5.5,5.5c3.05,0,5.5-2.449,5.5-5.5S13.049,4.5,10,4.5z M10,14c-2.211,0-4-1.791-4-4c0-2.211,1.789-4,4-4V14z M3,10  c0-0.441-0.449-0.801-1-0.801c-0.185,0-0.816,0-1,0c-0.553,0-1,0.359-1,0.801c0,0.441,0.447,0.799,1,0.799c0.184,0,0.815,0,1,0  C2.551,10.799,3,10.441,3,10z M10,3c0.441,0,0.799-0.447,0.799-1c0-0.184,0-0.816,0-1c0-0.553-0.358-1-0.799-1  C9.558,0,9.199,0.447,9.199,1c0,0.184,0,0.816,0,1C9.199,2.553,9.558,3,10,3z M10,17c-0.442,0-0.801,0.447-0.801,1  c0,0.184,0,0.816,0,1c0,0.553,0.359,1,0.801,1c0.441,0,0.799-0.447,0.799-1c0-0.184,0-0.816,0-1C10.799,17.447,10.441,17,10,17z   M17.365,3.766c0.391-0.391,0.454-0.961,0.142-1.273s-0.883-0.248-1.272,0.143c-0.108,0.107-0.593,0.592-0.7,0.699  c-0.391,0.391-0.454,0.961-0.142,1.273s0.883,0.248,1.273-0.143C16.773,4.357,17.257,3.873,17.365,3.766z M3.334,15.533  c-0.108,0.109-0.593,0.594-0.7,0.701c-0.391,0.391-0.454,0.959-0.142,1.271s0.883,0.25,1.272-0.141  c0.108-0.107,0.593-0.592,0.7-0.699c0.391-0.391,0.454-0.961,0.142-1.274S3.723,15.144,3.334,15.533z M3.765,2.635  C3.375,2.244,2.804,2.18,2.492,2.492S2.244,3.375,2.633,3.766c0.108,0.107,0.593,0.592,0.7,0.699  c0.391,0.391,0.96,0.455,1.272,0.143s0.249-0.883-0.141-1.273C4.357,3.227,3.873,2.742,3.765,2.635z M15.534,16.666  c0.108,0.107,0.593,0.592,0.7,0.699c0.391,0.391,0.96,0.453,1.272,0.143c0.312-0.312,0.249-0.883-0.142-1.273  c-0.107-0.107-0.592-0.592-0.699-0.699c-0.391-0.391-0.961-0.455-1.274-0.143S15.143,16.275,15.534,16.666z"/>
      </svg>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <a class="hover:text-copy-secondary font-semibold flex flex-row items-center" href="/about">
        <svg version="1.1" class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path  d="M12.432,0c1.34,0,2.01,0.912,2.01,1.957c0,1.305-1.164,2.512-2.679,2.512c-1.269,0-2.009-0.75-1.974-1.99  C9.789,1.436,10.67,0,12.432,0z M8.309,20c-1.058,0-1.833-0.652-1.093-3.524l1.214-5.092c0.211-0.814,0.246-1.141,0-1.141  c-0.317,0-1.689,0.562-2.502,1.117L5.4,10.48c2.572-2.186,5.531-3.467,6.801-3.467c1.057,0,1.233,1.273,0.705,3.23l-1.391,5.352  c-0.246,0.945-0.141,1.271,0.106,1.271c0.317,0,1.357-0.392,2.379-1.207l0.6,0.814C12.098,19.02,9.365,20,8.309,20z"/>
        </svg>&nbsp;About
      </a>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <a class="hover:text-copy-secondary font-semibold flex flex-row items-center" href="/posts">
        <svg version="1.1" class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path  d="M14,5h-4v2h4V5z M14,8h-4v1h4V8z M9,5H6v4h3V5z M9,11h5v-1H9V11z M12,13h2v-1h-2V13z M14,14H6v1h8V14z   M11,12H6v1h5V12z M8,10H6v1h2V10z M17,1H3C2.447,1,2,1.447,2,2v16c0,0.552,0.447,1,1,1h14c0.553,0,1-0.448,1-1V2  C18,1.448,17.553,1,17,1z M16,17H4V3h12V17z"/>
        </svg>&nbsp;Blog
      </a>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <a class="hover:text-copy-secondary font-semibold flex flex-row items-center" href="/contact">
        <svg version="1.1" class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M18.64,2.634C18.296,2.755,1.319,8.738,0.984,8.856c-0.284,0.1-0.347,0.345-0.01,0.479  c0.401,0.161,3.796,1.521,3.796,1.521l0,0l2.25,0.901c0,0,10.838-7.958,10.984-8.066c0.148-0.108,0.318,0.095,0.211,0.211  c-0.107,0.117-7.871,8.513-7.871,8.513v0.002L9.892,12.92l0.599,0.322l0,0c0,0,4.65,2.504,4.982,2.682  c0.291,0.156,0.668,0.027,0.752-0.334c0.099-0.426,2.845-12.261,2.906-12.525C19.21,2.722,18.983,2.513,18.64,2.634z M7,17.162  c0,0.246,0.139,0.315,0.331,0.141c0.251-0.229,2.85-2.561,2.85-2.561L7,13.098V17.162z"/>
        </svg>&nbsp;Contact
      </a>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <a class="hover:text-copy-secondary font-semibold flex flex-row items-center" href="/home">
        <svg version="1.1" class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M17.604,3.332C12.99,4,12.075,2.833,10,1C7.925,2.833,7.01,4,2.396,3.332C-0.063,15.58,10,19,10,19  S20.063,15.58,17.604,3.332z M12.473,13.309L10,12.009l-2.472,1.3L8,10.556l-2-1.95l2.764-0.401L10,5.7l1.236,2.505L14,8.606  l-2,1.949L12.473,13.309z"/>
        </svg>&nbsp;Admin
      </a>
    </div>
  </div>
</nav>