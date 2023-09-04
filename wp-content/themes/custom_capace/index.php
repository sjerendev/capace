<?php get_header(); ?>
<div id="ttr_main" class="row py-5">

<div class="row">
    <div class="col-12 col-md-8">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <h1><?php the_title(); ?></h1>
                <h4>Posted on <?php the_time( 'F jS, Y' ) ?></h4>
                <p><?php the_content( __( '(more...)' ) ); ?></p>
            </div>
        <?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>
    <div class="col-12 col-md-4">
	    <?php get_sidebar( 'primary' ); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center mb-5">
        <h4>My hobby</h4>
	    <?php echo do_shortcode('[random_dog_pic]'); ?>
    </div>
</div>

<?php get_footer(); ?>
