<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

	<main class="content">
		<div class="container">
			<h3 class="blog-title"><?php the_title(); ?></h3>
			<?php if( get_field('blog_picture') ): ?>
				<div class="blog-picture" style="background-image: url(<?php the_field('blog_picture'); ?>)"></div>
            <?php endif; ?>
			<div class="post-date">
				<p><?php echo get_the_date(); ?></p>
			</div>
			<?php if( get_field('blog_text') ): ?>
                <?php the_field('blog_text'); ?>
            <?php endif; ?>
			<div class="post-author">
				<p><?php the_author_meta('display_name', 1); ?></p>
			</div>
		</div>
	</main>

<?php get_footer();
