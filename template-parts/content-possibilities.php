<!-- the query -->
<?php
    $args = array(
		'post_type'      => 'possibilities',
        'posts_per_page' => 1
    );
	$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div class="possibilities">
        <div class="container">
            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="row align-items-center">
                    <div class="col-md-6 order-md-first order-last possibilities__image">
                        <img src="<?php the_field('possibilities_picture'); ?>" alt="<?php $image_url = get_field('possibilities_picture'); $image_id = pippin_get_image_id($image_url); $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); echo $image_alt; ?>">
                    </div>
                    <div class="col-md-6 possibilities__text">
                        <?php the_field('possibilities_text'); ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <!-- end of the loop -->
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>