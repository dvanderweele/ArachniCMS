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
});
