<?php
/**
 * The template for displaying the footer
 */
?>

	<footer class="footer page__footer">
		<div class="container">
			<div class="footer__top">
				<diw class="row">
					<div class="col-6 logo">
						<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
    						<?php the_custom_logo(); ?>
						<?php else : ?>
							<a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
						<?php endif; ?>
						<?php if( !empty(get_theme_mod('footer_top_text')) ) : ?>
							<p class="footer-text"><?php echo get_theme_mod('footer_top_text'); ?></p>
						<?php endif; ?>
					</div>
					<div class="col-6 footer-nav">
						<?php
							wp_nav_menu( $args = array(
								'theme_location'	=> 'footer-menu',
								'container'			=>  false,
								'menu_class'		=> 'nav',
								'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
							) );
						?>
					</div>
				</diw>
			</div>
			<div class="footer__bottom">
				<div class="row">
					<div class="col-6 copyright">
					<span>&copy;&nbsp;<?php bloginfo('name'); ?>&nbsp;<?php echo date("Y"); ?></span>
					<?php if ( !is_privacy_policy() ) : ?>
						<a href="<?php echo esc_attr( esc_url( get_privacy_policy_url() ) ); ?>"><?php esc_html_e( 'Polityka prywatności', 'text-domain' ) ?></a>
					<?php endif; ?>
					</div>
					<?php if( !empty(get_theme_mod('page_author_text')) ) : ?>
						<div class="col-6 site-author">
							<p><?php echo get_theme_mod('page_author_text'); ?></p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>	
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
