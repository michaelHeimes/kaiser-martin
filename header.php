<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kaiser_Martin
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if(is_singular('team')):?>
	<meta name="robots" content="noindex">
	<?php endif;?>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
	
	<script>
		FontAwesomeConfig = {
		  searchPseudoElements: true
		}
	</script>
	
	<?php if(is_page_template('page-template-contact-page.php')):?>	
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
	   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
	   crossorigin=""/>
	    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
	   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
	   crossorigin=""></script>
   <?php endif;?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kaiser-martin' ); ?></a>


		<?php
			$imgID = get_field('banner_image');
			$imgSize = "banner-img"; // (thumbnail, medium, large, full or custom size)
			$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
			// url = $image[0];
			// width = $image[1];
			// height = $image[2];
		?>
		<?php 
		if( !empty($imgID) ): ?>	
	<header id="masthead" class="site-header" style="background-image: url(<?php echo $imgArr[0]; ?> );">
		<?php else:?>
	<header id="masthead" class="site-header">		
		<?php endif; ?>	
		<?php if(!is_front_page()):?>
		<div id="banner-mask"></div>
		<?php endif;?>
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$kaiser_martin_description = get_bloginfo( 'description', 'display' );
			if ( $kaiser_martin_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $kaiser_martin_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation wrap wrap-1250">
			<a class="custom-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			
			<?php if( get_field('logo_color') == 'white' ):?>
			
				<?php 
				$image = get_field('header_logo_white', 'option');
				if( !empty( $image ) ): ?>
				    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
	
			<?php else:?>
			
				<?php 
				$image = get_field('header_logo_black', 'option');
				if( !empty( $image ) ): ?>
				    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
	
			<?php endif;?>
			
			</a>
			
<!-- 			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaiser-martin' ); ?></button> -->
			<div id="header-menus-wrap">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'header-social',
					'menu_id'        => 'header_social',
				) );
				?>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</div>
			<button id="mmenu-button"><a href="#mmenu">
				<div class="hamburger-menu"></div>	  
			</a></button>
		</nav><!-- #site-navigation -->

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
	</header><!-- #masthead -->

	<div id="content" class="site-content">


