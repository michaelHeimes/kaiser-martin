<?php
/**
 * Template Name: Services
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
			<?php
			while ( have_posts() ) :
				the_post();
	
				get_template_part( 'template-parts/content', 'page' );
	
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
	
			endwhile; // End of the loop.
			?>
		</div>
		
		<?php if (get_field('add_a_testimonial')):?>		
			<?php if( have_rows('project_testimonial') ):?>
				<?php while ( have_rows('project_testimonial') ) : the_row();?>
				
					<?php if(get_sub_field('background_image')):?>
						<?php
							$imgID = get_sub_field('background_image');
							$imgSize = "banner-img"; // (thumbnail, medium, large, full or custom size)
							$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
							// url = $image[0];
							// width = $image[1];
							// height = $image[2];
						?>
					<div id="testimonial-wrap"style="background-image: url(<?php echo $imgArr[0]; ?> );">
					<div id="testimonial-wrap-mask"></div>
						<div id="proj-test-top-quote" class="proj-test-quote proj-quote-element"><i class="fas fa-quote-left"></i></div>
						<div id="proj-quote-copy-wrap" class="proj-quote-element">
							<?php the_sub_field('quote');?>
							<div id="proj-quote-author-wrap">
								<p id="quote-author">- <?php the_sub_field('author');?> -</p>
								<p id="authors_position"><?php the_sub_field('authors_position');?></p>
								<?php if(get_sub_field('authors_company_name')):?>
									<p id="authors_company_name"><?php the_sub_field('authors_company_name');?></p>	
								<?php endif;?>	
							</div>
						</div>
						<div id="proj-test-bottom-quote" class="proj-test-quote proj-quote-element"><i class="fas fa-quote-right"></i></div>
						
						<?php if(get_sub_field('project_link')):?>
							<div id="service-test-project-link-wrap">
								<a id="service-test-project-link" href="<?php the_sub_field('project_link'); ?>">View Project</a>
							</div>
						<?php endif;?>
						
					</div>				
					<?php else:?>
				
				<div id="testimonial-wrap">
					<div id="proj-test-top-quote" class="proj-test-quote"><i class="fas fa-quote-left"></i></div>
					
					<div id="testimonial-wrap">
						<div id="proj-test-top-quote" class="proj-test-quote"><i class="fas fa-quote-left"></i></div>
							<div id="proj-quote-author-wrap">
								<p id="quote-author">- <?php the_sub_field('author');?> -</p>
								<p id="authors_position"><?php the_sub_field('authors_position');?></p>
								<?php if(get_sub_field('authors_company_name')):?>
									<p id="authors_company_name"><?php the_sub_field('authors_company_name');?></p>	
								<?php endif;?>	
							</div>
						<div id="proj-test-bottom-quote" class="proj-test-quote"><i class="fas fa-quote-right"></i></div>
					
					<?php if(get_sub_field('project_link')):?>
						<div id="service-test-project-link-wrap">
							<a id="service-test-project-link" href="<?php the_sub_field('project_link'); ?>">View Project</a>
						</div>
					<?php endif;?>
					
				</div>
				<?php endif;?>
				<?php endwhile;?>
			<?php endif; ?>						
		<?php endif; ?>
			
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
