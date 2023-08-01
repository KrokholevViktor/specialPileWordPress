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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/script.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/modules/accordionFaq.js":
/*!****************************************!*\
  !*** ./src/js/modules/accordionFaq.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function accordionFaq(triggersSelector, descrSelector) {
  const triggers = document.querySelectorAll(triggersSelector),
    blocks = document.querySelectorAll(descrSelector);
  triggers.forEach(trigger => {
    trigger.addEventListener('click', function () {
      if (!this.classList.contains('questions__accordion__item_active')) {
        this.classList.add('questions__accordion__item_active');
        this.lastElementChild.classList.remove('fadeOut');
        this.lastElementChild.classList.add('fadeIn');
      } else {
        this.lastElementChild.classList.remove('fadeIn');
        this.lastElementChild.classList.add('fadeOut');
        setTimeout(() => {
          this.classList.remove('questions__accordion__item_active');
        }, 250);
      }
    });
  });
}
;
/* harmony default export */ __webpack_exports__["default"] = (accordionFaq);

/***/ }),

/***/ "./src/js/modules/advantagesSlider.js":
/*!********************************************!*\
  !*** ./src/js/modules/advantagesSlider.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function advantagesSlider(prevBtn, nextBtn, slidesItems, sliderWrapper, sliderInner) {
  const slides = document.querySelectorAll(slidesItems),
    prev = document.querySelector(prevBtn),
    next = document.querySelector(nextBtn),
    slidesWrapper = document.querySelector(sliderWrapper),
    slidesInner = document.querySelector(sliderInner);
  let width = window.getComputedStyle(slidesWrapper).width;
  window.addEventListener('resize', () => {
    width = window.getComputedStyle(slidesWrapper).width;
    if (slideIndex > 1) {
      offset = +width.slice(0, width.length - 2) * (slideIndex - 1) + 130 * (slideIndex - 1); ///ошибка
      slidesInner.style.transform = `translateX(-${offset}px) `;
    }
  });
  let slideIndex = 1;
  let offset = 0;
  function setSlideWidth() {
    slidesInner.style.width = `calc((100 * ${slides.length}%) + (130 * ${slides.length - 1}px))`;
    slides.forEach(slide => {
      slide.style.width = width;
    });
  }
  setSlideWidth();
  window.addEventListener('resize', () => {
    setSlideWidth();
  });
  disabledNext();
  disabledPrev();
  next.addEventListener('click', () => {
    if (offset == +width.slice(0, width.length - 2) * (slides.length - 1)) {
      offset = 0;
    } else {
      offset += +width.slice(0, width.length - 2) + 130;
    }
    slidesInner.style.transform = `translateX(-${offset}px)`;
    if (slideIndex == slides.length) {
      slideIndex = 1;
    } else {
      slideIndex++;
    }
    if (slides.length < 10) {
      current.textContent = `0${slideIndex}`;
    } else {
      current.textContent = slideIndex;
    }
    disabledNext();
    disabledPrev();
  });
  prev.addEventListener('click', () => {
    if (offset == 0) {
      offset = +width.slice(0, width.length - 2) * (slides.length - 1);
    } else {
      offset -= +width.slice(0, width.length - 2) + 130;
    }
    slidesInner.style.transform = `translateX(-${offset}px)`;
    if (slideIndex == 1) {
      slideIndex = slides.length;
    } else {
      slideIndex--;
    }
    if (slides.length < 10) {
      current.textContent = `0${slideIndex}`;
    } else {
      current.textContent = slideIndex;
    }
    disabledNext();
    disabledPrev();
  });
  function disabledPrev() {
    if (slideIndex == 1) {
      prev.disabled = true;
    } else {
      prev.disabled = false;
    }
  }
  ;
  function disabledNext() {
    if (slideIndex == slides.length) {
      next.disabled = true;
    } else {
      next.disabled = false;
    }
  }
  ;
}
;
/* harmony default export */ __webpack_exports__["default"] = (advantagesSlider);

/***/ }),

/***/ "./src/js/modules/burger.js":
/*!**********************************!*\
  !*** ./src/js/modules/burger.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
const burger = (menuSelector, burgerSelector, menuLinks, modalBtn) => {
  const menuElem = document.querySelector(menuSelector),
    burgerElem = document.querySelector(burgerSelector),
    phone = document.querySelector('.header__info_e_p .header__info_phone '),
    links = document.querySelectorAll(menuLinks),
    modalButton = document.querySelector(modalBtn),
    scrollbarWidth = getScrollbarWidth();
  menuElem.style.display = 'none';
  function closeMenu() {
    menuElem.classList.add('fadeOut');
    menuElem.classList.remove('fadeIn');
    setTimeout(() => {
      menuElem.style.display = 'none';
    }, 300);
  }
  links.forEach(link => {
    link.addEventListener('click', () => {
      burgerElem.click();
    });
  });
  modalButton.addEventListener('click', () => {
    burgerElem.click();
    document.body.style.overflow = "hidden";
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {} else {
      document.body.style.paddingRight = `${scrollbarWidth}px`;
    }
  });
  burgerElem.addEventListener('click', () => {
    burgerElem.classList.toggle('active');
    if (burgerElem.classList.contains('active')) {
      phone.style.visibility = 'hidden';
      document.body.style.overflow = 'hidden';
      if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {} else {
        document.body.style.paddingRight = `${scrollbarWidth}px`;
      }
    } else {
      phone.style.visibility = 'visible';
      document.body.style.overflow = '';
      document.body.style.paddingRight = '0px';
    }
    if (menuElem.style.display == 'none' && window.innerWidth < 993) {
      menuElem.style.display = '';
      menuElem.classList.add('fadeIn');
      menuElem.classList.remove('fadeOut');
    } else {
      closeMenu();
    }
  });
  let flagOrientation = false;
  window.addEventListener('orientationchange', () => {
    flagOrientation = true;
  });
  window.addEventListener('resize', () => {
    if (window.screen.availWidth > 992) {
      menuElem.style.display = 'none';
    }
    if (menuElem.classList.contains('fadeIn') && flagOrientation) {
      flagOrientation = false;
    } else if (menuElem.classList.contains('fadeIn')) {
      burgerElem.click();
      // menuElem.classList.remove('fadeIn')
    }
  });

  // Получаем ширину скролла
  function getScrollbarWidth() {
    const outer = document.createElement('div');
    outer.style.visibility = 'hidden';
    outer.style.overflow = 'scroll';
    document.body.appendChild(outer);
    const inner = document.createElement('div');
    outer.appendChild(inner);
    const scrollbarWidth = outer.offsetWidth - inner.offsetWidth;
    outer.parentNode.removeChild(outer);
    return scrollbarWidth;
  }
};
/* harmony default export */ __webpack_exports__["default"] = (burger);

