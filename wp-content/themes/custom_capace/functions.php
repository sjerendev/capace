<?php

function add_theme_scripts() {

	wp_enqueue_style('default-style', get_stylesheet_directory_uri() .'/style.css');
	wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() .'/css/bootstrap.min.css');

	// Dequeue WordPress included jQuery
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.0.0', true);


	wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);

}
add_action('wp_enqueue_scripts', 'add_theme_scripts');
