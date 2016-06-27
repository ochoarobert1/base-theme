<?php

/* CLEAN UP WORDPRESS CORE FUNCTION */

add_action( 'init', 'PROYECTO_head_cleanup', 10, 0 );
function PROYECTO_head_cleanup() {
    // category feeds
    // remove_action( 'wp_head', 'feed_links_extra', 3 );
    // post and comment feeds
    // remove_action( 'wp_head', 'feed_links', 2 );
    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
} /* end bones head cleanup */

/* REARRANGE TITLE */

add_filter( 'wp_title', 'rw_title', 10, 3 );
// A better title
// http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
function rw_title( $title, $sep, $seplocation ) {
    global $page, $paged;
    // Don't affect in feeds.
    if ( is_feed() ) return $title;
    // Add the blog's name
    if ( 'right' == $seplocation ) {
        $title .= get_bloginfo( 'name' );
    } else {
        $title = get_bloginfo( 'name' ) . $title;
    }
    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " {$sep} {$site_description}";
    }
    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 ) {
        $title .= " {$sep} " . sprintf( __( 'Page %s', 'PROYECTO' ), max( $paged, $page ) );
    }
    return $title;
} // end better title

/* ADD CONTENT WIDTH FUNCTION */

if ( ! isset( $content_width ) ) $content_width = 1170;


?>
