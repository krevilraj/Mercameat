// HOW IT WORKS?  js

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
    $('.list__toggle').click(function() {
        $(this).next('p').slideToggle();
    });
});