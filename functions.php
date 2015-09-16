<?php

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER CSS
-------------------------------------------------------------- */

function proyecto_load_css() {
    if (!is_admin()){
        $version_remove = NULL;
        /*- BOOTSTRAP CORE -*/
        wp_register_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', false, '3.3.5', 'all');
        wp_enqueue_style('bootstrap-css');

        /*- BOOTSTRAP THEME -*/
        wp_register_style('bootstrap-theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css', array('bootstrap-css'), '3.3.5', 'all');
        wp_enqueue_style('bootstrap-theme');

        /*- FONT AWESOME -*/
        wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', false, '4.4.0', 'all');
        wp_enqueue_style('font-awesome');

        /*- VALIDATION ENGINE -*/
        wp_register_style('validation-engine', 'https://cdn.jsdelivr.net/jquery.validationengine/2.6.4/css/validationEngine.jquery.css', false, '2.6.4', 'all');
        wp_enqueue_style('validation-engine');

        /*- ANIMATE CSS -*/
        wp_register_style('animate-css', 'https://cdn.jsdelivr.net/animatecss/3.4.0/animate.min.css', false, '3.4.0', 'all');
        wp_enqueue_style('animate-css');

        /*- FLICKITY -*/
        //wp_register_style('flickity-css', 'https://cdn.jsdelivr.net/flickity/1.1.0/flickity.min.css', false, '1.1.0', 'all');
        //wp_enqueue_style('flickity-css');

        /*- GOOGLE FONTS -*/
        wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,800', false, $version_remove, 'all');
        wp_enqueue_style('google-fonts');

        /*- MAIN STYLE -*/
        wp_register_style('main-style', get_template_directory_uri() . '/css/proyecto-style.css', false, $version_remove, 'all');
        wp_enqueue_style('main-style');

        /*- MAIN MEDIAQUERIES -*/
        wp_register_style('main-mediaqueries', get_template_directory_uri() . '/css/proyecto-mediaqueries.css', array('main-style'), $version_remove, 'all');
        wp_enqueue_style('main-mediaqueries');
    }
}

add_action('init', 'proyecto_load_css');

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER JS
-------------------------------------------------------------- */

function proyecto_load_js() {
    if (!is_admin()){
        $version_remove = NULL;
        wp_deregister_script('jquery');
        wp_dequeue_script('jquery');

        /*- JQUERY -*/
        wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3', true);
        wp_enqueue_script('jquery');

        /*- MODERNIZR -*/
        wp_register_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array('jquery'), '2.8.3', true);
        wp_enqueue_script('modernizr');

        /*- BOOTSTRAP -*/
        wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), '3.3.5', true);
        wp_enqueue_script('bootstrap');

        /*- JQUERY STICKY -*/
        wp_register_script( 'sticky', 'https://cdn.jsdelivr.net/jquery.sticky/1.0.1/jquery.sticky.min.js', array('jquery'), '1.0.1', true);
        wp_enqueue_script('sticky');

        /*- VALIDATION ENGINE -*/
        wp_register_script( 'validation', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js', array('jquery'), '2.6.4', true);
        wp_enqueue_script('validation');

        /*- VALIDATION ENGINE LOCALE -*/
        wp_register_script('validation-es', get_template_directory_uri() . '/js/jquery.validationEngine-es.min.js', array('jquery', 'validation'), $version_remove, true);
        wp_enqueue_script('validation-es');

        /*- JQUERY NICESCROLL -*/
        wp_register_script( 'nicescroll', 'https://cdn.jsdelivr.net/jquery.nicescroll/3.6.0/jquery.nicescroll.min.js', array('jquery'), '3.6.0', true);
        wp_enqueue_script('nicescroll');

        /*- IMAGESLOADED -*/
        //wp_register_script( 'imagesloaded', 'https://cdn.jsdelivr.net/imagesloaded/3.1.8/imagesloaded.pkgd.js', array('jquery'), '3.1.8', true);
        //wp_enqueue_script('imagesloaded');

        /*- ISOTOPE -*/
        //wp_register_script( 'isotope', 'https://cdn.jsdelivr.net/isotope/2.2.1/isotope.pkgd.min.js', array('jquery'), '2.2.1', true);
        //wp_enqueue_script('isotope');

        /*- FLICKITY -*/
        //wp_register_script( 'flickity', 'https://cdn.jsdelivr.net/flickity/1.1.0/flickity.pkgd.min.js', array('jquery'), '1.1.0', true);
        //wp_enqueue_script('flickity');

        /*- MASONRY -*/
        //wp_register_script( 'masonry', 'https://cdn.jsdelivr.net/masonry/3.3.1/masonry.pkgd.min.js', array('jquery'), '3.3.1', true);
        //wp_enqueue_script('masonry');


        /*- MAIN FUNCTIONS -*/
        wp_register_script('main-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), $version_remove, true);
        wp_enqueue_script('main-functions');
    }
}

