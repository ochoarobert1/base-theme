<!DOCTYPE html>
<html <?php language_attributes() ?>>
    <head>
        <meta charset="<?php bloginfo('charset') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link href="//www.google-analytics.com" rel="dns-prefetch" />
        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.ico" rel="shortcut icon" />
        <meta name="robot" content="NOODP, INDEX, FOLLOW" />
        <meta name="author" content="PROYECTO" />
        <meta name="language" content="VE" />
        <meta name="geo.position" content="10.333333;-67.033333" />
        <meta name="ICBM" content="10.333333, -67.033333" />
        <meta name="geo.region" content="VE" />
        <meta name="geo.placename" content="ubicacion" />
        <meta name="DC.title" content="<?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>" />
        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <meta name="title" content="<?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>">
        <?php $current_url = $_SERVER['REQUEST_URI']; $clean_url = str_replace('/', '', $current_url); ?>
        <?php if(is_single()) : $the_slug = $clean_url; $args=array('name' => $the_slug, 'posts_per_page' => 1); $my_posts = get_posts( $args ); ?>
        <?php if( $my_posts ) { $excerpt = $my_posts[0]->post_excerpt; echo '<meta name="description" content="' . htmlentities($excerpt, ENT_QUOTES, 'UTF-8') . '" />'; } ?>
        <?php endif; ?>
        <?php if (is_home() ) { echo '<meta name="description" content="'. get_bloginfo("name") .' | ' . get_bloginfo("description") . '">'; } ?>
        <?php if (is_page() ) { echo '<meta name="description" content="'. get_bloginfo("name") .' | ' . get_bloginfo("description") . '">'; } ?>
        <?php if(is_single()) : $the_slug = $clean_url; $args=array('name' => $the_slug, 'posts_per_page' => 1); $my_posts = get_posts( $args ); ?>
        <?php if( $my_posts ) { $terms = get_the_terms( $my_posts[0]->ID, 'post_tag' ); if ( $terms && ! is_wp_error( $terms ) ) : $draught_links = array(); ?>
        <?php foreach ( $terms as $term ) { $draught_links[] = $term->name; } $on_draught = join( ", ", $draught_links ); endif;
                               echo '<meta name="keywords" content="KEYWORDS , '. $on_draught .'" />'; } ?>
        <?php endif; ?>
        <?php if (is_home() || is_page() ) { echo '<meta name="keywords" content="KEYWORDS" />'; } ?>
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@AUTHOR" />
        <meta name="twitter:creator" content="@AUTHOR" />
        <meta property='fb:admins' content='100000133943608' />
        <meta property="fb:app_id" content="611067105660122" />
        <meta property="og:title" content="<?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>" />
        <meta property="og:site_name" content="PROYECTO" />
        <meta property="og:type" content="article" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:url" content="<?php if(is_single()) { the_permalink(); } else { echo 'PROYECTO'; }?>" />
        <?php if(is_single()) : $the_slug = $clean_url; $args=array('name' => $the_slug, 'posts_per_page' => 1); $my_posts = get_posts( $args ); ?>
        <?php if( $my_posts ) { $excerpt = $my_posts[0]->post_excerpt; echo '<meta property="og:description" content="' . htmlentities($excerpt, ENT_QUOTES, 'UTF-8') . '" />'; } ?>
        <?php endif; ?>
        <?php if (is_home() ) { echo '<meta property="og:description" content="'. get_bloginfo("name") .'" | "' . get_bloginfo("description") . '">'; } ?>
        <?php if (is_page() ) { echo '<meta property="og:description"  content="'. get_bloginfo("name") .'" | "' . get_bloginfo("description") . '">'; } ?>
        <meta property="og:image" content='<?php if(is_single()){ $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; } else { echo esc_url( get_template_directory_uri() ) ."/images/oglogo.png"; } ?>' />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head() ?>
        <!--[if IE]> <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script> <![endif]-->
        <!--[if IE]>  <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script> <![endif]-->
        <?php get_template_part('inc/fb-script'); ?>
    </head>
    <body <?php body_class() ?>>
        <div id="fb-root"></div>
        <header class="container-fluid">
            <div class="row">
                <div class="the-header col-md-12 no-paddingl no-paddingr">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Brand</a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'depth' => 2, 'container' => 'div',
                                                     'container_class' => 'collapse navbar-collapse', 'container_id' => 'bs-example-navbar-collapse-1', 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 'walker' => new wp_bootstrap_navwalker() )); ?>
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </header>
