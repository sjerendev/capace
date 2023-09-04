<?php

function add_theme_styles() {

	wp_enqueue_style('default-style', get_stylesheet_directory_uri() .'/style.css');
	wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() .'/css/bootstrap.min.css');

}
add_action('wp_enqueue_scripts', 'add_theme_styles');

function my_plugin_assets() {

	wp_register_script('customjs', get_template_directory_uri(). '/js/custom.js', array('jquery'), null, true);
  wp_enqueue_script('customjs');

	wp_register_script('bootstrap-js', get_template_directory_uri(). '/js/bootstrap.min.js', array('jquery') , '3.0.0', true);
	wp_enqueue_script('bootstrap-js');

}

add_action( 'wp_enqueue_scripts', 'my_plugin_assets', 100 );
