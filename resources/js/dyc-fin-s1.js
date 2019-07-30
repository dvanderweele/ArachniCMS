document.addEventListener("DOMContentLoaded", (event) => {
    let KEYCODE_TAB = 9;
    // grab relevant dom elements
    const modalOverlay = document.querySelector("#modalOverlay");
    const modal = document.querySelector("#deleteVidcodeModal");
    const trashes = document.querySelectorAll(".trash");
    const deleteTarget = document.querySelector("#deleteTarget");
    const submitDelete = document.querySelector("#submitDelete");
    const dvmCancel = document.querySelector("#dvmCancel");
    const nameInput = document.querySelector("#videoname");

    for (let trash of trashes){
      trash.addEventListener("click", function(e){
        let id = trash.getAttribute("data-id");
        deleteTarget.value = id;
        openModal(modal);
        dvmCancel.focus();
      });
    }
    modalOverlay.addEventListener("click", function(e){
      closeModal(modal);
    });
    dvmCancel.addEventListener("click", function(e){
      closeModal(modal);
    });
    modal.addEventListener("keydown", function(e){
      if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
        if ( e.shiftKey ) /* shift + tab */ {
          if (document.activeElement === dvmCancel) {
            submitDelete.focus();
            e.preventDefault();
          }
        } else /* tab */ {
          if (document.activeElement === submitDelete) {
            dvmCancel.focus();
            e.preventDefault();
          }
        }
      }
      if (e.key === "Escape") {
        closeModal(modal);
        modalOverlay.classList.replace("block", "hidden");
        nameInput.focus();
      }
    });
});

function openModal(modal){
    modalOverlay.classList.replace("hidden", "block");
    modal.classList.replace("hidden", "block");
}

function closeModal(modal){
    modalOverlay.classList.replace("block", "hidden");
    modal.classList.replace("block", "hidden");
}