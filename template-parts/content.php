<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kaiser_Martin
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div id="project-intro" class="wrap-1250 wrap">
			<div class="intro-pipe"></div>
			<?php the_field('project_intro');?>
			<div class="intro-pipe"></div>
		</div>

		<div id="project-details">
			<h2><span><?php the_field('details_label');?></span><span id="detail-lable-colon">:</span></h2>
			<?php
			if( have_rows('details') ):?>
			<ul>
				<?php while ( have_rows('details') ) : the_row();?>
					<?php if( get_sub_field('location') ): ?>
			    		<li><span class="detail-label">Location:</span> <?php the_sub_field('location');?></li>
					<?php endif;?>
					<?php if( get_sub_field('client') ): ?>
			    		<li><span class="detail-label">Client:</span> <?php the_sub_field('client');?></li>
					<?php endif;?>
					<?php if( get_sub_field('architect') ): ?>
			    		<li><span class="detail-label">Architect:</span> <?php the_sub_field('architect');?></li>
					<?php endif;?>
					<?php if( get_sub_field('lsquare_footage') ): ?>
			    		<li><span class="detail-label">Square Footage:</span> <?php the_sub_field('square_footage');?></li>
					<?php endif;?>
					<?php if( get_sub_field('duration') ): ?>
			    		<li><span class="detail-label">Duration:</span> <?php the_sub_field('duration');?></li>
					<?php endif;?>
					<?php if( get_sub_field('completion_date') ): ?>
			    		<li><span class="detail-label">Completion Date:</span> <?php the_sub_field('completion_date');?></li>
					<?php endif;?>																		

			    <?php endwhile;?>
			</ul>
			<?php endif; ?>				
		</div>

	</header><!-- .entry-header -->

	<?php kaiser_martin_post_thumbnail(); ?>

	<div class="entry-content">
		
		<?php if (get_field('will_this_project_have_additional_copy')):?>		
			<div id="additional_copy" class="wrap-950 wrap"><?php the_field('additional_copy');?></div>
		<?php endif; ?>		
		
		<?php if (get_field('will_this_project_have_additional_copy') && !get_field('will_this_project_have_featured_elements') ):?>
			<div class="gray-pipe wrap-1250 wrap"></div>
		<?php endif;?>

		<?php if (get_field('will_this_project_have_featured_elements')):?>		
			<?php if( have_rows('featured_elements') ):?>
				<div id="featured-title-wrap">
					<h2><?php the_field('featured_elements_title');?></h2>
				</div>
				<div id="features-wrap">
					<div id="features-cards-wrap" class="wrap">
						<?php while ( have_rows('featured_elements') ) : the_row();?>
							<div id="single_featured_element">
								<?php if( have_rows('single_featured_element') ):?>
										<?php while ( have_rows('single_featured_element') ) : the_row();?>	
										<div class="featured-element-copy-wrap">
											<h3><?php the_sub_field('title');?></h3>
											<?php the_sub_field('copy');?>
										</div>
										<div class="featured-element-gallery-wrap">
											<?php 
											$projectElementShortcode = get_sub_field( 'gallery_shortcode' ); 
											echo do_shortcode($projectElementShortcode);
											?>
										</div>
									    <?php endwhile;?>
								<?php endif; ?>	
							</div>
						<?php endwhile;?>
					</div>
				</div>
			<?php endif; ?>						
		<?php endif; ?>	
		
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
					</div>				
					<?php else:?>
				
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
					</div>
				<?php endif;?>
				<?php endwhile;?>
			<?php endif; ?>						
		<?php endif; ?>									
							
		
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kaiser-martin' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kaiser-martin' ),
			'after'  => '</div>',
		) );
		?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer wrap wrap-1250">
		<?php if( have_rows('similar_projects') ):?>
			<h2 id="similar-projects-title"><?php the_field('similar_projects_title');?></h2>	
			<div id="similar_projects">
				<?php while ( have_rows('similar_projects') ) : the_row();?>
					<?php 
					$post_id = get_sub_field('single_similar_project', false, false);
					if( $post_id ): ?>
					<a href="<?php echo get_the_permalink($post_id); ?>">
						
						<div class="related-thumb-wrap">
							<?php 

							$image = get_field('banner_image', $post_id);
							$size = 'related-thumb'; // (thumbnail, medium, large, full or custom size)
							
							if( $image ) {
							
								echo wp_get_attachment_image( $image, $size );
							
							}
							
							?>
							<div class="related-thumb-mask"><span>Learn More</span></div>
						</div>
						
						<h3><?php echo get_the_title($post_id); ?></h3>
						
						<?php echo the_field('project_intro', $post_id);?>
					</a>
					<?php endif; ?>				
			    <?php endwhile;?>
			</div>
		<?php endif; ?>					
		
		
		
		
<!-- 		<?php kaiser_martin_entry_footer(); ?> -->
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
