<!-- the query -->
<?php
    $args = array(
		'post_type'      => 'blog-grid',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'ASC',
    );
	$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div class="blog-grid">
        <div class="container">
            <div class="row">
                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-lg-4 col-sm-6 blog-box blok-box blog-box--home">
                        <?php if( get_field('blog_picture') ): ?>
                            <img src="<?php the_field('blog_picture'); ?>" alt="<?php $image_url = get_field('blog_picture'); $image_id = pippin_get_image_id($image_url); $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); echo $image_alt; ?>">
                        <?php endif; ?>
                        <h3 class="article-title"><?php the_title(); ?></h3>
                        <div class="date-read-more">
                            <p class="date"><?php echo get_the_date(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Czytaj<span class="arrow"></span></a>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- end of the loop -->
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>