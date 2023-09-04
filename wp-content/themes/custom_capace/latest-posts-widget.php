<?php

class Latest_Posts_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'latest_posts_widget',
			__('Latest Posts', 'custom-theme'),
			array(
				'description' => __('Display the X latest posts.', 'custom-theme'),
			)
		);
	}

	public function widget($args, $instance) {
		$title = apply_filters('widget_title', $instance['title']);
		$number_of_posts = isset($instance['number_of_posts']) ? $instance['number_of_posts'] : 5;

		echo $args['before_widget'];

		if (!empty($title)) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$latest_posts = new WP_Query(array(
			'posts_per_page' => $number_of_posts,
		));

		if ($latest_posts->have_posts()) {
			echo '<ul>';
			while ($latest_posts->have_posts()) {
				$latest_posts->the_post();
				echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
			}
			echo '</ul>';
		}

		wp_reset_postdata();

		echo $args['after_widget'];
	}

	public function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number_of_posts = isset($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 5;
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'custom-theme'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number_of_posts'); ?>"><?php _e('Number of Posts:', 'custom-theme'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="number" min="1" value="<?php echo $number_of_posts; ?>">
		</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['number_of_posts'] = (int)$new_instance['number_of_posts'];

		return $instance;
	}
}

function register_latest_posts_widget() {
	register_widget('Latest_Posts_Widget');
}

add_action('widgets_init', 'register_latest_posts_widget');
