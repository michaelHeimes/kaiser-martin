jQuery(document).ready(function( $ ) {
	
	$(function() {
	  function setHeight() {
	    windowHeight = $(window).innerHeight();
	    $('#quad-wrap').css('min-height', windowHeight - 103.25);
	  };
	  setHeight();
	  
	  $(window).resize(function() {
	    setHeight();
	  })
	  });
	
// 	Mobile Navigation
	  $("#menu").mmenu();
/*
	$('header').on('click', '#mmenu-button', function() {
		$('.hamburger-menu').toggleClass('animate');
	})
*/

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

	
// 	Title Box Animations
	var titleBoxAnimation = new TimelineMax();
	var entryTitle = ("h1.entry-title")
	var griffin = ("img#title-griffin")
	var tl = ("span#title-tl")
	var tr = ("span#title-tr")
	var leftLine = ("span#left-line")
	var rightLine = ("span#right-line")
	var bl = ("span#title-bl")
	var downArrow = ("#down-arrow-wrap")
	var content = ("#primary")
	var br = ("span#title-br")
	var duration = ("0.18")
	var delay = ("+=0.018")
	titleBoxAnimation.delay(0.2)
	.to(entryTitle, 0.5, {opacity:1, y:0, ease: Circ.easeOut}, delay)
	.to(tl, duration, {left: 0, ease: Linear.easeNone}, delay)
	.to(leftLine, duration, {bottom: 0, ease: Linear.easeNone}, delay)
	.to(bl, duration, {right:0, ease: Linear.easeNone}, delay)
	.to(br, duration, {right: 0, ease: Linear.easeNone}, delay)
	.to(rightLine, duration, {top: 0, ease: Linear.easeNone}, delay)
	.to(tr, duration, {xPercent:-101, ease: Linear.easeNone}, delay)
	.to(griffin, 0.5, {scale: 1.2, opacity:1, ease: Circ.easeIn}, delay)
	.to(griffin, 0.25, {scale: 1, ease: Circ.easeOut}, "+=0.1")
	.to(downArrow, 0.5, {opacity:1, y:0, ease: Circ.easeOut}, 1)
	
	$("#down-arrow-wrap").on('click' , function(e) {
		TweenMax.to(window, 1, {scrollTo:{y:content,  ease: Expo.easeIn}});
	})	


	if ( $('body').hasClass('home') ) {
	// 	Home Page Animations
		var homePageGrid = new TimelineMax();
		var duration = ("0.75")
		homePageGrid.delay(1)
		.to('a#home-nav-top-left', duration, {opacity:1, ease: Linear.none})
		.to('a#home-nav-top-right', duration, {opacity:1, ease: Linear.none}, 0.2)
		.to('a#home-nav-bottom-right', duration, {opacity:1, ease: Linear.none}, 0.3)
		.to('a#home-nav-bottom-left', duration, {opacity:1, ease: Linear.none}, 0.4)
	
	
/*
    $('#quad-wrap a').each(function(){ 
    var words = $(this).find('.link-label').text().split(/\s+/);
    var total = words.length;
    $(this).empty();
    for (index = 0; index < total; index ++){
      $(this).append($("<span /> ").text(words[index]));
      }
    })
*/
		

	
	// 	Home Nav Hover 
/*
		$('#quad-wrap a').hover(function() {
		    $('#quad-wrap a').not(this).toggleClass('other-nav');
		})
		
		$('a#home-nav-top-left').hover(function() {
		    $('a#home-nav-top-right').toggleClass('shrink-width');
		    $('a#home-nav-top-right').toggleClass('stretch-height');
		    $('a#home-nav-bottom-left').toggleClass('shrink-height');
		    $('a#home-nav-bottom-right').toggleClass('shrink-height');
			$(this).toggleClass('grow');
		})
		
		$('a#home-nav-top-right').hover(function() {
		    $('a#home-nav-top-left').toggleClass('shrink-width');
		    $('a#home-nav-top-left').toggleClass('stretch-height');
		    $('a#home-nav-bottom-left').toggleClass('shrink-height');
		    $('a#home-nav-bottom-right').toggleClass('shrink-height');
			$(this).toggleClass('grow');
		})
		
		$('a#home-nav-bottom-left').hover(function() {
		    $('a#home-nav-top-left').toggleClass('shrink-height');
		    $('a#home-nav-top-right').toggleClass('shrink-height');
		    $('a#home-nav-bottom-right').toggleClass('shrink-width');
		    $('a#home-nav-bottom-right').toggleClass('stretch-height');
			$(this).toggleClass('grow');
		})
		
		$('a#home-nav-bottom-right').hover(function() {
		    $('a#home-nav-top-left').toggleClass('shrink-height');
		    $('a#home-nav-bottom-left').toggleClass('shrink-width');
		    $('a#home-nav-bottom-left').toggleClass('stretch-height');
		    $('a#home-nav-top-right').toggleClass('shrink-height');
			$(this).toggleClass('grow');
		})	
*/	
	}
	
	
});
