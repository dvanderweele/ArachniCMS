// modal management section
document.addEventListener("DOMContentLoaded", (event) => {
    let KEYCODE_TAB = 9;
    // grab relevant dom elements
    const modalOverlay = document.querySelector("#modalOverlay");
    const commentBody = document.querySelector("#body");
    const deleteCommentModal = document.querySelector("#deleteCommentModal");
    const approveCommentModal = document.querySelector("#approveCommentModal");
    const unapproveCommentModal = document.querySelector("#unapproveCommentModal");
    const dcmCancel = document.querySelector("#dcmCancel");
    const acmCancel = document.querySelector("#acmCancel");
    const ucmCancel = document.querySelector("#ucmCancel");
    const deleteButtons = document.querySelectorAll(".deleteBtn");
    const approveButtons = document.querySelectorAll(".approvalBtn");
    const unapproveButtons = document.querySelectorAll(".unapprovalBtn");
    const deleteTarget = document.querySelector("#deleteTarget");
    const approveTarget = document.querySelector("#approveTarget");
    const unapproveTarget = document.querySelector("#unapproveTarget");
    const submitDelete = document.querySelector("#submitDelete");
    const submitApproval = document.querySelector("#submitApproval");
    const submitUnapproval = document.querySelector("#submitUnapproval");
    
    for (let deleteBtn of deleteButtons){
      deleteBtn.addEventListener("click", function(e){
        let id = e.target.dataset.id;
        deleteTarget.value = id;
        openModal(deleteCommentModal);
        dcmCancel.focus();
      });
    }
    for (let approveBtn of approveButtons){
      approveBtn.addEventListener("click", function(e){
        let id = e.target.dataset.id;
        approveTarget.value = id;
        openModal(approveCommentModal);
        acmCancel.focus();
      });
    }
    for (let unapproveBtn of unapproveButtons){
      unapproveBtn.addEventListener("click", function(e){
        let id = e.target.dataset.id;
        unapproveTarget.value = id;
        openModal(unapproveCommentModal);
        ucmCancel.focus();
      });
    }
    modalOverlay.addEventListener("click", function(e){
      closeModal(deleteCommentModal);
      closeModal(approveCommentModal);
      closeModal(unapproveCommentModal);
    });
    dcmCancel.addEventListener("click", function(e){
      closeModal(deleteCommentModal);
    });
    acmCancel.addEventListener("click", function(e){
      closeModal(approveCommentModal);
    });
    ucmCancel.addEventListener("click", function(e){
      closeModal(unapproveCommentModal);
    });
    deleteCommentModal.addEventListener("keydown", function(e){
      if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
        if ( e.shiftKey ) /* shift + tab */ {
          if (document.activeElement === dcmCancel) {
            submitDelete.focus();
            e.preventDefault();
          }
        } else /* tab */ {
          if (document.activeElement === submitDelete) {
            dcmCancel.focus();
            e.preventDefault();
          }
        }
      }
      if (e.key === "Escape") {
        closeModal(deleteCommentModal);
        modalOverlay.classList.replace("block", "hidden");
        commentBody.focus();
      }
    });
    approveCommentModal.addEventListener("keydown", function(e){
      if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
        if ( e.shiftKey ) /* shift + tab */ {
          if (document.activeElement === acmCancel) {
          submitApproval.focus();
            e.preventDefault();
          }
        } else /* tab */ {
          if (document.activeElement ===submitApproval) {
            acmCancel.focus();
            e.preventDefault();
          }
        }
      }
      if (e.key === "Escape") {
        closeModal(approveCommentModal);
        modalOverlay.classList.replace("block", "hidden");
        commentBody.focus();
      }
    });
    unapproveCommentModal.addEventListener("keydown", function(e){
      if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
        if ( e.shiftKey ) /* shift + tab */ {
          if (document.activeElement === ucmCancel) {
            submitUnapproval.focus();
            e.preventDefault();
          }
        } else /* tab */ {
          if (document.activeElement === submitUnapproval) {
            ucmCancel.focus();
            e.preventDefault();
          }
        }
      }
      if (e.key === "Escape") {
        closeModal(unapproveCommentModal);
        modalOverlay.classList.replace("block", "hidden");
        commentBody.focus();
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