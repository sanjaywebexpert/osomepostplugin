<?php
/*
* Plugin Name: SWE Osome Post Slider
* Plugin Url: http://sanjaywebexpert.com
* Description: This is Responisve Post Slider by Category or without category used by Shortcodes , any where in posts , pages , widgets and php file. 
* Author Name: Sanjay Sharma
* Version: 3.0.1
* Author Url: http://sanjaywebexpert.com
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Define Plugin Path and Directory Path */
define("SWE_OPS_PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
define("SWE_OPS_PLUGIN_URL",plugin_dir_url(__FILE__));

/* Craeting Admin Menu */
function swe_osm_add_slider_menu(){
	add_menu_page(
		"osome_post_slider",
		"Osome Post Slider",
		"manage_options",
		"osome-post-slider",
		"swe_osm_post_slider_func",
		"dashicons-format-gallery",
		100
	);
	add_submenu_page(
		'osome-post-slider',
		'Osome-setting',
		'Osome Setting',
		'manage_options',
		'osome_setting',
		'swe_osm_setting_function'
	);
}
add_action( 'admin_init', 'swe_osm_options_init' );
function swe_osm_options_init(){
	register_setting( 'swe_osm_options', 'swe_osm_slider_options', 'swe_osm_options_validate' );
}
add_action("admin_menu","swe_osm_add_slider_menu");
function swe_osm_post_slider_func(){	
	include_once SWE_OPS_PLUGIN_DIR_PATH.'/inc/osomepost_how_to_use.php';
}
function swe_osm_setting_function(){
	include_once SWE_OPS_PLUGIN_DIR_PATH.'/inc/osomepost_setting.php';
}
/*  Registered All the Scripts and Styles */
function swe_osm_post_slider_script(){
	wp_register_style("swe_osm_post_slider_style",plugins_url('/assets/css/osome-slider.css',__FILE__));
	wp_register_style("swe_osm_post_owl_slider_style",plugins_url('/assets/css/swe.owl.carousel.min.css',__FILE__));
	wp_register_style("swe_osm_post_slider_default_style",plugins_url('/assets/css/swe.owl.theme.default.min.css',__FILE__));
	wp_register_script("swe_osm_post_slider_js",plugins_url('/assets/js/swe.owl.carousel.js',__FILE__), array(), '1.0.0', true);
}
add_action('init','swe_osm_post_slider_script');


function swe_osm_load_admin_style_forslider() {
        wp_register_style( 'custom_slider_admin_css', plugins_url('/assets/css/admin-style.css',__FILE__) );
        wp_enqueue_style( 'custom_slider_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'swe_osm_load_admin_style_forslider' );

// Post thumbnails
if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}
add_image_size( 'post-slider-thumb', 600, 400, true );

/* Include Shortcode Function File  */
include_once SWE_OPS_PLUGIN_DIR_PATH.'/inc/osomepost_shortcode.php';