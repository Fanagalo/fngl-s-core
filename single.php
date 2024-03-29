<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fanagalo_underscores_core
 */

get_header();
?>

<div class="main-full-bg"></div>
<main id="primary" class="main-area">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		the_post_navigation();

	endwhile; // End of the loop.
	?>

<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
?>


</main>

<?php
get_sidebar();
get_footer();
