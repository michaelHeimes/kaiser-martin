<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kaiser_Martin
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info wrap-1250 wrap">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kaiser-martin' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'kaiser-martin' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'kaiser-martin' ), 'kaiser-martin', '<a href="https://cairndigitalmedia.com/">Michael Heimes</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if(is_page_template('page-template-company-page.php')):?>
<script>
jQuery(document).ready(function( $ ) {
	// 	Company Page Animations
	var controller = new ScrollMagic.Controller();	
	 
	$('h2').each(function() {
		var scene = new ScrollMagic.Scene({
			triggerElement: this,
			triggerHook: "onEnter",
			offset: "150px"
			})
			.setClassToggle(this, "in-view") // trigger a TweenMax.to tween
			.addTo(controller);
	});

	$('.gray-copy-mask').each(function() {
		var scene = new ScrollMagic.Scene({
			triggerElement: this,
			triggerHook: "onEnter",
			offset: "150px"
			})
			.setTween(this, 0.75, {width: 0, ease: Expo.easeIn}, 0.2)
			.addTo(controller);
	});
	
// 	Team Bios
	var body = $('body');
	var teamMask = $('#bio-copy-wrap-mask');
	var teamFadeTime = 400;
	$('.single-team-member').each(function() {
		
		var bioCopyWrap = $(this).children('.bio-copy-wrap');
		var bioClickClose = $(this).children('.bio-copy-wrap').find('.bio-click-close');
	
		$(this).on('click', 'button.bio-button', function() {
			$(this).parent().parent().children(bioCopyWrap).delay(200).fadeIn(teamFadeTime);
			$(bioClickClose).fadeIn(teamFadeTime);
			$(teamMask).fadeIn(teamFadeTime);
			$(body).css('overflow', 'hidden');
		})
		
		$(this).on('click', 'button.bio-copy-close', function() {
			$(bioClickClose).fadeOut(teamFadeTime);
			$(bioCopyWrap).fadeOut(teamFadeTime);
			$(teamMask).delay(200).fadeOut(teamFadeTime);
			$(body).css('overflow', 'visible');
		})
		
		$(this).on('click', '.bio-click-close', function() {
			$(bioCopyWrap).fadeOut(teamFadeTime);
			$(bioClickClose).fadeOut(teamFadeTime);
			$(teamMask).delay(200).fadeOut(teamFadeTime);
			$(body).css('overflow', 'visible');
		})
		
		$(this).on('click', 'button.bio-prev', function() {
			$(this).parent().parent().parent().fadeOut(teamFadeTime);
			$(this).parent().parent().parent().parent().prevAll('div').not('.no-bio').first().children(bioCopyWrap).fadeIn(teamFadeTime);
		})	
		
		$(this).on('click', 'button.bio-next', function() {
			$(this).parent().parent().parent().fadeOut(teamFadeTime);
			$(this).parent().parent().parent().parent().nextAll('div').not('.no-bio').first().children(bioCopyWrap).fadeIn(teamFadeTime);
		})	
		

		
	})
	
	$(function() {
		var tween = TweenMax.staggerFromTo('.single-team-member', .4, {opacity:0, top:100}, {opacity:1, top:0, ease: Expo.easeIn}, 0.05);
		var scene = new ScrollMagic.Scene({
	    	triggerElement: '.single-team-member',
			triggerHook: "onEnter",
			offset: "200px"
		  	})
		  	.setTween(tween)
		  	.addTo(controller);
	});		  	
	 
/*
	$(function() {	
		var tween = TweenMax.staggerFromTo('img.team-pic-mask', .25, {scale: 1, opacity: 1}, {scale: 9, opacity: 0.75, ease: Expo.easeIn}, 0.05);
		var scene = new ScrollMagic.Scene({
	    	triggerElement: '.single-team-member',
			triggerHook: "onEnter",
			offset: "150px"
		  	})
		  	.setTween(tween)
		  	.addTo(controller);
	});	
*/			
});	
</script>
<?php endif;?>

</body>
</html>
