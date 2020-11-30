<?php
/**
 * Template Name: Contact
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
		
		<div class="wrap-950 wrap">	
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
			
		<div id="contact-form-wrap">
			<?php echo do_shortcode('[contact-form-7 id="289" title="Contact Page"]');?>
		</div>
		
		<div id="contact-social-wrap">
			<a class="contact-social-link" href="https://www.facebook.com/kaisermartingroup/" target="_blank"><i class="fab fa-facebook"></i></a>
			<a class="contact-social-link" href="https://www.instagram.com/kaisermartingroup/" target="_blank"><i class="fab fa-instagram"></i></a>
			<a class="contact-social-link" href="https://www.linkedin.com/company/the-kaiser-martin-group-inc/" target="_blank"><i class="fab fa-linkedin"></i></a>
		</div>
		
		<div id="address-wrap" class="wrap-950 wrap">
			<a href="tell:(610) 816-6995">(610) 816-6995</a>
			<div></div>
			<a href="https://www.google.com/maps/place/The+Kaiser-Martin+Group,+Inc./@40.404967,-75.928666,15z/data=!4m5!3m4!1s0x0:0x80dbd5cca25e92be!8m2!3d40.404967!4d-75.928666" target="_blank">4700 N 5th Street Hwy,<br> Temple, PA 19560</a>
		</div>
		
		<div id="map" style="height: 400px;"></div>
		
		<script>
			jQuery( document ).ready(function() {
/*
			    var map = L.map('map',{
			    center: [40.404967,-75.928666],
			    zoom: 14
			    });

			    L.tileLayer('https://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png', {
				    maxZoom: 18,
	attribution: 'Tiles courtesy of <a href="http://openstreetmap.se/" target="_blank">OpenStreetMap Sweden</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
			    }).addTo(map);
			    
// 			     var marker = L.marker([40.404967,-75.928666]).addTo(map);

    function add_marker() {
        var points = [
            ["P1", 40.404967,-75.928666, "https://www.google.com/maps/place/The+Kaiser-Martin+Group,+Inc./@40.404967,-75.928666,15z/data=!4m2!3m1!1s0x0:0x80dbd5cca25e92be?sa=X&ved=2ahUKEwj0_b-smdzdAhXBpFkKHcOfCggQ_BIwDnoECAoQCw"]
        ];
        var marker = [];
        var i;
        for (i = 0; i < points.length; i++) {
            marker[i] = new L.Marker([points[i][1], points[i][2]], {
                win_url: points[i][3]
            });
            marker[i].addTo(map);
            marker[i].on('click', onClick);
        };
    }

    function onClick(e) {
        console.log(this.options.win_url);
        window.open(this.options.win_url);
}
*/


        init_map();
        add_marker();
    });
    var map;

    function init_map() {
        map = L.map('map').setView([40.404967,-75.928666], 14);
        L.tileLayer('https://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png', {
            attribution: 'Tiles courtesy of <a href="http://openstreetmap.se/" target="_blank">OpenStreetMap Sweden</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            key: 'BC9A493B41014CAABB98F0471D759707'
        }).addTo(map);
    }

    function add_marker() {
        var points = [
            ["P3", 40.404967,-75.928666, "https://www.google.com/maps/place/The+Kaiser-Martin+Group,+Inc./@40.404967,-75.928666,15z/data=!4m5!3m4!1s0x0:0x80dbd5cca25e92be!8m2!3d40.404967!4d-75.928666"]
        ];
        var marker = [];
        var i;
        for (i = 0; i < points.length; i++) {
            marker[i] = new L.Marker([points[i][1], points[i][2]], {
                win_url: points[i][3]
            });
            marker[i].addTo(map);
            marker[i].on('click', onClick);
        };
    }

    function onClick(e) {
        console.log(this.options.win_url);
        window.open(this.options.win_url);
    }


		</script>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
