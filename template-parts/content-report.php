<!-- the query -->
<?php
    $args = array(
		'post_type' => 'report'
    );
	$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div class="report">
        <div class="container">
            <div class="row">
                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-lg-4 col-sm-6 px-5 data">
                        <span class="value" data-count="<?php the_field('report_value_integer'); ?>">0</span>
                        <?php if( get_field('report_value_separator') ): ?>
                            <?php if( get_field('report_value_separator') == 'comma' ): ?>
                                <span class="value value--separator">,</span>
                            <?php endif; ?>
                            <?php if( get_field('report_value_separator') == 'dot' ): ?>
                                <span class="value value--separator">.</span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if( get_field('report_value_decimal') ): ?>
                            <span class="value value--decimal" data-count="<?php the_field('report_value_decimal'); ?>">0</span>
                        <?php endif; ?>
                        <?php if( get_field('report_value_unit') ): ?>
                            <span class="value value--unit"><?php the_field('report_value_unit'); ?></span>
                        <?php endif; ?>
                        <p class="description"><?php the_field('report_text'); ?></p>
                    </div>
                <?php endwhile; ?>
                <!-- end of the loop -->
            </div>
            <div class="separate-line separate-line--report"></div>
            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="content__additional-button">
                    <?php 
					    $button = get_field('report_additional_button');
					    if( $button ) : 
    					    $button_url = $button['url'];
    					    $button_title = $button['title'];
    					    $button_target = $button['target'] ? $button['target'] : '_self'; ?>
						    <a class="button button--report" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
					    <?php endif;
				    ?>
                </div>
                <?php break; ?>
            <?php endwhile; ?>
            <!-- end of the loop -->
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>