/***/ }),

/***/ "./src/js/modules/changeFormSliderSate.js":
/*!************************************************!*\
  !*** ./src/js/modules/changeFormSliderSate.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function changeFormSliderSate(state) {
  const buldingType = document.querySelectorAll('.item-1 .form-slider__item__card'),
    floorsNumber = document.querySelectorAll('.item-2 .form-slider__item__card'),
    material = document.querySelectorAll('.item-3 .form-slider__item__card'),
    soiltype = document.querySelectorAll('.item-4 .form-slider__item__card'),
    planSelect = document.querySelectorAll('.item-5 .form-slider__item__card-form_select');
  function bindActionToElems(elem, prop) {
    elem.forEach(item => {
      item.addEventListener('click', () => {
        if (item.firstElementChild === null) {
          state[prop] = item.textContent.replace(/\s+/g, ' ');
        } else {
          state[prop] = item.firstElementChild.textContent.replace(/\s+/g, ' ');
        }
      });
    });
  }
  ;
  bindActionToElems(buldingType, 'buldingType');
  bindActionToElems(floorsNumber, 'floorsNumber');
  bindActionToElems(material, 'material');
  bindActionToElems(soiltype, 'soiltype');
  bindActionToElems(planSelect, 'planSelect');
}
; // при клике по картчоке в слайдере добавляет свойство prop в объект state с текстом заголовка картоки

/* harmony default export */ __webpack_exports__["default"] = (changeFormSliderSate);

/***/ }),

/***/ "./src/js/modules/examplesSlider.js":
/*!******************************************!*\
  !*** ./src/js/modules/examplesSlider.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function examplesSlider(prevBtn, nextBtn, slidesItems, sliderWrapper, sliderInner) {
  const slides = document.querySelectorAll(slidesItems),
    prev = document.querySelector(prevBtn),
    next = document.querySelector(nextBtn),
    slidesWrapper = document.querySelector(sliderWrapper),
    slidesInner = document.querySelector(sliderInner);
  let width = window.getComputedStyle(slidesWrapper).width;
  window.addEventListener('resize', () => {
    width = window.getComputedStyle(slidesWrapper).width;
    if (slideIndex > 1) {
      offset = +width.slice(0, width.length - 2) * (slideIndex - 1) + 10 * (slideIndex - 1); ///ошибка
      slidesInner.style.transform = `translateX(-${offset}px) `;
    }
  });
  let slideIndex = 1;
  let offset = 0;
  disabledNext();
  disabledPrev();
  function setSlideWidth() {
    slidesInner.style.width = `calc((100 * ${slides.length}%) + (10 * ${slides.length - 1}px))`;
    // slidesInner.style.width = 100 * slides.length + '%';
    slides.forEach(slide => {
      slide.style.width = width;
    });
  }
  setSlideWidth();
  window.addEventListener('resize', () => {
    setSlideWidth();
  });
  next.addEventListener('click', () => {
    if (offset == +width.slice(0, width.length - 2) * (slides.length - 1)) {
      offset = 0;
    } else {
      offset += +width.slice(0, width.length - 2) + 10;
    }
    slidesInner.style.transform = `translateX(-${offset}px`;
    if (slideIndex == slides.length) {
      slideIndex = 1;
    } else {
      slideIndex++;
    }

    // if (slides.length < 10) {
    //     current.textContent = `0${slideIndex}`;
    // } else {
    //     current.textContent = slideIndex;
    // }
    disabledNext();
    disabledPrev();
  });
  prev.addEventListener('click', () => {
    if (offset == 0) {
      offset = +width.slice(0, width.length - 2) * (slides.length - 1);
    } else {
      offset -= +width.slice(0, width.length - 2) + 10;
    }
    slidesInner.style.transform = `translateX(-${offset}px)`;
    if (slideIndex == 1) {
      slideIndex = slides.length;
    } else {
      slideIndex--;
    }
    disabledNext();
    disabledPrev();
  });
  function disabledPrev() {
    if (slideIndex == 1) {
      prev.disabled = true;
    } else {
      prev.disabled = false;
    }
  }
  ;
  function disabledNext() {
    if (slideIndex == slides.length) {
      next.disabled = true;
    } else {
      next.disabled = false;
    }
  }
  ;

  /////////////////////////функциональность перемещения слайдера
  let isDragging = false;
  let startPosition = 0;
  let currentTranslate = 0;
  function mousedown(e) {
    isDragging = true;
    startPosition = e.clientX;
    slidesInner.style.cursor = 'grabbing';
    slidesInner.style.transition = `0s all`;
  }
  function mousemove(e) {
    if (isDragging) {
      let currentPosition = e.clientX;
      currentTranslate = currentPosition - startPosition;
      updateSliderPosition();
    }
  }
  function mouseup() {
    isDragging = false;
    slidesInner.style.cursor = 'grab';
    slidesInner.style.transition = `0.5s all`;
    if (currentTranslate < -100 && slideIndex != slides.length) {
      next.click();
    } else if (currentTranslate > 100 && slideIndex != 1) {
      prev.click();
    } else {
      slidesInner.style.transform = `translateX(-${offset}px) `;
    }
  }
  function updateSliderPosition() {
    slidesInner.style.transform = `translateX(${-offset + currentTranslate}px)`;
  }

  /////touch
  function touchstart(e) {
    isDragging = true;
    startPosition = e.touches[0].clientX;
    ;
    slidesInner.style.transition = `0s all`;
  }
  ;
  function touchmove(e) {
    if (isDragging) {
      let currentPosition = e.touches[0].clientX;
      currentTranslate = currentPosition - startPosition;
      updateSliderPosition();
    }
  }
  ;
  ///touchEND

  slidesInner.addEventListener('mousedown', mousedown);
  slidesInner.addEventListener('touchstart', touchstart);
  slidesInner.addEventListener('mousemove', mousemove);
  slidesInner.addEventListener('touchmove', touchmove);
  slidesInner.addEventListener('mouseup', mouseup);
  slidesInner.addEventListener('touchend', mouseup);
  slidesInner.addEventListener('mouseleave', () => {
    isDragging = false;
    slidesInner.style.cursor = 'grab';
  });
}
;
/* harmony default export */ __webpack_exports__["default"] = (examplesSlider);

