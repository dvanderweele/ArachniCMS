document.addEventListener('DOMContentLoaded', (event) => {
    CKEDITOR.config.toolbar = [
      ['Format','Bold','Italic','-','NumberedList','BulletedList','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','Link', 'Unlink']
    ];
    CKEDITOR.replace( 'post-body');
});