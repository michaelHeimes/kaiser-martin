jQuery(document).ready(function( $ ) {
	

	
// 	Mobile Navigation
	  $("#menu").mmenu();


// Hamburger menu color
    $(window).scroll(function() {
        var scroll = $(window).scrollTop() + 40; // how many pixels you've scrolled
        var os = $('#content').offset().top; // pixels to the top of div1
        var ht = $('header#masthead').height(); // height of div1 in pixels
        var nh = $('header#masthead').height();
        // if you've scrolled further than the top of div1 plus it's height
        // change the color. either by adding a class or setting a css property
        if (scroll > ht) {
            $('.hamburger-menu').addClass('new-mmbutton-color');
        } else {
            $('.hamburger-menu').removeClass('new-mmbutton-color');
        }
    });
	
});
