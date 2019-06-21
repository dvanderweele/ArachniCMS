<nav class="min-w-full py-4 m-0 flex flex-col md:flex-row items-center flex-wrap justify-around font-serif px-6 bg-background-primary text-xl text-copy-primary">
  <div class="flex flex-row items-center">
    <img class="h-16" src="{{ asset('storage/icons/skull-static.PNG') }}" alt="A skull with a gear around the outside.">
    <a href="#"><img class="h-16" src="{{ asset('storage/icons/rsb.PNG') }}" alt="The logo for Ruthies Space Bus."></a>
  </div>
  <div class="flex flex-col md:flex-row items-center justify-between flex-wrap">
    <div class="mr-8 ml-4">
      <svg id="theme-switcher" class="fill-current h-8 w-8 cursor-pointer" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M19,9.199c-0.182,0-0.799,0-0.98,0c-0.553,0-1,0.359-1,0.801c0,0.441,0.447,0.799,1,0.799  c0.182,0,0.799,0,0.98,0c0.552,0,1-0.357,1-0.799C20,9.559,19.551,9.199,19,9.199z M10,4.5c-3.051,0-5.5,2.449-5.5,5.5  s2.449,5.5,5.5,5.5c3.05,0,5.5-2.449,5.5-5.5S13.049,4.5,10,4.5z M10,14c-2.211,0-4-1.791-4-4c0-2.211,1.789-4,4-4V14z M3,10  c0-0.441-0.449-0.801-1-0.801c-0.185,0-0.816,0-1,0c-0.553,0-1,0.359-1,0.801c0,0.441,0.447,0.799,1,0.799c0.184,0,0.815,0,1,0  C2.551,10.799,3,10.441,3,10z M10,3c0.441,0,0.799-0.447,0.799-1c0-0.184,0-0.816,0-1c0-0.553-0.358-1-0.799-1  C9.558,0,9.199,0.447,9.199,1c0,0.184,0,0.816,0,1C9.199,2.553,9.558,3,10,3z M10,17c-0.442,0-0.801,0.447-0.801,1  c0,0.184,0,0.816,0,1c0,0.553,0.359,1,0.801,1c0.441,0,0.799-0.447,0.799-1c0-0.184,0-0.816,0-1C10.799,17.447,10.441,17,10,17z   M17.365,3.766c0.391-0.391,0.454-0.961,0.142-1.273s-0.883-0.248-1.272,0.143c-0.108,0.107-0.593,0.592-0.7,0.699  c-0.391,0.391-0.454,0.961-0.142,1.273s0.883,0.248,1.273-0.143C16.773,4.357,17.257,3.873,17.365,3.766z M3.334,15.533  c-0.108,0.109-0.593,0.594-0.7,0.701c-0.391,0.391-0.454,0.959-0.142,1.271s0.883,0.25,1.272-0.141  c0.108-0.107,0.593-0.592,0.7-0.699c0.391-0.391,0.454-0.961,0.142-1.274S3.723,15.144,3.334,15.533z M3.765,2.635  C3.375,2.244,2.804,2.18,2.492,2.492S2.244,3.375,2.633,3.766c0.108,0.107,0.593,0.592,0.7,0.699  c0.391,0.391,0.96,0.455,1.272,0.143s0.249-0.883-0.141-1.273C4.357,3.227,3.873,2.742,3.765,2.635z M15.534,16.666  c0.108,0.107,0.593,0.592,0.7,0.699c0.391,0.391,0.96,0.453,1.272,0.143c0.312-0.312,0.249-0.883-0.142-1.273  c-0.107-0.107-0.592-0.592-0.699-0.699c-0.391-0.391-0.961-0.455-1.274-0.143S15.143,16.275,15.534,16.666z"/>
      </svg>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <img class="h-10 mr-4" src="{{ asset('storage/icons/about.svg') }}" alt="An icon portraying a generic online profile.">
      <a class="hover:text-copy-secondary font-semibold" href="#">
        About
      </a>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <img class="h-12 mr-4" src="{{ asset('storage/icons/music.svg') }}" alt="An icon portraying a small people playing on giant musical notes.">
      <a class="hover:text-copy-secondary font-semibold" href="#">
        Music
      </a>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <img class="h-12 mr-4" src="{{ asset('storage/icons/blog_post.svg') }}" alt="An icon portraying a blog."> 
      <a class="hover:text-copy-secondary font-semibold" href="#">
        Blog
      </a>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <img class="h-12 mr-4" src="{{ asset('storage/icons/contact.svg') }}" alt="An icon portraying various ways of contacting a business, such as email and phone.">
      <a class="hover:text-copy-secondary font-semibold" href="#">
        Contact
      </a>
    </div>
    <div class="flex flex-row items-center py-2 mr-8 ml-4">
      <img src="{{ asset('storage/icons/admin.svg') }}" alt="The icon for the admin area." class="h-12 mr-8">
      <a class="hover:text-copy-secondary font-semibold" href="/home">
        Admin
      </a>
    </div>
  </div>
</nav>