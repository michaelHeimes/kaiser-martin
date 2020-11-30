<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kaiser_Martin
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );?>
			
			<div id="post-nav-wrap" class="wrap-1250 wrap">

			<?php the_post_navigation(array(
				'prev_text'                  => __( 'previous project:<br><span class="post-nav-title">%title</span>' ),
	            'next_text'                  => __( 'next project:<br><span class="post-nav-title">%title</span>' ),
	            'in_same_term'               => true,
	            'screen_reader_text' => __( 'Continue Reading' ),
	        )
			);?>
			
			</div>

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
