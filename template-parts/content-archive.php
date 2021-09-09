<?php
/**
 * Template part for article excerpts on archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fanagalo_underscores_core
 */
?>

<article class="archive-post">
    <?php
        // if(has_post_thumbnail()) {
            echo '<div class="archive-post-image">';
                echo '<a href=' .  esc_url( get_permalink() ) . ' rel="bookmark">';
                    the_post_thumbnail( 'medium' );
                echo '</a>'; 
            echo '</div><!-- archive-post-image -->';
        // }

        echo '<div class="archive-post-text">';

            the_category('');

            echo '<a href=' .  esc_url( get_permalink() ) . ' rel="bookmark"><h2  class="archive-post-title">' . get_the_title() .'</h2></a>'; 

            the_date( '', '<div class="article-post-date">', '</div>' );

            echo '<a href=' .  esc_url( get_permalink() ) . ' rel="bookmark" class="archive-post-excerpt">';
                the_excerpt();
            '</a>'; 

            echo '<a href=' .  esc_url( get_permalink() ) . ' rel="bookmark" class="archive-post-readmore">' . __('lees verder','eiklinde-fngl-2020') .'</a>';

        echo '</div><!-- archive-post-text -->';
    ?>
</article><!-- .archive-post -->