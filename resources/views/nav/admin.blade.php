<div class="bg-background-tertiary text-xl text-copy-primary lg:min-h-full lg:w-1/5 lg:rounded-br lg:shadow-2xl shadow-lg text-left pt-2">
  <a href="/images" class="font-semibold inline-block w-full">
    <p class="hover:text-copy-secondary hover:bg-background-secondary text-copy-primary lg:w-full py-3 px-4 text-center lg:text-left lg:border-none border-black border-b">
      Images
    </p>
  </a>
  <a href="/youtubevidcodes" class="font-semibold inline-block w-full">
    <p class="hover:text-copy-secondary hover:bg-background-secondary text-copy-primary lg:w-full py-3 px-4 text-center lg:text-left lg:border-none border-black border-b">
      YouTube Videos
    </p>
  </a>
  <a href="/testimonials" class="font-semibold inline-block w-full">
    <p class="hover:text-copy-secondary hover:bg-background-secondary text-copy-primary lg:w-full py-3 px-4 text-center lg:text-left lg:border-none border-black border-b">
      Testimonials
    </p>
  </a>
  <a href="/settings" class="font-semibold inline-block w-full">
    <p class="hover:text-copy-secondary hover:bg-background-secondary text-copy-primary lg:w-full py-3 px-4 text-center lg:text-left lg:border-none border-black border-b">
      Settings
    </p>
  </a>
  <a href="/backup" class="font-semibold inline-block w-full">
    <p class="hover:text-copy-secondary hover:bg-background-secondary text-copy-primary lg:w-full py-3 px-4 text-center lg:text-left lg:border-none border-black border-b">
      Backup
    </p>
  </a>
  <p class="hover:text-copy-secondary">
    <form action="/logout" method="post">
      @csrf 
      <button type="submit" class="text-copy-primary font-semibold pr-6 text-center lg:text-left w-full hover:bg-background-secondary hover:text-copy-secondary py-3 px-4">
        Logout
      </button>
    </form>
  </p>
</div>