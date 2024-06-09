/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/dashboard.js ***!
  \***********************************/
var hamburger = document.querySelector(".toggle-btn");
var sidebar = document.querySelector("#sidebar");

// Memeriksa lebar layar
var isDesktop = window.innerWidth >= 768; // Lebar desktop minimal 768px
var isTablet = window.innerWidth >= 480 && window.innerWidth < 768; // Lebar tablet antara 480px dan 768px
var isMobile = window.innerWidth < 480; // Lebar mobile kurang dari 480px

if (isDesktop) {
  sidebar.classList.add("expand");
}

// Menambahkan event listener ke tombol hamburger
hamburger.addEventListener("click", function () {
  // Memeriksa jenis perangkat
  if (isDesktop) {
    sidebar.classList.toggle("expand");
  } else if (isTablet) {
    sidebar.classList.toggle("expand");
  } else if (isMobile) {
    console.log("Mobile");
  }
});
$('.explore-blogs .row').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [{
    breakpoint: 768,
    settings: {
      slidesToShow: 2
    }
  }, {
    breakpoint: 576,
    settings: {
      slidesToShow: 1
    }
  }]
});
/******/ })()
;