/***/ }),

/***/ "./src/js/modules/fixedHeader.js":
/*!***************************************!*\
  !*** ./src/js/modules/fixedHeader.js ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
const fixedHeader = () => {
  const body = document.querySelector('body');
  const header = document.querySelector('.header');
  const modalBtns = document.querySelectorAll('.header .modal-btn');
  const links = document.querySelectorAll('.header__menu .header_link');
  let prevScrollPosition = window.pageYOffset || document.documentElement.scrollTop;
  let isFixed = false;
  let scrollCounter = 0; // Добавляем счетчик прокрутки
  const scrollThreshold = 25; // Значение прокрутки, после которого удаляем класс
  let clickLinkFlag = false;
  let isScrolling = false;
  let timeout;
  function handleScroll() {
    // Устанавливаем флаг, что страница находится в состоянии прокрутки
    isScrolling = true;
    // Если таймер уже запущен, сбрасываем его
    clearTimeout(timeout);

    // Запускаем таймер с задержкой 200 мс
    timeout = setTimeout(function () {
      // Код, который выполнится, когда страница закончит прокручиваться
      // console.log('Страница закончила скроллиться');
      // Устанавливаем флаг, что страница закончила скроллиться
      isScrolling = false;
      clickLinkFlag = false;
    }, 200);
  }
  window.addEventListener('scroll', handleScroll);
  links.forEach(link => {
    link.addEventListener('click', () => {
      clickLinkFlag = true;
    });
  });
  function fixHeader() {
    // console.log(clickLinkFlag);
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop > prevScrollPosition) {
      // Прямой скролл (scroll down)
      if (!isFixed) {
        header.classList.add('fixed');
        body.style.marginTop = `${header.offsetHeight}px`;
        isFixed = true;
      }
    } else {
      // Обратный скролл (scroll up)
      if (isFixed) {
        isFixed = false;
      }
    }

    // Увеличиваем счетчик прокрутки при скролле обратно
    if (!isFixed) {
      scrollCounter++;
    } else {
      scrollCounter = 0;
    }
    if (clickLinkFlag) {
      // Проверяем флаг нажатия на ссылку

      // Сбрасываем флаг после использования
    } else {
      // Удаляем класс, если счетчик достигнет определенного значения
      if (scrollCounter >= scrollThreshold) {
        header.classList.remove('fixed');
        body.style.marginTop = `0px`;
        isFixed = false;
        scrollCounter = 0; // Сбрасываем счетчик
        modalBtns.forEach(btn => {
          btn.addEventListener('click', () => {
            if (isFixed) {
              header.classList.remove('fixed');
              body.style.marginTop = `0px`;
              isFixed = false;
              scrollCounter = 0;
            }
          });
        });
      }

      // Код для установки класса "fixed" при скролле обратно
      // ... (остальная логика оставляется без изменений)
    }

    prevScrollPosition = scrollTop;
  }
  // Добавляем слушатель события прокрутки
  window.addEventListener('scroll', fixHeader);
};
/* harmony default export */ __webpack_exports__["default"] = (fixedHeader);

/***/ }),

