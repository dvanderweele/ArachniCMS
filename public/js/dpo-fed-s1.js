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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dpo-fed-s1.js":
/*!************************************!*\
  !*** ./resources/js/dpo-fed-s1.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

document.addEventListener("DOMContentLoaded", function (event) {
  tinymce.init({
    selector: "#post-body",
    plugins: "link lists",
    menubar: false,
    toolbar: "formatselect bold italic | numlist bullist | undo redo | cut copy paste | link",
    block_formats: "Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6",
    browser_spellcheck: true
  });
  deleteButton = document.getElementById("delete");
  deletionOverlay = document.getElementById("deletionOverlay");
  deletionModal = document.getElementById("deletionModal");
  cancelDelete = document.getElementById("cancelDelete");
  titleField = document.getElementById("post-title");
  submitDelete = document.getElementById("submitDelete");
  deleteButton.addEventListener("click", function () {
    deletionModal.classList.replace("hidden", "block");
    deletionOverlay.classList.replace("hidden", "block");
    cancelDelete.focus();
    var KEYCODE_TAB = 9;
    deletionModal.addEventListener("keydown", function (e) {
      if (e.key === "Tab" || e.keyCode === KEYCODE_TAB) {
        if (e.shiftKey) {
          /* shift + tab */
          if (document.activeElement === cancelDelete) {
            submitDelete.focus();
            e.preventDefault();
          }
        }
        /* tab */
        else {
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
  cancelDelete.addEventListener("click", function () {
    deletionModal.classList.replace("block", "hidden");
    deletionOverlay.classList.replace("block", "hidden");
    titleField.focus();
  });
  deletionOverlay.addEventListener("click", function () {
    deletionModal.classList.replace("block", "hidden");
    deletionOverlay.classList.replace("block", "hidden");
    titleField.focus();
  });
});

/***/ }),

/***/ 8:
/*!******************************************!*\
  !*** multi ./resources/js/dpo-fed-s1.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/dvanderweele/Code/ArachniCMS/resources/js/dpo-fed-s1.js */"./resources/js/dpo-fed-s1.js");


/***/ })

/******/ });