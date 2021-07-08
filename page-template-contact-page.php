<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kaiser_Martin
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<div class=" wrap-1250 wrap">
		
				<div class="inner">
					
					<div class="half left">
				
						<div id="contact-form-wrap">
							<?php echo do_shortcode('[contact-form-7 id="426" title="Contact Page Form"]');?>
						</div>
						
					</div>
						
					<div class="half right">
						
						<div class="contact info wrap">
							<div id="address-wrap" class="wrap-950 wrap">
								<a href="tell:(610) 816-6995">(610) 816-6995</a>
								<div></div>
								<a href="https://www.google.com/maps/place/The+Kaiser-Martin+Group,+Inc./@40.404967,-75.928666,15z/data=!4m5!3m4!1s0x0:0x80dbd5cca25e92be!8m2!3d40.404967!4d-75.928666" target="_blank">4700 N 5th Street Hwy,<br> Temple, PA 19560</a>
							</div>
						</div>
						
						<div class="email-wrap">
							<a href="mailto:info@kaisermartingroup.com">info@kaisermartingroup.com</a>
						</div>
						
						<div id="contact-social-wrap">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'header-social',
								'menu_id'        => 'header_social',
							) );
							?>
						</div>
						
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
