<?php
/**
 * Template Name: Company Page
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
		<div id="who-we-are" class="wrap-1250 wrap">
			<h2><?php the_field('who_we_are_title');?></h2>
			<div class="copy-gray-left-wrap">
				<div><?php the_field('who_we_are_copy');?></div>
			</div>
			
			<div class="core-values-wrap">
				<?php 
				$image = get_field('core_values_gif');
				if( !empty( $image ) ): ?>
				    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
			</div>
			
		</div>
		
		<div id="our-team">
			<h2 class="centered wrap-1250 wrap"><?php the_field('our_team_title');?></h2>
			<div class="wrap-950 wrap">
				<div class="centered"><?php the_field('our_team_copy');?></div>
			</div>
		</div>
				
		<div id="team-cards-wrap">
			<div id="bio-copy-wrap-mask"></div>
			<div id="team-cards-inner" class="wrap-1250 wrap">
				<?php	
				$query_args = array(
				    'post_type' => 'team',
				    'posts_per_page' => -1,
				  );
					
				  $custom_query = new WP_Query( $query_args );
				  while($custom_query->have_posts()) : $custom_query->the_post(); ?>
						<?php $biocheck = get_field('bio');
						if( $biocheck ): ?>	
									  
				  		<div class="single-team-member with-bio image-300">
					  		
					  	<?php else:?>
					  	
				  		<div class="single-team-member no-bio image-300">
					  		
					  	<?php endif;?>
							<div class="staff-img-wrap">
								<?php 
								$image = get_field('image');
								$size = 'staff-img'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
									echo wp_get_attachment_image( $image, $size );
								}
								?>
<!--
								<img src="/wp-content/themes/kaiser-marti
			n/img/team-pic-mask-scale.png" alt="Kaiser-Martin Group" class="team-pic-mask"/>
-->
								<?php $biocheck = get_field('bio');
									if( $biocheck ): ?>
									<button type="button" class="bio-button"><i class="fas fa-info"></i></button>
								<?php endif;?>
							</div>
							<?php the_title( '<h3>', '</h3>' ); ?>
							<h4><?php the_field('position');?></h4>
							<div class="bio-copy-wrap">
								<div class="bio-click-close"></div>
								<div class="bio-copy-inner">
									<div class="bio-copy-wrap-img-wrap">
										<?php 
										$image = get_field('image');
										$size = 'staff-img';
										if( $image ) {
											echo wp_get_attachment_image( $image, $size );
										}
										?>

										<?php 
										$image = get_field('optional_card_image');
										$size = 'staff-add-img';
										if( $image ) {
											echo wp_get_attachment_image( $image, $size );
										}
										else { ?>
											<img src="/wp-content/themes/kaiser-marti
			n/img/staff-card-griffin.png" alt="Kaiser-Martin Group" class="team-card-add-grffin"/>
										<?php }
										?>										
									</div>
								</div>
							</div>
						</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); // reset the query ?>
			</div>
		</div>
		
		<div id="history" class="wrap-1250 wrap">
			<h2><?php the_field('our_history_title');?></h2>
			<div class="copy-gray-left-wrap">
				<div class="gray-copy-mask"></div>
				<div><?php the_field('our_history_copy');?></div>
			</div>
						
		</div>
		
		<div id="awards" class="wrap-1250 wrap">
			<h2><?php the_field('awards_title');?></h2>
			
			<?php if( have_rows('awards') ):?>
			<div class="awards-wrap">
				<?php while ( have_rows('awards') ) : the_row();?>	
			
				<?php if( have_rows('single_year') ):?>
					<?php while ( have_rows('single_year') ) : the_row();?>	
					
					<div class="single-year">
						<div class="year"><?php the_sub_field('year');?></div>
						
						<div class="projects-wrap">
							<?php if( have_rows('projects') ):?>
								<?php while ( have_rows('projects') ) : the_row();?>
								
								<?php if( have_rows('single_project') ):?>
									<?php while ( have_rows('single_project') ) : the_row();?>	
									
									<h3><?php the_sub_field('project_name');?></h3>
									
									<div class="titles-wrap">
										<?php the_sub_field('award_titles');?>
									</div>
								
									<?php endwhile;?>
								<?php endif;?>	
							
								<?php endwhile;?>
							<?php endif;?>
						</div>
						
					</div>
				
					<?php endwhile;?>
				<?php endif;?>
			
				<?php endwhile;?>
			</div>
			<?php endif;?>
			
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
