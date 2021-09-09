<?php
/**
Template Name: Page without title
 * The template for displaying landing pages and home pages
 *
 * The page title is loaded, but not displayed due to special CSS class "without-page-title"
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fanagalo_underscores_core
 */

get_header();
?>

<div class="main-full-bg"></div>
<main id="main primary" class="main-area without-page-title">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>

</main>

<?php
get_sidebar();
get_footer();
