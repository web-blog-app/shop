// import slick from 'slick-carousel';

require('./bootstrap');
var slick = require('slick-carousel');

function toggleMobileMenu() {
  $('.mobile-menu').toggleClass('active');
}

$(document).ready(function(){
  $('.main-slider').slick({
    dots: true,
    // autoplay: true,
    // autoplaySpeed: 2000
  });

  $('.hamburger').on('click', toggleMobileMenu);
  $('.close').on('click', toggleMobileMenu);
});