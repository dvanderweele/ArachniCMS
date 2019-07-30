document.addEventListener('DOMContentLoaded', (event) => {
    const thumbnails = document.querySelectorAll(".thumbnail");
    const gallery = document.querySelector("#image-gallery");
    const bigImg = document.querySelector("#big-img")
    const bigImgCancel = document.querySelector("#big-img-cancel");
    const caption = document.querySelector("#caption");
    gallery.src = thumbnails.item(0).src;
    gallery.alt = thumbnails.item(0).alt;
    caption.innerText = thumbnails.item(0).alt;
    for (let thumbnail of thumbnails){
      thumbnail.addEventListener("click", function(e){
        bigImg.src = thumbnail.src;
        bigImg.alt = thumbnail.alt;
        caption.innerText = thumbnail.alt;
        gallery.classList.replace("hidden", "block");
        bigImgCancel.focus();
      });
    }
    bigImgCancel.addEventListener("click", function(){
      gallery.classList.replace("block", "hidden");
    });
});