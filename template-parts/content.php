<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fanagalo_underscores_core
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="article-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="article-title">', '</h1>');
		else :
			the_title('<h2 class="article-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
		?>
			<div class="article-meta">
				<?php
				fngl_s_core_posted_on();
				fngl_s_core_posted_by();
				?>
			</div><!-- .article-meta -->
		<?php endif; ?>
	</header><!-- .article-header -->

	<?php
	/* used by plugin Lightbox Photoswipe to include the Post Thumbnail in the lightbox */
	if (has_post_thumbnail()) {
		$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		$content = '<div class="post-thumbnail"><a href="' . $full_image_url[0] . '" title="' . the_title_attribute('echo=0') . '">' . get_the_post_thumbnail($post->ID, 'full') . '</a></div>';
		echo $content;
	}
	?>

	<div class="article-content">
		<?php
		the_content(sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'fngl-s-core'),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		));

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'fngl-s-core'),
			'after'  => '</div>',
		));
		?>
	</div><!-- .article-content -->

	<footer class="article-footer">
		<?php fngl_s_core_article_footer(); ?>
	</footer><!-- .article-footer -->
</article><!-- #post-<?php the_ID(); ?> -->