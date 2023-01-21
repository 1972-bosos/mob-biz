<!-- the query -->
<?php
    $args = array(
		'post_type' => 'service'
    );
	$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div class="service">
        <div class="container">
            <div class="row">
                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-3 service-box">
                        <?php if( get_field('service_icon') ): ?>
                            <img src="<?php the_field('service_icon'); ?>" alt="<?php $image_url = get_field('service_icon'); $image_id = pippin_get_image_id($image_url); $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); echo $image_alt; ?>">
                        <?php endif; ?>
                        <h3 class="service-name"><?php the_title(); ?></h3>
                        <?php if( get_field('service_text') ): ?>
                            <p class="service-text"><?php the_field('service_text'); ?></p>
                        <?php endif; ?>  
                    </div>
                <?php endwhile; ?>
                <!-- end of the loop -->
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>