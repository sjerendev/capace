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

add_action('widgets_init', 'custom_theme_widgets_init');

// registrera widget område i temat
function custom_theme_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__('Sidebar Widget Area', 'custom-theme'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here to appear in the sidebar.', 'custom-theme'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}

// Skapa en widget för senaste inlägg

class Latest_Posts_Widget extends WP_Widget {
	// Constructor för widget
	public function __construct() {
		parent::__construct(
			'latest_posts_widget',
			__('Senaste inlägg Widget', 'text_domain'),
			array('description' => __('Visa senaste inläggen sorterat på publiceringsdatum', 'text_domain'))
		);
	}

	// Widget frontend visning
	public function widget($args, $instance) {
		echo $args['before_widget'];

		$post_count = isset($instance['post_count']) ? intval($instance['post_count']) : 5;
		$latest_posts = new WP_Query(array(
			'post_type' => 'post',
			'posts_per_page' => $post_count,
			'orderby' => 'date',
			'order' => 'DESC',
		));

		if ($latest_posts->have_posts()) {
			echo '<ul>';
			while ($latest_posts->have_posts()) {
				$latest_posts->the_post();
				echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
			}
			echo '</ul>';
		}

		echo $args['after_widget'];
	}


	// Widget backend formulär
	public function form($instance) {
		$post_count = isset($instance['post_count']) ? esc_attr($instance['post_count']) : 5;

		echo '<p>';
		echo '<label for="' . $this->get_field_id('post_count') . '">' . __('Antal inlägg:') . '</label>';
		echo '<input class="widefat" type="number" id="' . $this->get_field_id('post_count') . '" name="' . $this->get_field_name('post_count') . '" value="' . $post_count . '" />';
		echo '</p>';
	}


	// Update widget settings
	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['post_count'] = intval($new_instance['post_count']);
		return $instance;
	}

}

// Register the widget
function register_latest_posts_widget() {
	register_widget('Latest_Posts_Widget');
}
add_action('widgets_init', 'register_latest_posts_widget');

