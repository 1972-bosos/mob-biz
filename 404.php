<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

	<main class="content page__content">
		<section class="error-404 not-found">
			<div class="page-content">
				<div class="container">
					<h2 class="error"><?php esc_html_e( 'That page can&rsquo;t be found.', 'mob-biz' ); ?></h2>
				</div>
			</div>
		</section>
	</main>

<?php get_footer();
