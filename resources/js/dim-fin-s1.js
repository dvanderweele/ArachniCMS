document.addEventListener("DOMContentLoaded", (event) => {
    let KEYCODE_TAB = 9;
    // grab relevant dom elements
    const modalOverlay = document.querySelector("#modalOverlay");
    const modal = document.querySelector("#deleteImageModal");
    const trashes = document.querySelectorAll(".trash");
    const deleteTarget = document.querySelector("#deleteTarget");
    const submitDelete = document.querySelector("#submitDelete");
    const dimCancel = document.querySelector("#dimCancel");
    const uploadbtn = document.querySelector("#uploadbtn");

    for (let trash of trashes){
      trash.addEventListener("click", function(e){
        let id = trash.getAttribute("data-id");
        deleteTarget.value = id;
        openModal(modal);
        dimCancel.focus();
      });
    }
    modalOverlay.addEventListener("click", function(e){
      closeModal(modal);
    });
    dimCancel.addEventListener("click", function(e){
      closeModal(modal);
    });
    modal.addEventListener("keydown", function(e){
        if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
            if (document.activeElement === dimCancel) {
                submitDelete.focus();
                e.preventDefault();
            }
            } else /* tab */ {
            if (document.activeElement === submitDelete) {
                dimCancel.focus();
                e.preventDefault();
            }
            }
        }
        if (e.key === "Escape") {
            closeModal(modal);
            modalOverlay.classList.replace("block", "hidden");
            uploadbtn.focus();
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