/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dpo-fsh-s3.js":
/*!************************************!*\
  !*** ./resources/js/dpo-fsh-s3.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// modal management section
document.addEventListener("DOMContentLoaded", function (event) {
  var KEYCODE_TAB = 9; // grab relevant dom elements

  var modalOverlay = document.querySelector("#modalOverlay");
  var commentBody = document.querySelector("#body");
  var deleteCommentModal = document.querySelector("#deleteCommentModal");
  var approveCommentModal = document.querySelector("#approveCommentModal");
  var unapproveCommentModal = document.querySelector("#unapproveCommentModal");
  var dcmCancel = document.querySelector("#dcmCancel");
  var acmCancel = document.querySelector("#acmCancel");
  var ucmCancel = document.querySelector("#ucmCancel");
  var deleteButtons = document.querySelectorAll(".deleteBtn");
  var approveButtons = document.querySelectorAll(".approvalBtn");
  var unapproveButtons = document.querySelectorAll(".unapprovalBtn");
  var deleteTarget = document.querySelector("#deleteTarget");
  var approveTarget = document.querySelector("#approveTarget");
  var unapproveTarget = document.querySelector("#unapproveTarget");
  var submitDelete = document.querySelector("#submitDelete");
  var submitApproval = document.querySelector("#submitApproval");
  var submitUnapproval = document.querySelector("#submitUnapproval");
  var _iteratorNormalCompletion = true;
  var _didIteratorError = false;
  var _iteratorError = undefined;

  try {
    for (var _iterator = deleteButtons[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
      var deleteBtn = _step.value;
      deleteBtn.addEventListener("click", function (e) {
        var id = e.target.dataset.id;
        deleteTarget.value = id;
        openModal(deleteCommentModal);
        dcmCancel.focus();
      });
    }
  } catch (err) {
    _didIteratorError = true;
    _iteratorError = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion && _iterator["return"] != null) {
        _iterator["return"]();
      }
    } finally {
      if (_didIteratorError) {
        throw _iteratorError;
      }
    }
  }

  var _iteratorNormalCompletion2 = true;
  var _didIteratorError2 = false;
  var _iteratorError2 = undefined;

  try {
    for (var _iterator2 = approveButtons[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
      var approveBtn = _step2.value;
      approveBtn.addEventListener("click", function (e) {
        var id = e.target.dataset.id;
        approveTarget.value = id;
        openModal(approveCommentModal);
        acmCancel.focus();
      });
    }
  } catch (err) {
    _didIteratorError2 = true;
    _iteratorError2 = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion2 && _iterator2["return"] != null) {
        _iterator2["return"]();
      }
    } finally {
      if (_didIteratorError2) {
        throw _iteratorError2;
      }
    }
  }

  var _iteratorNormalCompletion3 = true;
  var _didIteratorError3 = false;
  var _iteratorError3 = undefined;

  try {
    for (var _iterator3 = unapproveButtons[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
      var unapproveBtn = _step3.value;
      unapproveBtn.addEventListener("click", function (e) {
        var id = e.target.dataset.id;
        unapproveTarget.value = id;
        openModal(unapproveCommentModal);
        ucmCancel.focus();
      });
    }
  } catch (err) {
    _didIteratorError3 = true;
    _iteratorError3 = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion3 && _iterator3["return"] != null) {
        _iterator3["return"]();
      }
    } finally {
      if (_didIteratorError3) {
        throw _iteratorError3;
      }
    }
  }

  modalOverlay.addEventListener("click", function (e) {
    closeModal(deleteCommentModal);
    closeModal(approveCommentModal);
    closeModal(unapproveCommentModal);
  });
  dcmCancel.addEventListener("click", function (e) {
    closeModal(deleteCommentModal);
  });
  acmCancel.addEventListener("click", function (e) {
    closeModal(approveCommentModal);
  });
  ucmCancel.addEventListener("click", function (e) {
    closeModal(unapproveCommentModal);
  });
  deleteCommentModal.addEventListener("keydown", function (e) {
    if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
      if (e.shiftKey)
        /* shift + tab */
        {
          if (document.activeElement === dcmCancel) {
            submitDelete.focus();
            e.preventDefault();
          }
        } else
        /* tab */
        {
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
  approveCommentModal.addEventListener("keydown", function (e) {
    if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
      if (e.shiftKey)
        /* shift + tab */
        {
          if (document.activeElement === acmCancel) {
            submitApproval.focus();
            e.preventDefault();
          }
        } else
        /* tab */
        {
          if (document.activeElement === submitApproval) {
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
  unapproveCommentModal.addEventListener("keydown", function (e) {
    if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
      if (e.shiftKey)
        /* shift + tab */
        {
          if (document.activeElement === ucmCancel) {
            submitUnapproval.focus();
            e.preventDefault();
          }
        } else
        /* tab */
        {
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

function openModal(modal) {
  modalOverlay.classList.replace("hidden", "block");
  modal.classList.replace("hidden", "block");
}

function closeModal(modal) {
  modalOverlay.classList.replace("block", "hidden");
  modal.classList.replace("block", "hidden");
}

/***/ }),

/***/ 12:
/*!******************************************!*\
  !*** multi ./resources/js/dpo-fsh-s3.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/dvanderweele/Code/ArachniCMS/resources/js/dpo-fsh-s3.js */"./resources/js/dpo-fsh-s3.js");


/***/ })

/******/ });