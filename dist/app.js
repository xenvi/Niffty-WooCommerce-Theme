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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/*! no static exports found */
/***/ (function(module, exports) {

jQuery(document).ready(function () {
  // reveal search
  jQuery("#nav-search").click(function () {
    jQuery('.search-wrap').toggleClass('fade-in');
  }); // open mobile

  jQuery(".hamburger").click(function () {
    jQuery(".mobile-nav").toggleClass('slide');
  });
  jQuery(".mobile-menu li:has(ul)").click(function () {
    jQuery("ul", this).toggleClass('slide2');
  }); // position sticky IE support
  // Check if Navigator is Internet Explorer

  if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.appVersion.indexOf('Trident/') > -1) {
    // Scroll event check
    jQuery(window).scroll(function (event) {
      var scroll = jQuery(window).scrollTop(); // Activate sticky for IE if scrolltop is more than 51px

      if (scroll > 51) {
        jQuery('.main-nav-wrapper').addClass("sticky-ie");
      } else {
        jQuery('.main-nav-wrapper').removeClass("sticky-ie");
      }
    });
  } // GSAP ANIM


  var tl = gsap.timeline();
  tl.from("#small-landing", {
    autoAlpha: 0,
    y: 100,
    duration: 1,
    delay: 1
  });
  tl.from("#large-landing", {
    autoAlpha: 0,
    y: 50,
    duration: 1
  });
  tl.from("#shop-landing-button", {
    autoAlpha: 0,
    scale: 0,
    duration: 1
  });
  TweenLite.defaultEase = Linear.easeNone;
  var ctrl = new ScrollMagic.Controller(); // Create scenes

  jQuery(".animate").each(function (i) {
    var target = jQuery(this);
    var tl = new TimelineMax();
    tl.from(target, 1, {
      opacity: 0,
      y: 60
    });
    new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 0.5,
      offset: '-120%'
    }).setTween(tl).addTo(ctrl);
  });

  if (jQuery(".woocommerce-MyAccount-navigation").hasClass("animate")) {
    jQuery(".woocommerce-MyAccount-navigation").removeClass(" animate");
  }
});

function toggle() {
  if (jQuery(window).width() >= 770) {
    jQuery('.nav.menu-main-menu-container').show();
    jQuery('.sub-menu').removeClass('mobile-sub-menu');
    jQuery('.sub-menu').show();
  } else {
    jQuery('.nav.menu-main-menu-container').hide();

    if (!jQuery('.sub-menu').hasClass('mobile-sub-menu')) {
      jQuery('.sub-menu').addClass('mobile-sub-menu');
    }
  }
}

toggle();
jQuery(window).resize(function () {
  toggle();
});

/***/ }),

/***/ "./src/app.scss":
/*!**********************!*\
  !*** ./src/app.scss ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************!*\
  !*** multi ./src/app.js ./src/app.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\laragon\www\Niffty\wp-content\themes\niffty\src\app.js */"./src/app.js");
module.exports = __webpack_require__(/*! C:\laragon\www\Niffty\wp-content\themes\niffty\src\app.scss */"./src/app.scss");


/***/ })

/******/ });