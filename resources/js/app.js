import slick from 'slick-carousel';
import MicroModal from 'micromodal';
import Inputmask from 'inputmask';

require('./bootstrap');

const validationRegexp = {
  text: '^(?!\s*$).+',
  phone: '^(?!\s*$).+'
};

function parseQuery(url) {
  var query = {};
  var queryString = url.toString().split('?');
  if (queryString.length <= 1) {
    return {};
  }

  var queryStringToparse = queryString[1];
  var pairs = (queryStringToparse[0] === '?' ? queryStringToparse.substr(1) : queryStringToparse).split('&');
  for (var i = 0; i < pairs.length; i++) {
    var pair = pairs[i].split('=');
    query[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || '');
  }

  return query;
}

function toggleMobileMenu() {
  $('.mobile-menu').toggleClass('active');
}

function validate(form) {
  const $formInput = $(form).find('.form-input');

  $formInput.each(function(index, element){
    if(!(new RegExp(validationRegexp[$(element).data('validate')]).test($(element).val()))) {
      $(element).parent().find('.form-error').addClass('active');
    } else {
      $(element).parent().find('.form-error').removeClass('active');
    }
  });

  return !$(form).find('.form-group').find('.form-error.active').length;
}

function sendRequest(event) {
  event.preventDefault();

  const self = this;

  if ($('.submit-button').attr('disabled')) {
    return;
  }

  if(!validate(self)) {
    return
  }

  $('.submit-button').attr('disabled', true);

  $.ajax({
    url: 'url',
    type: 'POST',
    dataType: 'html',
    data: $(this).serialize(),
    success: function() {
      $(self).parent().find('.form').hide();
      $(self).parent().find('.form-success-msg').show();
      $('.submit-button').attr('disabled', false);
    },
    error: function() {
      $('.submit-button').attr('disabled', false);
      $('.form-general-error').addClass('active');
    }
  });
}

$(document).ready(function(){
  MicroModal.init();

  $('.main-slider').slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 2000
  });

  $('.feedback-slider').slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 2000
  });

  $('.hamburger').on('click', toggleMobileMenu);
  $('.close').on('click', toggleMobileMenu);

  $('.form').on('submit', sendRequest);

  $('.form-input').on('blur', function () {
    $(this).val().trim();
  });

  $('.form-input').on('focus', function () {
    if ($(this).data('validate').includes('phone')) {
      Inputmask({
        mask: '+7(999)999-99-99',
        showMaskOnHover: false,
        clearMaskOnLostFocus: true,
        autoGroup: true
      }).mask(this);
    }
  });

  $('.product-section-thumbnail').on('click', function(e) {
    e.preventDefault();
    const mainProductImage = $('.product-section-image').find('img');
    const selectedItem = $(this);
    const selectedSrc = selectedItem.find('img').attr('src');

    mainProductImage.attr('src', selectedSrc);
    $('.product-section-thumbnail').removeClass('selected');
    selectedItem.addClass('selected');
  });

  $('ul.tabs li').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('current');
    $('.tab-content').removeClass('current');

    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
  });

  $('.sub-menu ul').hide();
  $(".sub-menu a").click(function () {
    $(this).parent(".sub-menu").children("ul").slideToggle("100");
    // $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
  });

  const searchObject = parseQuery(document.URL);

  if (searchObject.category) {
    const activeMenuItem = $('.categories-list').find("[data-slug="+ searchObject.category + "]");
    activeMenuItem.addClass('active');
    activeMenuItem.children("ul").slideToggle("100");
  }

  $('.go-back-button').on('click', function () {
    window.history.back();
  });

  setTimeout(function () {
    $('.preloader').remove();
  }, 1000);
});