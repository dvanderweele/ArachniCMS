<div class="bg-background-tertiary text-xl text-copy-primary lg:min-h-full lg:w-1/5 lg:rounded-br lg:shadow-2xl lg:mr-12 shadow-lg text-left pt-2">
  <p class="hover:text-copy-secondary hover:bg-background-secondary text-copy-primary lg:w-full py-3 px-4 text-center lg:text-left cursor-pointer lg:border-none border-black border-b">
    <a href="#" class="font-semibold flex flex-row items-center justify-center lg:justify-start text-sm">
      <span class="text-xl">Comments</span>&nbsp;&nbsp;
      <svg version="1.1" class="fill-current ml-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M5.8,12.2V6H2C0.9,6,0,6.9,0,8v6c0,1.1,0.9,2,2,2h1v3l3-3h5c1.1,0,2-0.9,2-2v-1.82  c-0.064,0.014-0.132,0.021-0.2,0.021h-7V12.2z M18,1H9C7.9,1,7,1.9,7,3v8h7l3,3v-3h1c1.1,0,2-0.899,2-2V3C20,1.9,19.1,1,18,1z"/>
      </svg>
      &nbsp;x&nbsp;
      <span class="font-bold">
        @auth 
          {{ $unapprovedCommentCount }}&nbsp;New
        @endauth
      </span>
    </a>
  </p>
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