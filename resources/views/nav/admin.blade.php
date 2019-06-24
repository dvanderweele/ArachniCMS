<div class="bg-background-tertiary text-xl text-copy-primary lg:min-h-full lg:w-1/5 lg:rounded-br lg:shadow-2xl lg:mr-12 shadow-lg text-left pt-2">
  <p class="hover:text-copy-secondary hover:bg-background-secondary text-copy-primary lg:w-full py-3 px-4 text-center lg:text-left cursor-pointer lg:border-none border-black border-b">
    <a href="#" class="font-semibold">
      Discography
    </a>
  </p>
  <p class="hover:text-copy-secondary hover:bg-background-secondary text-copy-primary lg:w-full py-3 px-4 text-center lg:text-left cursor-pointer lg:border-none border-black border-b">
    <a href="#" class="font-semibold">
      Settings
    </a>
  </p>
  <p class="hover:text-copy-secondary">
    <form action="/logout" method="post">
      @csrf 
      <button type="submit" class="text-copy-primary font-semibold text-center lg:text-left w-full hover:bg-background-secondary hover:text-copy-secondary py-3 px-4">
        Logout
      </button>
    </form>
  </p>
</div>