add_action('init', 'proyecto_load_js');

/* --------------------------------------------------------------
    ADD THEME SUPPORT
-------------------------------------------------------------- */

load_theme_textdomain('PROYECTO', get_template_directory() . '/languages');
add_theme_support('post-thumbnails');
add_theme_support('menus');

/* --------------------------------------------------------------
    CUSTOM ADMIN LOGIN
-------------------------------------------------------------- */

add_action('login_head', 'custom_login_logo');
function custom_login_logo() {
    echo '
    <style type="text/css">
        body{
            background-color: #000 !important;
            background-image:url(' . get_bloginfo('template_directory') . '/images/login-bg.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        h1 {
            background-image:url(' . get_bloginfo('template_directory') . '/images/logo.png) !important;
            background-repeat: no-repeat;
            background-position: center;
        }
        a { background-image:none !important;}
        .login form{-webkit-border-radius: 5px; border-radius: 5px; background-color: rgba(255,255,255,0.5);}
        .login label{color: black; font-weight: 500;}
    </style>
    ';
}

if (! function_exists('dashboard_footer') ){
    function dashboard_footer() {
        _e( '<span id="footer-thankyou">Thank you for creating with <a href="http://wordpress.org/" >WordPress.</a> - Theme developed By <a href="http://robertochoa.com.ve/" >Robert Ochoa</a></span>', 'PROYECTO' );
    }
}
add_filter('admin_footer_text', 'dashboard_footer');

/* --------------------------------------------------------------
    ADD CUSTOM METABOX
-------------------------------------------------------------- */

add_filter( 'rwmb_meta_boxes', 'proyecto_metabox' );

function proyecto_metabox( $meta_boxes )
{
    $prefix = 'rw_';

    $meta_boxes[] = array(
        'title'    => 'Media',
        'pages'    => array( 'portafolio' ),
        'fields' => array(
            array(
                'name' => 'URL',
                'id'   => $prefix . 'url',
                'type' => 'text',
            ),
        )
    );

    return $meta_boxes;
}

/* --------------------------------------------------------------
    ADD CUSTOM POST TYPE
-------------------------------------------------------------- */

function portafolio() {

    $labels = array(
        'name'                => _x( 'Portafolio', 'Post Type General Name', 'PROYECTO' ),
        'singular_name'       => _x( 'Item', 'Post Type Singular Name', 'PROYECTO' ),
        'menu_name'           => __( 'Portafolio', 'PROYECTO' ),
        'name_admin_bar'      => __( 'Portafolio', 'PROYECTO' ),
        'parent_item_colon'   => __( 'Item Padre:', 'PROYECTO' ),
        'all_items'           => __( 'Todos los Items', 'PROYECTO' ),
        'add_new_item'        => __( 'Agregar Item', 'PROYECTO' ),
        'add_new'             => __( 'Agregar', 'PROYECTO' ),
        'new_item'            => __( 'Nuevo Item', 'PROYECTO' ),
        'edit_item'           => __( 'Editar Item', 'PROYECTO' ),
        'update_item'         => __( 'Actualizar Item', 'PROYECTO' ),
        'view_item'           => __( 'Ver Item', 'PROYECTO' ),
        'search_items'        => __( 'Buscar Item', 'PROYECTO' ),
        'not_found'           => __( 'No encontrado', 'PROYECTO' ),
        'not_found_in_trash'  => __( 'No encontrado en papelera', 'PROYECTO' ),
    );
    $args = array(
        'label'               => __( 'portafolio', 'PROYECTO' ),
        'description'         => __( 'Trabajos realizados', 'PROYECTO' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-media-code',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'portafolio', $args );

}

// Hook into the 'init' action
add_action( 'init', 'portafolio', 0 );

/* --------------------------------------------------------------
    ADD CUSTOM IMAGE SIZE
-------------------------------------------------------------- */

if (function_exists('add_image_size')) {
    add_image_size('avatar', 100, 100, true);
    add_image_size('blog_img', 276, 217, true);
}

/* --------------------------------------------------------------
    ADD CUSTOM WALKER BOOTSTRAP
-------------------------------------------------------------- */

// WALKER COMPLETO TOMADO DESDE EL NAVBAR COLLAPSE
require_once('inc/wp_bootstrap_navwalker.php');

// WALKER CUSTOM SI DEBO COLOCAR ICONOS AL LADO DEL MENU PRINCIPAL - SU ESTRUCTURA ESTA DENTRO DEL MISMO ARCHIVO
require_once('inc/wp_walker_custom.php');

/* --------------------------------------------------------------
    ADD CUSTOM WORDPRESS FUNCTIONS
-------------------------------------------------------------- */

require_once('inc/wp_custom_functions.php');

/* --------------------------------------------------------------
    ADD CUSTOM WORDPRESS METABOX - EN DESARROLLO
-------------------------------------------------------------- */

/*- require_once('inc/wp_custom_metabox.php'); -*/
