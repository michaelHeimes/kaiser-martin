<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kaiser_Martin
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		
<!--
			<?php if(!is_front_page()):?>
				<div class="entry-title-wrap">
					<span id="left-line"></span>
					<span id="title-tl"></span>
						<img src="/wp-content/themes/kaiser-marti
					n/img/Kaiser-Martin-griffin.png" alt="Kaiser Martin Group" id="title-griffin" width="100px"/>
					<span id="title-tr-wrap"><span id="title-tr"></span></span>
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
					<span id="title-bl-wrap"><span id="title-bl"></span></span>
					<div id="down-arrow-wrap">
						<span id="da-l" class="km-red-bg"></span>
						<span id="da-r" class="km-red-bg"></span>
					</div>
					<span id="title-br"></span>
					<span id="right-line"></span>
				</div>
			<?php endif;?>
		</div>
-->
	</header><!-- .entry-header -->

	<?php kaiser_martin_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kaiser-martin' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'kaiser-martin' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
