<?php get_header(); ?>
<div id="ttr_main" class="row py-5">

<div class="row">
    <div class="col-12 col-md-8">
        <div class="row">
		    <?php
		    $args = array(
			    'post_type' => 'post', // You can change this to a custom post type if needed.
			    'posts_per_page' => 10, // Adjust the number of posts to display.
		    );

		    $latest_posts = new WP_Query($args);

		    if ($latest_posts->have_posts()) :
			    while ($latest_posts->have_posts()) : $latest_posts->the_post();
				    ?>

                    <div class="col-md-6 mb-4">
                        <div class="card">
						    <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
								    <?php the_post_thumbnail('thumbnail', ['class' => 'card-img-top']); ?>
                                </a>
						    <?php endif; ?>

                            <div class="card-body">
                                <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                        </div>
                    </div>

			    <?php
			    endwhile;
			    wp_reset_postdata();
		    else :
			    echo 'No posts found.';
		    endif;
		    ?>
        </div>

    </div>
    <div class="col-12 col-md-4">
        <h4 class="ms-5 mb-4">Senaste inläggen</h4>
	    <?php get_sidebar( 'primary' ); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center mb-5">
        <h4 class="my-4">My hobby</h4>
	    <?php echo do_shortcode('[random_dog_pic]'); ?>
    </div>
</div>

<?php get_footer(); ?>
