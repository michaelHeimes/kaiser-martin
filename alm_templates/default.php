<article <?php post_class('project-archive-preview'); ?>>
	<a href="<?php echo get_permalink();?>">

		<div class="project-archive-preview-img-wrap project-archive-preview-img-wrap-mobile project-archive-preview-half">
			<?php 
			$image = get_field('banner_image');
			$size = 'large';
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}
			?>
		</div>

		<?php
			$imgID = get_field('banner_image');
			$imgSize = "large"; // (thumbnail, medium, large, full or custom size)
			$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
			// url = $image[0];
			// width = $image[1];
			// height = $image[2];
		?>
				
		<div class="project-archive-preview-img-wrap project-archive-preview-img-wrap-desktop project-archive-preview-half" style="background-image: url(<?php echo $imgArr[0]; ?> );"></div>

		<div class="project-archive-preview-text-wrap project-archive-preview-half">
			<?php the_title( '<h2>', '</h2>' ); ?>
			<?php the_field('project_intro');?>
			<span>learn more</span>
		</div>
	</a>
</article>