<?php
/**
 * The header for our theme
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="page">
	<header class="header page__header">
		<nav class="navbar navbar-expand-lg">
  			<div class="container">
			  	<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
    				<?php the_custom_logo(); ?>
				<?php else : ?>
					<a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
				<?php endif; ?>
    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      				<span class="navbar-toggler-icon"></span>
    			</button>
    			<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php
						wp_nav_menu( $args = array(
							'theme_location'	=> 'header-menu',
							'container'			=>  false,
							'menu_class'		=> 'navbar-nav justify-content-end flex-grow-1',
							'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
						) );
					?>
    			</div>
  			</div>
		</nav>
		<div class="header__content">
			<div class="container">
				<div class="row">
					<div class="col-6 content__text">
						<div class="text__box">
							<?php the_field('page_top_text'); ?>
							<div class="content__bar">
								<?php 
									$link = get_field('page_top_button_link');
									if( $link ) : 
    									$link_url = $link['url'];
    									$link_title = $link['title'];
    									$link_target = $link['target'] ? $link['target'] : '_self'; ?>
										<a class="button button--bar" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif;
								?>
								<?php
									$show_phone_number = get_field('show_phone_number');
									if( !empty(get_theme_mod('phone')) && $show_phone_number && in_array('yes', $show_phone_number) ) : ?>
										<a href="tel:<?php echo get_theme_mod('phone'); ?>" class="bar__phone"><?php echo get_theme_mod('phone'); ?></a>
									<?php endif;
								?>
							</div>
						</div>
					</div>
					<div class="col-6 content__image"><img src="<?php the_field('page_top_image'); ?>" alt="<?php $image_url = get_field('page_top_image'); $image_id = pippin_get_image_id($image_url); $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); echo $image_alt; ?>" class="content__image-image"></div>
				</div>
			</div>
		</div>
	</header>
