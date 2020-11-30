<?php
/**
 * Template Name: Portfolio
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
		<main id="main" class="site-main wrap-1250 wrap">

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
		
			<div id="portfolio-filter-wrap">
<!-- 				<p><input type="text" id="quicksearch" placeholder="Search" /></p> -->
				<p id="just-show">Show Me:</p>
				<div id="portfolio-filter-button-wrap" class="button-group">
					<button class="button is-checked active" data-filter="*" type="button">All</button>
					<button data-filter=".category-residential" type="button">Residential</button>
					<button data-filter=".category-commercial-industrial" type="button">Commercial & Industrial</button>
					<button data-filter=".category-institutional-ecclesiastical" type="button">Institutional & Ecclesiastical</button>
					<button data-filter=".category-equestrian" type="button">Equestrian</button>
				</div>

<!--
							<div class="alm-filter-nav">
								<button type="button"><span data-repeater="default" data-posts-per-page="5" data-scroll="false" data-post-type="post" data-category="">All</span></button>
								<?php
							  $categories = get_categories(array(
							    'show_option_all'    => '',
							    'orderby'            => 'name',
							    'order'              => 'ASC',
							    'style'              => 'list',
							    'show_count'         => 0,
							    'hide_empty'         => 1,
							    'use_desc_for_title' => 1,
							    'child_of'           => 0,
							    'feed'               => '',
							    'feed_type'          => '',
							    'feed_image'         => '',
							    'exclude'            => '',
							    'exclude_tree'       => '',
							    'include'            => '4,5,6,7',
							    'hierarchical'       => true,
							    'title_li'           => __( 'Categories' ),
							    'show_option_none'   => __('No categories'),
							    'number'             => NULL,
							    'echo'               => 1,
							    'depth'              => 0,
							    'current_category'   => 0,
							    'pad_counts'         => 0,
							    'taxonomy'           => 'category',
							    'walker'             => 'Walker_Category' 
							      ));
							  foreach ( $categories as $category ) :?>
							  	
							   <?php echo '<button type="button"><span data-repeater="default" data-posts-per-page="5" data-scroll="false" data-category="' . $category->slug . '">' . $category->name . '</span></button>';
							
							  endforeach;?>
							</div>
-->
			</div>

			<div class="archive-wrap grid">

				
				
				
<!-- 				<?php echo do_shortcode('[ajax_load_more id="6004003081" container_type="div" css_classes="portfolio-previews" post_type="post" posts_per_page="4" scroll_container="portfolio-previews-wrap" images_loaded="true" button_label="Load More Projects" button_loading_label="Loading More Projects"]');?> -->
				
				
				
				
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
				<?php	
				$query_args = array(
				    'post_type' => 'post',
				    'posts_per_page' => -1,
				  );
					
				  $custom_query = new WP_Query( $query_args );
				  while($custom_query->have_posts()) : $custom_query->the_post(); ?>
						
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
							<div class="project-archive-griffin"></div>
						</a>
					</article>
						
				<?php endwhile; ?>
				<?php wp_reset_postdata(); // reset the query ?>
			</div>





		</main><!-- #main -->
	</div><!-- #primary -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.5/isotope.pkgd.min.js"></script>

	<script>
	jQuery( document ).ready(function($) {
		
		// quick search regex
		var qsRegex;
		var buttonFilter;
		
		// init Isotope
		var $grid = $('.grid').isotope({
			itemSelector: '.archive-wrap article',
			layoutMode: 'fitRows',
			transitionDuration: '0.7s',
				// only opacity for reveal/hide transition
				hiddenStyle: {
				opacity: 0
				},
				visibleStyle: {
				opacity: 1
				},
			percentPosition: true,
			fitRows: {
			gutter: 0
			},
			filter: function() {
				var $this = $(this);
				var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
				var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
				return searchResult && buttonResult;
			}
		});
		
		$('#portfolio-filter-button-wrap').on( 'click', 'button', function() {
			buttonFilter = $( this ).attr('data-filter');
			$grid.isotope();
		});
		
		// use value of search field to filter
/*
		var $quicksearch = $('#quicksearch').keyup( debounce( function() {
			qsRegex = new RegExp( $quicksearch.val(), 'gi' );
			$grid.isotope();
		}) );
*/
		
		// change is-checked class on buttons
		$('.button-group').each( function( i, buttonGroup ) {
			var $buttonGroup = $( buttonGroup );
			$buttonGroup.on( 'click', 'button', function() {
			$buttonGroup.find('.is-checked').removeClass('is-checked');
			$( this ).addClass('is-checked');
			});
		});
		
		
		// debounce so filtering doesn't happen every millisecond
/*
		function debounce( fn, threshold ) {
			var timeout;
			threshold = threshold || 100;
			return function debounced() {
			clearTimeout( timeout );
			var args = arguments;
			var _this = this;
			function delayed() {
			fn.apply( _this, args );
			}
			timeout = setTimeout( delayed, threshold );
			};
		}	
*/
		
  //****************************
  // Isotope Load more button
  //****************************
  var initShow = 3; //number of items loaded on init & onclick load more button
  var counter = initShow; //counter for load more button
  var iso = $grid.data('isotope'); // get Isotope instance

  loadMore(initShow); //execute function onload

  function loadMore(toShow) {
    $grid.find(".hidden").removeClass("hidden");

    var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
      return item.element;
    });
    $(hiddenElems).addClass('hidden');
    $grid.isotope('layout');

    //when no more to load, hide show more button
    if (hiddenElems.length == 0) {
      jQuery("#load-more").hide();
    } else {
      jQuery("#load-more").show();
    };

  }

  //append load more button
  $grid.after('<button id="load-more"> Load More</button>');

  //when load more button clicked
  $("#load-more").click(function() {
    if ($('#portfolio-filter-button-wrap').data('clicked')) {
      //when filter button clicked, set initial value for counter
      counter = initShow;
      $('#portfolio-filter-button-wrap').data('clicked', false);
    } else {
      counter = counter;
    };

    counter = counter + initShow;

    loadMore(counter);
  });

  //when filter button clicked
  $("#portfolio-filter-button-wrap").click(function() {
    $(this).data('clicked', true);

    loadMore(initShow);
  });
		
		$('.grid').css('opacity', '1');
		
	});
	</script>
<!--
<script>
jQuery( document ).ready(function($) {	
	var alm_is_animating = false; // Animating flag
	$('.alm-filter-nav button').eq(0).addClass('active'); // Set initial active state
	
	// Btn Click Event
	$('.alm-filter-nav button span').on('click', function(e){    
	  e.preventDefault();  
	  var el = $(this); // Our selected element     
	  
	  if(!el.hasClass('active') && !alm_is_animating){ // Check for active and !alm_is_animating  
	     alm_is_animating = true;   
	     el.parent().addClass('active').siblings('li').removeClass('active'); // Add active state
	     
	     var data = el.data(), // Get data values from selected menu item
	         transition = 'fade', // 'slide' | 'fade' | null
	         speed = '300'; //in milliseconds
	         
	     $.fn.almFilter(transition, speed, data); // Run the filter     
	  }      
	});
	
	$.fn.almFilterComplete = function(){      
	  alm_is_animating = false; // clear animating flag
	};
});	
</script>
-->
<?php
// get_sidebar();
get_footer();
