document.addEventListener('DOMContentLoaded', (event) => {
    CKEDITOR.config.toolbar = [
      ['Format','Bold','Italic','-','NumberedList','BulletedList','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','Link', 'Unlink']
    ];
    CKEDITOR.replace( 'post-body');
    deleteButton = document.getElementById("delete");
    deletionOverlay = document.getElementById("deletionOverlay");
    deletionModal = document.getElementById("deletionModal");
    cancelDelete = document.getElementById("cancelDelete");
    titleField = document.getElementById("post-title");
    submitDelete = document.getElementById("submitDelete");
    deleteButton.addEventListener("click", function() {
      deletionModal.classList.replace("hidden", "block");
      deletionOverlay.classList.replace("hidden", "block");
      cancelDelete.focus();
      
      let KEYCODE_TAB = 9;

      deletionModal.addEventListener("keydown", function(e){
        if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
          if ( e.shiftKey ) /* shift + tab */ {
            if (document.activeElement === cancelDelete) {
              submitDelete.focus();
              e.preventDefault();
            }
          } else /* tab */ {
            if (document.activeElement === submitDelete) {
              cancelDelete.focus();
              e.preventDefault();
            }
          }
        }
        if (e.key === "Escape") {
          deletionModal.classList.replace("block", "hidden");
          deletionOverlay.classList.replace("block", "hidden");
          titleField.focus();
        }
      });
    });
    cancelDelete.addEventListener("click", function(){
      deletionModal.classList.replace("block", "hidden");
      deletionOverlay.classList.replace("block", "hidden");
      titleField.focus();
    });
    deletionOverlay.addEventListener("click", function(){
      deletionModal.classList.replace("block", "hidden");
      deletionOverlay.classList.replace("block", "hidden");
      titleField.focus();
    });
});