<nav id="landing-nav" class="min-w-full py-4 m-0 flex flex-row items-center flex-wrap justify-around font-serif px-6 text-xl text-copy-primary z-30 absolute bg-background-primary md:bg-transparent">
  <div class="flex flex-row justify-between w-full md:w-auto px-4">
    <div class="menu-item flex flex-row items-center z-30">
      @if($settings->logo_location != null && $settings->logo_description != null)
        <a href="/"><img class="h-16" src="{{ asset('storage/'.$settings->logo_location) }}" alt="{{ $settings->logo_description }}"></a>
      @else 
        <a href="/" class="font-bold text-3xl text-copy-secondary">Arachni<span class="text-copy-primary">CMS</span></a>
      @endif
    </div>
    <button type="button" id="menu-burger" class="relative block md:hidden" aria-label="Expand Navigation Menu">
      <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path  d="M16.4,9H3.6C3.048,9,3,9.447,3,10c0,0.553,0.048,1,0.6,1h12.8c0.552,0,0.6-0.447,0.6-1S16.952,9,16.4,9z   M16.4,13H3.6C3.048,13,3,13.447,3,14c0,0.553,0.048,1,0.6,1h12.8c0.552,0,0.6-0.447,0.6-1S16.952,13,16.4,13z M3.6,7h12.8  C16.952,7,17,6.553,17,6s-0.048-1-0.6-1H3.6C3.048,5,3,5.447,3,6S3.048,7,3.6,7z"/>
      </svg>
    </button type="button">
    <button type="button" id="menu-cancel" class="relative hidden md:hidden" aria-label="Collapse Navigation Menu">
      <svg version="1.1" class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0  c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183  l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15  C14.817,13.62,14.817,14.38,14.348,14.849z"/>
      </svg>
    </button>
  </div>
  <div class="menu-item hidden md:flex flex-col md:flex-row items-center justify-between flex-wrap z-30">
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <a class="hover:text-copy-secondary font-semibold flex flex-row items-center" href="/about">
        <svg version="1.1" class="fill-current w-10 h-10 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path  d="M12.432,0c1.34,0,2.01,0.912,2.01,1.957c0,1.305-1.164,2.512-2.679,2.512c-1.269,0-2.009-0.75-1.974-1.99  C9.789,1.436,10.67,0,12.432,0z M8.309,20c-1.058,0-1.833-0.652-1.093-3.524l1.214-5.092c0.211-0.814,0.246-1.141,0-1.141  c-0.317,0-1.689,0.562-2.502,1.117L5.4,10.48c2.572-2.186,5.531-3.467,6.801-3.467c1.057,0,1.233,1.273,0.705,3.23l-1.391,5.352  c-0.246,0.945-0.141,1.271,0.106,1.271c0.317,0,1.357-0.392,2.379-1.207l0.6,0.814C12.098,19.02,9.365,20,8.309,20z"/>
        </svg><span class="">&nbsp;About</span>
      </a>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <a class="hover:text-copy-secondary font-semibold flex flex-row items-center" href="/posts">
        <svg version="1.1" class="fill-current w-10 h-10 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path  d="M14,5h-4v2h4V5z M14,8h-4v1h4V8z M9,5H6v4h3V5z M9,11h5v-1H9V11z M12,13h2v-1h-2V13z M14,14H6v1h8V14z   M11,12H6v1h5V12z M8,10H6v1h2V10z M17,1H3C2.447,1,2,1.447,2,2v16c0,0.552,0.447,1,1,1h14c0.553,0,1-0.448,1-1V2  C18,1.448,17.553,1,17,1z M16,17H4V3h12V17z"/>
        </svg><span class="">&nbsp;Blog</span>
      </a>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <a class="hover:text-copy-secondary font-semibold flex flex-row items-center" href="/contact">
        <svg version="1.1" class="fill-current w-10 h-10 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <path d="M18.64,2.634C18.296,2.755,1.319,8.738,0.984,8.856c-0.284,0.1-0.347,0.345-0.01,0.479  c0.401,0.161,3.796,1.521,3.796,1.521l0,0l2.25,0.901c0,0,10.838-7.958,10.984-8.066c0.148-0.108,0.318,0.095,0.211,0.211  c-0.107,0.117-7.871,8.513-7.871,8.513v0.002L9.892,12.92l0.599,0.322l0,0c0,0,4.65,2.504,4.982,2.682  c0.291,0.156,0.668,0.027,0.752-0.334c0.099-0.426,2.845-12.261,2.906-12.525C19.21,2.722,18.983,2.513,18.64,2.634z M7,17.162  c0,0.246,0.139,0.315,0.331,0.141c0.251-0.229,2.85-2.561,2.85-2.561L7,13.098V17.162z"/>
        </svg><span class="">&nbsp;Contact</span>
      </a>
    </div>
    @auth
      <div class="flex flex-row items-center py-2 mr-8 ml-4">
        <a class="hover:text-copy-secondary font-semibold flex flex-row items-center" href="/home">
          <svg version="1.1" class="fill-current w-10 h-10 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M17.604,3.332C12.99,4,12.075,2.833,10,1C7.925,2.833,7.01,4,2.396,3.332C-0.063,15.58,10,19,10,19  S20.063,15.58,17.604,3.332z M12.473,13.309L10,12.009l-2.472,1.3L8,10.556l-2-1.95l2.764-0.401L10,5.7l1.236,2.505L14,8.606  l-2,1.949L12.473,13.309z"/>
          </svg><span class="">&nbsp;Admin</span>
        </a>
      </div>
    @endauth
  </div>
</nav>