/***/ "./src/js/modules/formSlider.js":
/*!**************************************!*\
  !*** ./src/js/modules/formSlider.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/// slider

function formSlider(prevBtn, nextBtn, slidesItems, sliderWrapper, sliderInner) {
  const slides = document.querySelectorAll(slidesItems),
    prev = document.querySelector(prevBtn),
    next = document.querySelector(nextBtn),
    navigationNext = document.querySelector('.form-slider__navigation_next'),
    total = document.querySelector('#total'),
    current = document.querySelector('#current'),
    counter = document.querySelector('.form-slider__counter'),
    slidesWrapper = document.querySelector(sliderWrapper),
    slidesInner = document.querySelector(sliderInner),
    // width = window.getComputedStyle(slidesWrapper).width,
    titles = document.querySelectorAll('.form-slider__title'),
    buttonForm = document.querySelector('.form-slider__navigation_btn-form');
  let width = window.getComputedStyle(slidesWrapper).width;

  // moveSlide('.form-slider__inner');

  window.addEventListener('resize', () => {
    width = window.getComputedStyle(slidesWrapper).width;
  });
  let slideIndex = 1;
  let offset = 0;
  let slideCounter = 0;
  if (slides.length < 10) {
    total.textContent = `0${slides.length - 1}`;
    current.textContent = `0${slideIndex}`;
  } else {
    total.textContent = slides.length - 1;
    current.textContent = slideIndex;
  }
  ;
  function setSlideWidth() {
    // slidesInner.style.width = `calc((100 * ${slides.length}%) + (10 * ${slides.length - 1}px))`;
    slidesInner.style.width = `calc(100 * ${slides.length}%)`;
    slides.forEach(slide => {
      slide.style.width = width;
    });
  }
  setSlideWidth();
  window.addEventListener('resize', () => {
    setSlideWidth();
    offset = +width.slice(0, width.length - 2) * (slideIndex - 1);
    slidesInner.style.transition = `0s all`;
    slidesInner.style.transform = `translateX(-${offset}px)`;
  });
  hideElements();
  showTitle();
  hidePrev();
  // next.disabled = true;
  setTimeout(() => {
    next.click();
    prev.click();
  }, 10);
  function showTitle() {
    titles.forEach(title => title.style.display = 'none');
    titles[slideIndex - 1].style.display = '';
  }
  ;
  next.addEventListener('click', () => {
    slidesInner.style.transition = `0.5s all`;
    if (offset == +width.slice(0, width.length - 2) * (slides.length - 1)) {
      offset = 0;
    } else {
      // offset += +width.slice(0, width.length - 2) + 10;
      offset += +width.slice(0, width.length - 2);
    }
    slidesInner.style.transform = `translateX(-${offset}px)`;
    if (slideIndex == slides.length) {
      slideIndex = 1;
    } else {
      slideIndex++;
    }
    if (slides.length < 10) {
      current.textContent = `0${slideIndex}`;
    } else {
      current.textContent = slideIndex;
    }
    ////отключил для тестов слайдера disabled
    next.disabled = true;
    ////отключил для тестов слайдера disabled
    hideElements();
    showTitle();
    hidePrev();
    slideCounter++;
    checkSelecteditems(slideCounter);
  });
  prev.addEventListener('click', () => {
    if (offset == 0) {
      offset = +width.slice(0, width.length - 2) * (slides.length - 1);
    } else {
      // offset -= +width.slice(0, width.length - 2) + 10;
      offset -= +width.slice(0, width.length - 2);
    }
    slidesInner.style.transform = `translateX(-${offset}px)`;
    if (slideIndex == 1) {
      slideIndex = slides.length;
    } else {
      slideIndex--;
    }
    if (slides.length < 10) {
      current.textContent = `0${slideIndex}`;
    } else {
      current.textContent = slideIndex;
    }
    hideElements();
    showTitle();
    hidePrev();
    slideCounter--;
    checkSelecteditems(slideCounter);
  });
  function hidePrev() {
    if (slideIndex - 1 == 0) {
      prev.style.visibility = 'hidden';
    } else {
      prev.style.visibility = '';
    }
  }
  ;
  function hideElements() {
    if (slideIndex == slides.length) {
      counter.style.visibility = 'hidden';
      navigationNext.style.display = 'none';
      buttonForm.style.display = '';
    } else {
      counter.style.visibility = '';
      navigationNext.style.display = '';
      buttonForm.style.display = 'none';
    }
  }
  ;
  const slideSelect = () => {
    slides.forEach(slide => {
      const images = slide.querySelectorAll('.form-slider__img'),
        cardAskSelects = slide.querySelectorAll('.form-slider__item__card-form_select');
      images.forEach(element => {
        element.addEventListener('click', () => {
          images.forEach(element => {
            element.children[1].classList.remove('img-selected');
          });
          element.children[1].classList.add('img-selected');
          next.disabled = false;
          if (!element.children[1].classList.contains('img-selected')) {
            element.children[1].previousElementSibling.style.cssText = "border-bottom: 1px solid $black-color;";
          } else {
            images.forEach(element => {
              element.children[1].previousElementSibling.style.cssText = "border-bottom: 1px solid $black-color;";
            });
            element.children[1].previousElementSibling.style.cssText = "background-color: transparent; border-bottom: none; color: white; ";
          }
        });
      });
      cardAskSelects.forEach(select => {
        select.addEventListener('click', () => {
          next.disabled = false;
          cardAskSelects.forEach(select => {
            select.classList.remove('ask-selected');
          });
          select.classList.add('ask-selected');
        });
      });

      //////////////////////////////////////// заменяет чёрточку в counter у form-slider
      const counterDivider = document.querySelector('.form-slider__counter_divider');
      if (window.innerWidth < 576 || window.screen.availWidth < 576) {
        counterDivider.textContent = '';
        images.forEach(element => {
          element.children[1].style.display = 'none';
        });
      }
      ;
      window.addEventListener('resize', () => {
        if (window.innerWidth < 576 || window.screen.availWidth < 576) {
          counterDivider.textContent = '';
          images.forEach(element => {
            element.children[1].style.display = 'none';
          });
        } else {
          counterDivider.textContent = '/';
          images.forEach(element => {
            element.children[1].style.display = '';
          });
        }
      });
      /////////////////////////////////////////////
    });
  };

  slideSelect();

  // проверяет карточки в слайдере на наличие класса и включает или оключает кнопку next 
  function checkSelecteditems(i) {
    let slidesItems = slides[i].querySelectorAll('.form-slider__img');
    let askitems = slides[i].querySelectorAll('.form-slider__item__card-form_select');
    function chek(typeSlide) {
      for (i = 0; i < typeSlide.length; i++) {
        try {
          if (!typeSlide[i].children[1].classList.contains('img-selected')) {
            // next.disabled = true;
            ////отключил для тестов слайдера disabled
          } else {
            next.disabled = false;
            return;
          }
        } catch (error) {
          if (!typeSlide[i].classList.contains('ask-selected')) {
            next.disabled = true;
            ////отключил для тестов слайдера disabled
          } else {
            next.disabled = false;
            return;
          }
        }
      }
      ;
    }
    ;
    chek(slidesItems);
    chek(askitems);
  }
  ;
}
/* harmony default export */ __webpack_exports__["default"] = (formSlider);

/***/ }),

