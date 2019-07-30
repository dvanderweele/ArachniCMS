document.addEventListener('DOMContentLoaded', function(){
    let burger = document.querySelector("#menu-burger");
    let cancel = document.querySelector("#menu-cancel");
    let menuItems = document.querySelectorAll('.menu-item');

    burger.addEventListener("click", function(){
      for (let menuItem of menuItems) {
        menuItem.classList.replace("hidden", "block");
      }
      burger.classList.replace("block", "hidden");
      cancel.classList.replace("hidden", "block");
    });

    cancel.addEventListener("click", function(){
      for (let menuItem of menuItems) {
        menuItem.classList.replace("block", "hidden");
      }
      cancel.classList.replace("block", "hidden");
      burger.classList.replace("hidden", "block");
    });
})