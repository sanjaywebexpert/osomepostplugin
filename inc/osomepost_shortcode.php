<?php 
function swe_osm_osome_shortcode($atts, $content = null){

	/* Enqueue Style and Scripts only when Shortcode will used*/
     wp_enqueue_style('swe_osm_post_slider_style');
	 wp_enqueue_style('swe_osm_post_owl_slider_style');
	 wp_enqueue_style('swe_osm_post_slider_default_style');
	 wp_enqueue_script('swe_osm_post_slider_js');
    ob_start();

	extract(shortcode_atts( array(  
			'category' => '-1',
			'auto_play' => 'true',
		), $atts));
		
	global $post;
	/* Slider Options*/
	$swe_options = get_option('swe_osm_slider_options');
	if($swe_options['slider_loop']){
		$swe_loop = $swe_options['slider_loop'];
	}else{
		$swe_loop = "true";
	}
	if($swe_options['slider_margin']){
		$swe_margin = $swe_options['slider_margin'];
	}else{
		$swe_margin = "10";
	}
	if($swe_options['slider_nav']){
		$swe_nav = $swe_options['slider_nav'];
	}else{
		$swe_nav = "true";
	}
	if($swe_options['slider_autoplay']){
		$swe_autoplay = $swe_options['slider_autoplay'];
	}else{
		$swe_autoplay = "true";
	}
	if($swe_options['slider_mobile_item_no']){
		$swe_mobile_item_no = $swe_options['slider_mobile_item_no'];
	}else{
		$swe_mobile_item_no = "1";
	}
	if($swe_options['slider_tablet_item_no']){
		$swe_tablet_item_no = $swe_options['slider_tablet_item_no'];
	}else{
		$swe_tablet_item_no = "3";
	}
	if($swe_options['slider_desktop_item_no']){
		$swe_desktop_item_no = $swe_options['slider_desktop_item_no'];
	}else{
		$swe_desktop_item_no = "3";
	}
	
	$randslid = rand(1,1000);
	// 	query posts
	$arg =	array( 'post_type' => 'post',
					'posts_per_page' => $number,
					'orderby' => $order_by,
					'order' => $order 
				);			
	if($category > -1) {
			$arg['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => $category ));
	}
	
	$swe_slider_loop = new WP_Query($arg);
	$result='';
	$result .='<script>
				jQuery(document).ready(function() {
				  jQuery("#owl_osome_slider_show-'.$randslid.'").owlCarousel({
					loop:'.$swe_loop.',
					margin:'.$swe_margin.',
					nav:'.$swe_nav.',
					autoplay:'.$swe_autoplay.',
					navText : ["",""],
					responsive:{
						0:{
							items:'.$swe_mobile_item_no.'
						},
						600:{
							items:'.$swe_tablet_item_no.'
						},
						1000:{
							items:'.$swe_desktop_item_no.'
						}
					}
				})
			});
		</script>';
		$result .='
		<style>
			#owl-demo .item img{
				display: block;
				width: 100%;
				height: auto;
			}
		</style>';
		$result .='
		<div id="owl_osome_slider_show-'.$randslid.'" class="owl-carousel owl-theme osome_slider">';
	if($swe_slider_loop->have_posts()){	
		while($swe_slider_loop->have_posts()):$swe_slider_loop->the_post(); 
			$catid = get_the_ID();
			$cats = get_the_category($catid);
			setup_postdata( $post );
			$excerpt = get_the_excerpt();
			$excerpt = substr($excerpt,0,200);

		
		$result .='<div class="item">';
			if ( has_post_thumbnail() ) {
					$result .= '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail( $post->ID, 'post-slider-thumb', array( 'class' => "img-responsive" ) );
			}
		if($swe_options['slider_post_title']=="true" || $swe_options['slider_post_excerpt']=="true"){	
			$result .='<div class="carausel_caption">';
				if($swe_options['slider_post_title']=="true"){
					$result .='<h3>'.get_the_title().'</h3>';
				}
				if($swe_options['slider_post_excerpt']=="true"){
					$result .='<div class="post_excerpt_carausel">'.$excerpt.'...</div>';
				}
			$result .='</div></a>';	
		}	
		$result .='</div>';
		endwhile;
		wp_reset_postdata();
		$result .='</div>';
		return $result; 
		}
		else{
			echo 'Nothing Found !!';	
		}
}
add_shortcode('osomepost_slider','swe_osm_osome_shortcode');