/***/ "./src/js/modules/forms.js":
/*!*********************************!*\
  !*** ./src/js/modules/forms.js ***!
  \*********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function forms(state) {
  const formWrapper = document.querySelectorAll('form'),
    inputs = document.querySelectorAll('input'),
    phoneInputs = document.querySelectorAll('input[name="phone"]'),
    upload = document.querySelectorAll('[name="file"]');
  phoneInputs.forEach(input => {
    input.addEventListener('input', () => {
      input.value = input.value.replace(/\D/, '');
    });
  });
  const message = {
    loading: 'Загрузка...',
    success: 'Заявка успешно отправленна!',
    failure: 'Что-то пошло не так...'
  };
  const postData = async (url, data) => {
    document.querySelector('.status').textContent = message.loading;
    let res = await fetch(url, {
      method: "POST",
      body: data
    });
    return await res.text();
  };
  const clearInputs = () => {
    inputs.forEach(input => {
      input.value = '';
    });
    upload.forEach(item => {
      item.previousElementSibling.textContent = 'Прикрепить файл';
    });
  };
  upload.forEach(item => {
    item.addEventListener('input', () => {
      let dots;
      const arr = item.files[0].name.split('.');
      arr[0].length > 15 ? dots = "..." : dots = '.';
      const name = arr[0].substring(0, 15) + dots + arr[1];
      item.previousElementSibling.textContent = name;
    });
  });

  // const buttonForm = document.querySelector('.form-slider__navigation_btn-form button');
  // buttonForm.addEventListener('click', () => {
  //     validateForm();
  // })

  // function validateForm() {

  //     const errorMessage = document.getElementById('error-message-empty');
  //     inputs.forEach(input => {
  //         console.log(input.value);
  //         if (input.value.trim() === '') {

  //             errorMessage.style.display = 'block';
  //             return false; // Отменяем отправку формы, если поле пустое
  //           } else {
  //             errorMessage.style.display = 'none';
  //             return true; // Разрешаем отправку формы, если поле заполнено
  //           }
  //     })
  //   }

  function validation(form, inputFocus, event) {
    let result = true;
    let emailFlag = false;
    const minLength = 18;
    const tooltips = document.querySelectorAll('.tooltip');
    function removeError(input) {
      const parent = input.parentNode;
      if (parent.classList.contains('form-main__item-error')) {
        parent.querySelector('.error-div').remove();
        parent.classList.remove('form-main__item-error');
        input.classList.remove('error-focus-border');
        tooltips.forEach(tooltip => {
          if (parent.classList.contains('form-main__item-error') && parent.querySelector('.tooltip')) {
            tooltip.classList.remove('tooltip-error');
          }
        });
      }
    }
    function createError(input, text) {
      const parent = input.parentNode;
      const errorDiv = document.createElement('div');
      errorDiv.classList.add('error-div');
      errorDiv.textContent = text;
      parent.append(errorDiv);
      parent.classList.add('form-main__item-error');
      input.classList.add('error-focus-border');
      tooltips.forEach(tooltip => {
        if (parent.classList.contains('form-main__item-error') && parent.querySelector('.tooltip')) {
          tooltip.classList.add('tooltip-error');
        }
      });
    }
    function createErrorMessage(inputFocusCurrent) {
      if (inputFocusCurrent.value == "" && inputFocusCurrent.getAttribute('name') === 'phone') {
        createError(inputFocusCurrent, 'Поле не заполнено');
        result = false;
      } else if (inputFocusCurrent.value == "" && inputFocusCurrent.getAttribute('name') === 'email') {
        createError(inputFocusCurrent, 'Поле не заполнено');
        result = false;
      } else if (inputFocusCurrent.value.length < minLength && inputFocusCurrent.getAttribute('name') === 'phone') {
        createError(inputFocusCurrent, 'Введите номер полностью');
        result = false;
      } else if (emailFlag == false && inputFocusCurrent.getAttribute('name') === 'email') {
        createError(inputFocusCurrent, 'Неверный адрес электронной почты.');
        result = false;
      } else if (!inputFocusCurrent.checked && inputFocusCurrent.getAttribute('name') === 'checkbox' && event.type == 'submit') {
        createError(inputFocusCurrent, 'Подтвердите свое согласие');
        result = false;
      }
    }
    function isEmailValid(email) {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailPattern.test(email);
    }
    if (inputFocus) {
      const allInputs = form.querySelectorAll('.input--required');
      for (const input of allInputs) {
        removeError(inputFocus);
        if (isEmailValid(input.value)) {
          emailFlag = true;
        }
      }
      createErrorMessage(inputFocus);
    } else {
      const allInputs = form.querySelectorAll('.input--required');
      for (const input of allInputs) {
        removeError(input);
        // let emailFlag = false;

        if (isEmailValid(input.value)) {
          emailFlag = true;
        }
        if (input.value == "" && input.getAttribute('name') === 'phone') {
          createError(input, 'Поле не заполнено');
          result = false;
        } else if (input.value == "" && input.getAttribute('name') === 'email') {
          createError(input, 'Поле не заполнено');
          result = false;
        } else if (input.value.length < minLength && input.getAttribute('name') === 'phone') {
          createError(input, 'Введите номер полностью');
          result = false;
        } else if (emailFlag == false && input.getAttribute('name') === 'email') {
          createError(input, 'Неверный адрес электронной почты.');
          result = false;
        } else if (!input.checked && input.getAttribute('name') === 'checkbox' && event.type == 'submit') {
          createError(input, 'Подтвердите свое согласие');
          result = false;
        }
      }
    }
    return result;
  }
  formWrapper.forEach(item => {
    const allRequireInputs = item.querySelectorAll('.input--required');
    allRequireInputs.forEach(input => {
      input.addEventListener('change', event => {
        validation(item, input, event);
        input.addEventListener('input', event => {
          validation(item, input, event);
        });
      });
    });
    item.addEventListener('submit', event => {
      event.preventDefault();
      if (validation(item, false, event)) {
        let statusMessage = document.createElement('div');
        statusMessage.classList.add('status');
        item.appendChild(statusMessage);
        const formData = new FormData(item);
        if (item.getAttribute('data-calc') === "end") {
          for (let key in state) {
            formData.append(key, state[key]);
          }
        }
        postData('server.php', formData).then(res => {
          console.log(res);
          statusMessage.textContent = message.success;
        }).catch(() => {
          statusMessage.textContent = message.failure;
        }).finally(() => {
          clearInputs();
          setTimeout(() => {
            statusMessage.remove();
          }, 5000);
        });
        const checkboxs = document.querySelectorAll('input[name="checkbox"]');
        checkboxs.forEach(checkbox => {
          checkbox.checked = false;
        });
      }
    });
  });
}
;
/* harmony default export */ __webpack_exports__["default"] = (forms);

