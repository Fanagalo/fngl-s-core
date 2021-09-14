<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Fanagalo_underscores_core
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php include_once("inc/analyticstracking.php") ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'fngl_s-core' ); ?></a>

	<div class="header-full-bg"></div>
	<header id="masthead" class="header-area">

		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$fngl_s_core_description = get_bloginfo( 'description', 'display' );
			if ( $fngl_s_core_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $fngl_s_core_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- .header-area -->

	<div class="nav-full-bg"></div>
	<div class="nav-area">
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Main Menu', 'fngl_s-core' ); ?>">
			<?php wp_nav_menu( 
				array( 
					'theme_location' => 'primary',
					'container'      => '',
					'items_wrap' 	 => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
					) 
				)
			; ?>
		</nav>
	</div><!-- nav-area -->
		