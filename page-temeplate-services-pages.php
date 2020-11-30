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
			
		<?php if( have_rows('featured_projects') ):?>
			<div id="featured-title-wrap">
				<h2><?php the_field('featured_projects_title');?></h2>	
			</div>
			<section id="features-wrap">
				<div class="wrap-1250 wrap">
					<?php while ( have_rows('featured_projects') ) : the_row();?>
						<?php 
						$post_id = get_sub_field('single_featured_project', false, false);
						if( $post_id ): ?>
						
						<article class="project-archive-preview">
							<a href="<?php echo get_the_permalink($post_id); ?>">
	
								<div class="project-archive-preview-img-wrap project-archive-preview-img-wrap-mobile project-archive-preview-half">
									<?php 
									$image = get_field('banner_image', $post_id);
									$size = 'large';
									if( $image ) {
										echo wp_get_attachment_image( $image, $size );
									}
									?>
								</div>
		
								<?php
									$imgID = get_field('banner_image', $post_id);
									$imgSize = "large"; // (thumbnail, medium, large, full or custom size)
									$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
									// url = $image[0];
									// width = $image[1];
									// height = $image[2];
								?>
			 						
								<div class="project-archive-preview-img-wrap project-archive-preview-img-wrap-desktop project-archive-preview-half" style="background-image: url(<?php echo $imgArr[0]; ?> );"></div>
		
								<div class="project-archive-preview-text-wrap project-archive-preview-half">
									<h2><?php echo get_the_title($post_id); ?></h2>
									<?php the_field('project_intro', $post_id);?>
									<span>learn more</span>
								</div>
								<div class="project-archive-griffin"></div>
							</a>
						</article>
	
						<?php endif; ?>				
				    <?php endwhile;?>
				</div>
				<div class="wrap-1250 wrap">
					<a id="visit-portolio-button" href="<?php echo esc_url( home_url( '/' ) ); ?>portfolio">Visit Full Portfolio</a>
				</div>
			</section>
			
		<?php endif; ?>			
			
			
			
			

			
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