/***/ }),

/***/ "./src/js/modules/mask.js":
/*!********************************!*\
  !*** ./src/js/modules/mask.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
const mask = selector => {
  let setCursorPosition = (pos, elem) => {
    elem.focus();
    if (elem.setSelectionRange) {
      elem.setSelectionRange(pos, pos);
    } else if (elem.createTextRange) {
      let range = elem.createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
    }
  };
  function createMask(event) {
    let matrix = '+7 (___) ___ __ __',
      i = 0,
      def = matrix.replace(/\D/g, ''),
      val = this.value.replace(/\D/g, '');
    if (def.length >= val.length) {
      val = def;
    }
    this.value = matrix.replace(/./g, function (a) {
      return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? '' : a;
    });
    if (event.type === 'blur') {
      if (this.value.length == 2) {
        this.value = '';
      }
    } else {
      setCursorPosition(this.value.length, this);
    }
  }
  let inputs = document.querySelectorAll(selector);
  inputs.forEach(input => {
    input.addEventListener('input', createMask);
    input.addEventListener('focus', createMask);
    input.addEventListener('blur', createMask);
  });
};
/* harmony default export */ __webpack_exports__["default"] = (mask);

/***/ }),

/***/ "./src/js/modules/modals.js":
/*!**********************************!*\
  !*** ./src/js/modules/modals.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
const modals = () => {
  function bindModal(triggersSelector, modalSelctor, closeSelector) {
    const triggers = document.querySelectorAll(triggersSelector),
      modal = document.querySelector(modalSelctor),
      close = document.querySelector(closeSelector);

    // Получаем ширину скролла
    function getScrollbarWidth() {
      const outer = document.createElement('div');
      outer.style.visibility = 'hidden';
      outer.style.overflow = 'scroll';
      document.body.appendChild(outer);
      const inner = document.createElement('div');
      outer.appendChild(inner);
      const scrollbarWidth = outer.offsetWidth - inner.offsetWidth;
      outer.parentNode.removeChild(outer);
      return scrollbarWidth;
    }
    triggers.forEach(trigger => {
      trigger.addEventListener('click', e => {
        if (e.target) {
          e.preventDefault();
        }
        const scrollbarWidth = getScrollbarWidth();
        modal.style.display = "block";
        document.body.style.overflow = "hidden";
        document.body.style.paddingRight = `${scrollbarWidth}px`;
        close.addEventListener('click', () => {
          modal.style.display = "none";
          document.body.style.overflow = "";
          document.body.style.paddingRight = '0px';
        });
        modal.addEventListener('click', e => {
          if (e.target === modal) {
            modal.style.display = "none";
            document.body.style.overflow = "";
          }
        });
      });
    });
  }
  bindModal('.modal-btn', '.modal', '.modal__close');
};
/* harmony default export */ __webpack_exports__["default"] = (modals);

/***/ }),

/***/ "./src/js/modules/moveSlide.js":
/*!*************************************!*\
  !*** ./src/js/modules/moveSlide.js ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
const moveSlide = (sliderTouch, offset, btnNext, btnPrev) => {
  const slider = document.querySelector(sliderTouch);
  let isDragging = false;
  let startPosition = 0;
  let currentTranslate = 0;
  // let prevTranslate = 0;

  slider.addEventListener('mousedown', e => {
    console.log(`Offset при нажатии ${offset}`);
    isDragging = true; //При нажатии на слайдер флаг в true
    startPosition = e.clientX; //начальная позиция
    slider.style.cursor = 'grabbing';
    slider.style.transition = `0s all`;
  });
  slider.addEventListener('mousemove', e => {
    if (isDragging) {
      //проверка нажата мышка или нет
      let currentPosition = e.clientX; //текущая позиция
      // currentTranslate = prevTranslate + currentPosition - startPosition; //рассчитываем текущее смещение мышки
      console.log(`Offset при перемещении ${offset}`);
      currentTranslate = currentPosition - startPosition; //рассчитываем текущее смещение мышки
      console.log(`текущая позиция ${currentPosition}`);
      updateSliderPosition();
    }
  });
  slider.addEventListener('mouseup', () => {
    isDragging = false;
    // prevTranslate = currentTranslate;
    slider.style.cursor = 'grab';
    slider.style.transform = `translateX(-${offset}px) `;
    // startPosition = 0;
    if (currentTranslate < -100) {
      btnNext.click();
      // prevTranslate = 0;
      // startPosition = offset;
    } else if (currentTranslate > 100) {
      btnPrev.click();
    }
  });
  slider.addEventListener('mouseleave', () => {
    isDragging = false;
    slider.style.cursor = 'grab';
    console.log(`Offset мышка покинула слайдер ${offset}`);
  });
  function updateSliderPosition() {
    slider.style.transform = `translateX(${-offset + currentTranslate}px)`;
    // requestAnimationFrame(updateSliderPosition);
    console.log(`текущее перемещение ${currentTranslate}`);
    // console.log(prevTranslate);
    console.log(`стартовая позиция ${startPosition}`);
  }

  // moveSlide(sliderTouch, offset, btnNext);
};

/* harmony default export */ __webpack_exports__["default"] = (moveSlide);

/***/ }),

