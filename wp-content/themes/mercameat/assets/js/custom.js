// HOW IT WORKS?  js
var $ = jQuery.noConflict();
$('#pills-tab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})

// this if for menu after slide

$(function () {
  'use strict';
  var navBar = $('.menu-logo'); //Targets nav element
  var myWindow = $(window);
  myWindow.on('scroll', function () {
    if ($(this).scrollTop() > 200) { //height from top to trigger slideDown
      navBar.addClass('scroll-nav');
    } else if ($(this).scrollTop() < 200) {
      navBar.removeClass('scroll-nav');
    }
  });
});


// for solution page

$(function () {
  $('.list__toggle').click(function () {
    $(this).next('p').slideToggle();
  });
});
// function filterSelection(category){
//     var directChild = $('.product__item__wrapper > div');
//     $(this).addClass('active');
//     if(category==="all"){
//         directChild.addClass('active');
//     }else{
//         directChild.removeClass('active');
//         $('.product__item__wrapper .'+category).addClass('active');
//     }
// }

$("#product__tab a").click(function () {
  var directChild = $('.product__item__wrapper > div');
  $("#product__tab a").removeClass('active');
  $(this).addClass('active');
  var category = $(this).data('category');
  if (category === "all") {
    directChild.addClass('active');
  } else {
    directChild.removeClass('active');
    $('.product__item__wrapper .' + category).addClass('active');
  }
});