<?php

/** 
 * Shortcode to display overview of pages, posts of CPT using a shortcode
 * 
 * based on "recent posts shortcode" @ https://digwp.com/2018/08/shortcode-display-recent-posts/
 * dependent on fngl-s-core based theme version 0.78 and higher
 * previously a seperate plugin, latest version 0.13
 * 
 * Shortcode [fngl_recent_posts] 
 * example of use
 * [fngl_recent_posts posts_per_page='5' cat='7,10']
 * [fngl_recent_posts posts_per_page='10' cat='' order='asc' orderby='rand']
 * [fngl_recent_posts post_type='nlpost']
 */

function fngl_recent_posts_shortcode($atts, $content = null)
{

    global $post;

    extract(shortcode_atts(array(
        'cat'            => '',
        'order'          => 'DESC',
        'orderby'        => 'date',
        'posts_per_page' => '5',
        'post_type'      => 'post',
    ), $atts));

    $args = array(
        'cat'            => $cat,
        'order'          => $order,
        'orderby'        => $orderby,
        'posts_per_page' => $posts_per_page,
        'post_type'      => $post_type,
    );

    $output = '';

    $posts = get_posts($args);

    if (!empty($posts)) :

        // shows posts when available
        foreach ($posts as $post) {

            setup_postdata($post);

            $output_content .=
                '<article id="post-' . get_the_ID() . '"' . 'class="' . esc_attr(implode(' ', get_post_class())) . '"">'

                . '<div class="post-thumbnail"><a href=' .  esc_url(get_permalink()) . ' rel="bookmark">' . get_the_post_thumbnail() . '</a></div>'

                . '<header class="article-header">'
                . '<h2 class="article-title"><a href=' .  esc_url(get_permalink()) . ' rel="bookmark">' . get_the_title() . '</a></h2>'

                . '<div class="article-meta">'
                . '<div class="article-post-date">' . get_the_date() . '</div>'
                . '</div><!-- .article-meta -->'

                . '</header><!-- .article-header -->'

                . '<div class="article-content">' . apply_filters('the_content', get_the_content('Lees verder...')) . '</div><!-- .article-content -->'

                . '<footer class="article-footer"></footer>'

                . '</article>';
        }

        wp_reset_postdata();

        return '<div  class="fngl-recent-posts">'
            . $output_content // option for content
            . '</div>';

    else :

        // shows message when no posts available
        return; // no empty state
    endif;
}
add_shortcode('fngl_recent_posts', 'fngl_recent_posts_shortcode');
