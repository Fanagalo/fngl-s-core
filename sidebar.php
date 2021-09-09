<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fanagalo_underscores_core
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

	<div class="sidebar-full-bg"></div>
	<aside id="secondary" class="widget-area sidebar-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
