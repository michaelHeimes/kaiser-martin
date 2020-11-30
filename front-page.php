<?php
/**
 * The template for displaying the home page
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
		
		<nav id="quad-wrap">
			
			<?php if( have_rows('top_left') ): 
				while( have_rows('top_left') ): the_row();
					$post_id = get_sub_field('page', false, false);
					if( $post_id ): ?>
					<?php
					$imgID = get_sub_field('image');
					$imgSize = "full";
					$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
					?>
					<?php 
					if( !empty($imgID) ): ?>
					<a href="<?php echo get_the_permalink($post_id); ?>" style="background-image: url(<?php echo $imgArr[0]; ?> );background-repeat: no-repeat;background-position: center center; background-size:cover;" id="home-nav-top-left"><span class="link-label"><?php echo get_the_title($post_id); ?></span><div class="quad-link-mask"></div></a>
					<?php endif; ?>	
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
			
			<?php if( have_rows('top_right') ): 
				while( have_rows('top_right') ): the_row();
					$post_id = get_sub_field('page', false, false);
					if( $post_id ): ?>
					<?php
					$imgID = get_sub_field('image');
					$imgSize = "full";
					$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
					?>
					<?php 
					if( !empty($imgID) ): ?>
					<a href="<?php echo get_the_permalink($post_id); ?>" style="background-image: url(<?php echo $imgArr[0]; ?> );background-repeat: no-repeat;background-position: center center; background-size:cover;" id="home-nav-top-right"><span class="link-label"><?php echo get_the_title($post_id); ?></span><div class="quad-link-mask"></div></a>
					<?php endif; ?>	
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
			
			<?php if( have_rows('bottom_left') ): 
				while( have_rows('bottom_left') ): the_row();
					$post_id = get_sub_field('page', false, false);
					if( $post_id ): ?>
					<?php
					$imgID = get_sub_field('image');
					$imgSize = "full";
					$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
					?>
					<?php 
					if( !empty($imgID) ): ?>
					<a href="<?php echo get_the_permalink($post_id); ?>" style="background-image: url(<?php echo $imgArr[0]; ?> );background-repeat: no-repeat;background-position: center center; background-size:cover;" id="home-nav-bottom-left"><span class="link-label"><?php echo get_the_title($post_id); ?></span><div class="quad-link-mask"></div></a>
					<?php endif; ?>	
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
			
			<?php if( have_rows('bottom_right') ): 
				while( have_rows('bottom_right') ): the_row();
					$post_id = get_sub_field('page', false, false);
					if( $post_id ): ?>
					<?php
					$imgID = get_sub_field('image');
					$imgSize = "full";
					$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
					?>
					<?php 
					if( !empty($imgID) ): ?>
					<a href="<?php echo get_the_permalink($post_id); ?>" style="background-image: url(<?php echo $imgArr[0]; ?> );background-repeat: no-repeat;background-position: center center; background-size:cover;" id="home-nav-bottom-right"><span class="link-label"><?php echo get_the_title($post_id); ?></span><div class="quad-link-mask"></div></a>
					<?php endif; ?>	
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
					
		</nav>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
