<?php
/**
 * Kaiser Martin functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kaiser_Martin
 */

if ( ! function_exists( 'kaiser_martin_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kaiser_martin_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Kaiser Martin, use a find and replace
		 * to change 'kaiser-martin' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kaiser-martin', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'kaiser-martin' ),
			'header-social' => esc_html__( 'Header Socal', 'kaiser-martin' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'kaiser_martin_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'kaiser_martin_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kaiser_martin_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'kaiser_martin_content_width', 640 );
}
add_action( 'after_setup_theme', 'kaiser_martin_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kaiser_martin_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kaiser-martin' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kaiser-martin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kaiser_martin_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function kaiser_martin_scripts() {
	wp_enqueue_style( 'kaiser-martin-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kaiser-martin-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kaiser-martin-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script('jquery');
	
	wp_enqueue_script('greensock-tweenMax', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js', array(), '20151215', true);
	
	wp_enqueue_script('greensock-scrollTo', '//cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/ScrollToPlugin.min.js', array(), '20151215', true);
	
// 	wp_enqueue_script('greensock-easePack', '//cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/easing/EasePack.min.js', array(), '20151215', true);
		
	wp_enqueue_script('scroll-magic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js', array(), '20151215', true);
	
	wp_enqueue_script('scroll-magic-gsap', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js', array(), '20151215', true);
	
	wp_enqueue_script( 'kaiser-martin-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kaiser_martin_scripts' );

/**
 * Enqueue fonts.
 */
function wpb_add_google_fonts() {
wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700,800,900', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * CUSTOM
 */
 // Custom Image Sizes
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
add_image_size( 'related-thumb', 380, 285, true );
}
 
//  Change Posts Label
 function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Projects';
    $submenu['edit.php'][5][0] = 'Projects';
    $submenu['edit.php'][10][0] = 'Add Project';
    $submenu['edit.php'][16][0] = 'Project Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Projects';
    $labels->singular_name = 'Project';
    $labels->add_new = 'Add Project';
    $labels->add_new_item = 'Add Project';
    $labels->edit_item = 'Edit Project';
    $labels->new_item = 'Project';
    $labels->view_item = 'View Project';
    $labels->search_items = 'Search Projects';
    $labels->not_found = 'No Project found';
    $labels->not_found_in_trash = 'No Project found in Trash';
    $labels->all_items = 'All Projects';
    $labels->menu_name = 'Projects';
    $labels->name_admin_bar = 'Projects';
}

// Change the pin icon to a house
function ccd_menu_news_icon() {
  global $menu;
  foreach ( $menu as $key => $val ) {
    if ( __( 'Projects') == $val[0] ) {
      $menu[$key][6] = 'dashicons-admin-home';
    }
  }
}
add_action( 'admin_menu', 'ccd_menu_news_icon' );

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );
 

// Allow ACF Options
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// Add Category as Class to Body
add_filter('body_class','add_category_to_single');
  function add_category_to_single($classes) {
    if (is_single() ) {
      global $post;
      foreach((get_the_category($post->ID)) as $category) {
        // add category slug to the $classes array
        $classes[] = $category->category_nicename;
      }
    }
    // return the $classes array
    return $classes;
  }
  
  
  
// Disable Gutenberg

if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {
	
	// WP > 5 beta
	add_filter('use_block_editor_for_post_type', '__return_false', 10);
	
} else {
	
	// WP < 5 beta
	add_filter('gutenberg_can_edit_post_type', '__return_false', 10);
	
}