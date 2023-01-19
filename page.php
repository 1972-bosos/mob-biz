<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

	<main class="content page__content">
		<div class="container">
			<?php the_content( ); ?>
		</div>
	</main>

<?php get_footer();