/***/ "./src/js/modules/reviewsSlider.js":
/*!*****************************************!*\
  !*** ./src/js/modules/reviewsSlider.js ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _moveSlide__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./moveSlide */ "./src/js/modules/moveSlide.js");

function reviewsSlider(prevBtn, nextBtn, slidesItems, sliderWrapper, sliderInner) {
  const slides = document.querySelectorAll(slidesItems),
    prev = document.querySelector(prevBtn),
    next = document.querySelector(nextBtn),
    // slidesWrapper = document.querySelector(sliderWrapper),
    slidesInner = document.querySelector(sliderInner);
  slidesInner.style.width = 100 * slides.length + '%';
  let width = window.getComputedStyle(document.querySelectorAll(slidesItems)[0]).width;
  let slideIndex = 1;
  let offset = 0;
  window.addEventListener('resize', () => {
    width = window.getComputedStyle(document.querySelectorAll(slidesItems)[0]).width;
    if (slideIndex > 1) {
      offset = +width.slice(0, width.length - 2) * (slideIndex - 1) + 20 * (slideIndex - 1); ///ошибка
      slidesInner.style.transform = `translateX(-${offset}px) `;
      console.log(offset);
    }
  });
  disabledNext();
  disabledPrev();
  next.addEventListener('click', () => {
    if (offset == +width.slice(0, width.length - 2) * (slides.length - 1)) {
      offset = 0;
    } else {
      offset += +width.slice(0, width.length - 2) + 20;
    }
    slidesInner.style.transform = `translateX(-${offset}px)`;
    if (slideIndex == slides.length) {
      slideIndex = 1;
    } else {
      slideIndex++;
    }
    disabledNext();
    disabledPrev();
  });
  prev.addEventListener('click', () => {
    if (offset == 0) {
      offset = +width.slice(0, width.length - 2) * (slides.length - 1);
    } else {
      offset -= +width.slice(0, width.length - 2) + 20;
    }
    slidesInner.style.transform = `translateX(-${offset}px)`;
    if (slideIndex == 1) {
      slideIndex = slides.length;
    } else {
      slideIndex--;
    }
    disabledNext();
    disabledPrev();
  });
  function disabledPrev() {
    if (slideIndex == 1) {
      prev.disabled = true;
    } else {
      prev.disabled = false;
    }
  }
  ;
  function disabledNext() {
    if (slideIndex == slides.length) {
      next.disabled = true;
    } else {
      next.disabled = false;
    }
  }
  ;

  /////////////////////////функциональность перемещения слайдера
  let isDragging = false;
  let startPosition = 0;
  let currentTranslate = 0;
  function mousedown(e) {
    isDragging = true;
    startPosition = e.clientX;
    slidesInner.style.cursor = 'grabbing';
    slidesInner.style.transition = `0s all`;
  }
  function mousemove(e) {
    if (isDragging) {
      let currentPosition = e.clientX;
      currentTranslate = currentPosition - startPosition;
      updateSliderPosition();
    }
  }
  function mouseup() {
    isDragging = false;
    slidesInner.style.cursor = 'grab';
    slidesInner.style.transition = `0.5s all`;
    if (currentTranslate < -100 && slideIndex != slides.length) {
      next.click();
    } else if (currentTranslate > 100 && slideIndex != 1) {
      prev.click();
    } else {
      slidesInner.style.transform = `translateX(-${offset}px) `;
    }
  }
  function updateSliderPosition() {
    slidesInner.style.transform = `translateX(${-offset + currentTranslate}px)`;
  }

  /////touch
  function touchstart(e) {
    isDragging = true;
    startPosition = e.touches[0].clientX;
    ;
    slidesInner.style.transition = `0s all`;
  }
  ;
  function touchmove(e) {
    if (isDragging) {
      let currentPosition = e.touches[0].clientX;
      currentTranslate = currentPosition - startPosition;
      updateSliderPosition();
    }
  }
  ;
  ///touchEND

  slidesInner.addEventListener('mousedown', mousedown);
  slidesInner.addEventListener('touchstart', touchstart);
  slidesInner.addEventListener('mousemove', mousemove);
  slidesInner.addEventListener('touchmove', touchmove);
  slidesInner.addEventListener('mouseup', mouseup);
  slidesInner.addEventListener('touchend', mouseup);
  slidesInner.addEventListener('mouseleave', () => {
    isDragging = false;
    slidesInner.style.cursor = 'grab';
  });
}
;
/* harmony default export */ __webpack_exports__["default"] = (reviewsSlider);

/***/ }),

/***/ "./src/js/script.js":
/*!**************************!*\
  !*** ./src/js/script.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_formSlider__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/formSlider */ "./src/js/modules/formSlider.js");
/* harmony import */ var _modules_examplesSlider__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/examplesSlider */ "./src/js/modules/examplesSlider.js");
/* harmony import */ var _modules_reviewsSlider__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/reviewsSlider */ "./src/js/modules/reviewsSlider.js");
/* harmony import */ var _modules_accordionFaq__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/accordionFaq */ "./src/js/modules/accordionFaq.js");
/* harmony import */ var _modules_forms__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./modules/forms */ "./src/js/modules/forms.js");
/* harmony import */ var _modules_modals__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./modules/modals */ "./src/js/modules/modals.js");
/* harmony import */ var _modules_changeFormSliderSate__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./modules/changeFormSliderSate */ "./src/js/modules/changeFormSliderSate.js");
/* harmony import */ var _modules_mask__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./modules/mask */ "./src/js/modules/mask.js");
/* harmony import */ var _modules_burger__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./modules/burger */ "./src/js/modules/burger.js");
/* harmony import */ var _modules_advantagesSlider__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./modules/advantagesSlider */ "./src/js/modules/advantagesSlider.js");
/* harmony import */ var _modules_fixedHeader__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./modules/fixedHeader */ "./src/js/modules/fixedHeader.js");











