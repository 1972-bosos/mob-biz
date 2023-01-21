<?php
/**
 * The template for displaying the footer
 */
?>

	<footer class="footer">
		<div class="container">
			<div class="footer__top">
				<diw class="row">
					<div class="col-md-6 logo">
						<div class="logo--main-logo">
							<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
    							<?php the_custom_logo(); ?>
							<?php else : ?>
								<a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
							<?php endif; ?>
						</div>
						<div class="logo--second-logo">
							<?php $second_logo_url = get_theme_mod( 'second_logo' ); ?>
							<?php if ( $second_logo_url ) : ?>
								<a href="<?php echo get_home_url(); ?>" class="second-logo-link"><?php echo '<img src="' . $second_logo_url . '" alt = "Logo" class="second-logo">'; ?></a>
							<?php else : ?>
								<a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
							<?php endif; ?>
						</div>
						<?php if( !empty(get_theme_mod('footer_top_text')) ) : ?>
							<p class="footer-text"><?php echo get_theme_mod('footer_top_text'); ?></p>
						<?php endif; ?>
					</div>
					<div class="col-md-6 footer-nav">
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
					<div class="col-lg-6 col-md-4 copyright">
					<span>&copy;&nbsp;<?php bloginfo('name'); ?>&nbsp;<?php echo date("Y"); ?></span>
					<?php if ( !is_privacy_policy() ) : ?>
						<a href="<?php echo esc_attr( esc_url( get_privacy_policy_url() ) ); ?>"><?php esc_html_e( 'Polityka prywatności', 'text-domain' ) ?></a>
					<?php endif; ?>
					</div>
					<?php if( !empty(get_theme_mod('page_author_text')) ) : ?>
						<div class="col-lg-6 col-md-8 site-author">
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
