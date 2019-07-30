document.addEventListener('DOMContentLoaded', (event) => {

    let KEYCODE_TAB = 9;
    trashImgBtns = document.querySelectorAll('.trashImageable');
    deletionOverlay = document.querySelector("#deletionOverlay");
    imageableDeletionModal = document.querySelector("#imageableDeletionModal");
    idmClose = document.querySelector("#idmClose");
    imageableImageIdInput = document.querySelector("#imageableImageIdInput");
    deleteImageableBtn = document.querySelector("#deleteImageableBtn");
    titleField = document.getElementById("post-title");

    for (let trashBtn of trashImgBtns){
      trashBtn.addEventListener("click", function(e){
        let id = trashBtn.getAttribute("data-id");
        imageableImageIdInput.value = id;
        deletionOverlay.classList.replace("hidden", "block");
        imageableDeletionModal.classList.replace("hidden", "block");
        idmClose.focus();
      });
    }

    deletionOverlay.addEventListener("click", function(e){
      deletionOverlay.classList.replace("block", "hidden");
      imageableDeletionModal.classList.replace("block", "hidden");
    });

    idmClose.addEventListener("click", function(e){
      deletionOverlay.classList.replace("block", "hidden");
      imageableDeletionModal.classList.replace("block", "hidden");
    });

    imageableDeletionModal.addEventListener("keydown", function(e){
      if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
        if ( e.shiftKey ) /* shift + tab */ {
          if (document.activeElement === idmClose) {
            deleteImageableBtn.focus();
            e.preventDefault();
          }
        } else /* tab */ {
          if (document.activeElement === deleteImageableBtn) {
            idmClose.focus();
            e.preventDefault();
          }
        }
      }
      if (e.key === "Escape") {
        deletionOverlay.classList.replace("block", "hidden");
        imageableDeletionModal.classList.replace("block", "hidden");
        titleField.focus();
      }
    });
});