window.addEventListener('DOMContentLoaded', function () {
  "use strict";

  let formSliderState = {};
  try {
    Object(_modules_formSlider__WEBPACK_IMPORTED_MODULE_0__["default"])('.form-slider__navigation_prev .button_black', '.form-slider__navigation_next .button_black', '.form-slider__item', '.form-slider__wrapper', '.form-slider__inner');
    Object(_modules_changeFormSliderSate__WEBPACK_IMPORTED_MODULE_6__["default"])(formSliderState);
  } catch (error) {
    console.log(error);
  }
  try {
    Object(_modules_reviewsSlider__WEBPACK_IMPORTED_MODULE_2__["default"])('.reviews__navigation .navigation_prev .button_black', '.reviews__navigation .navigation_next .button_black', '.reviews__slide', '.reviews__wrapper', '.reviews__inner'); // init slider for reviews
  } catch (error) {
    console.log(error);
  }
  try {
    Object(_modules_advantagesSlider__WEBPACK_IMPORTED_MODULE_9__["default"])('.advantages__navigation .navigation_prev .button_black', '.advantages__navigation .navigation_next .button_black', '.advantages__slide', '.advantages__slider', '.advantages__inner');
  } catch (error) {
    console.log(error);
  }
  try {
    Object(_modules_examplesSlider__WEBPACK_IMPORTED_MODULE_1__["default"])('.examples__navigation .navigation_prev .button_black', '.examples__navigation .navigation_next .button_black', '.examples__slide', '.examples__wrapper', '.examples__inner');
  } catch (error) {
    console.log(error);
  }
  try {
    // Функция, которая будет вызываться при изменении в examples_inner
    function onExamplesSlideChange(mutationsList, observer) {
      console.log("Количество examples_slide изменилось!");
      console.log("Новое количество элементов:", mutationsList[0].target.children.length);
      Object(_modules_examplesSlider__WEBPACK_IMPORTED_MODULE_1__["default"])('.examples__navigation .navigation_prev .button_black', '.examples__navigation .navigation_next .button_black', '.examples__slide', '.examples__wrapper', '.examples__inner');
    }

    // Целевой элемент, за которым будем следить
    const examplesInner = document.querySelector('.examples__inner');
    // Создаем MutationObserver
    const observer = new MutationObserver(onExamplesSlideChange);

    // Настройка MutationObserver
    const config = {
      childList: true
    };

    // Начинаем наблюдение за изменениями
    observer.observe(examplesInner, config);
  } catch (error) {
    console.log('ошибка MutationObserver');
    console.log(error);
  }
  try {
    Object(_modules_accordionFaq__WEBPACK_IMPORTED_MODULE_3__["default"])('.questions__accordion__item', '.questions__accordion__descr');
  } catch (error) {
    console.log(error);
  }
  try {
    Object(_modules_forms__WEBPACK_IMPORTED_MODULE_4__["default"])(formSliderState);
  } catch (error) {
    console.log(error);
  }
  try {
    Object(_modules_modals__WEBPACK_IMPORTED_MODULE_5__["default"])();
  } catch (error) {
    console.log(error);
  }
  try {
    Object(_modules_mask__WEBPACK_IMPORTED_MODULE_7__["default"])('[name="phone"]');
  } catch (error) {
    console.log(error);
  }
  try {
    Object(_modules_burger__WEBPACK_IMPORTED_MODULE_8__["default"])('.header__menu_burger', '.burger', '.header__menu_burger .header_link', '.header__menu_burger--scroll .modal-btn');
  } catch (error) {
    console.log(error);
  }
  try {
    Object(_modules_fixedHeader__WEBPACK_IMPORTED_MODULE_10__["default"])();
  } catch (error) {
    console.log(error);
  }
  let address_map = document.querySelector('.address_map').textContent;
  console.log(address_map);
  let address_descr = document.querySelector('.address_descr').textContent;
  let apiKey = '1997deae-7f1f-4cdb-bbee-84f7aafcaf39';
  let geocodeUrl = "https://geocode-maps.yandex.ru/1.x/?apikey=" + apiKey + "&format=json&geocode=" + encodeURIComponent(address_map);
  let latitude = 52.288503;
  let longitude = 104.289536;

  console.log(geocodeUrl);
  const xhr = new XMLHttpRequest();
  xhr.open("GET", geocodeUrl, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      let data = JSON.parse(xhr.responseText);
      // Доступ к координатам из ответа
      let coordinates = data.response.GeoObjectCollection.featureMember[0].GeoObject.Point.pos.split(' ');
      latitude = coordinates[1]; // Широта
      longitude = coordinates[0]; // Долгота
      console.log(address_map);
      console.log(latitude);
      console.log(longitude);
      let center = [latitude, longitude];
      ymaps.ready(init);
      function init() {
        // Создание карты.
        let map = new ymaps.Map("map", {
          center: center,
          zoom: 14
        });
        let placemark = new ymaps.Placemark(center, {
          balloonContentHeader: address_map,
          balloonContentBody: address_descr
        }, {});
        map.controls.remove('geolocationControl'); // удаляем геолокацию
        map.controls.remove('searchControl'); // удаляем поиск
        map.controls.remove('trafficControl'); // удаляем контроль трафика
        map.controls.remove('typeSelector'); // удаляем тип
        map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
        // map.controls.remove('zoomControl'); // удаляем контрол зуммирования
        map.controls.remove('rulerControl'); // удаляем контрол правил
        map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)

        map.geoObjects.add(placemark);
      }
    } else {
      console.log("Ошибка при выполнении запроса на геокодирование.");
    }
  };
  xhr.send();
});

// (function($){
//     $(window).on("elementor/frontend/init",function(){
//         elementorFrontend.hooks.addAction("frontend/element_ready/specialpile_slider.default",function($scope,$){
//             alert('slider');
//         });
//     });
// })(jQuery);

/***/ })

/******/ });
//# sourceMappingURL=script.js.map