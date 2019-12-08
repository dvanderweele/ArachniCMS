document.addEventListener("DOMContentLoaded", event => {
    tinymce.init({
        selector: "#post-body",
        plugins: "link lists",
        menubar: false,
        toolbar:
            "formatselect bold italic | numlist bullist | undo redo | cut copy paste | link",
        block_formats:
            "Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6",
        browser_spellcheck: true
    });
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

        deletionModal.addEventListener("keydown", function(e) {
            if (e.key === "Tab" || e.keyCode === KEYCODE_TAB) {
                if (e.shiftKey) {
                    /* shift + tab */ if (
                        document.activeElement === cancelDelete
                    ) {
                        submitDelete.focus();
                        e.preventDefault();
                    }
                } /* tab */ else {
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
    cancelDelete.addEventListener("click", function() {
        deletionModal.classList.replace("block", "hidden");
        deletionOverlay.classList.replace("block", "hidden");
        titleField.focus();
    });
    deletionOverlay.addEventListener("click", function() {
        deletionModal.classList.replace("block", "hidden");
        deletionOverlay.classList.replace("block", "hidden");
        titleField.focus();
    });
});
