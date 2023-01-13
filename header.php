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
	</header>
