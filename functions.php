<?php
/* --------------------------------------------------------------
    ADD CUSTOM WORDPRESS FUNCTIONS
-------------------------------------------------------------- */

require_once('includes/wp_functions_overrides.php');

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER CSS
-------------------------------------------------------------- */

function proyecto_load_css() {
    if (!is_admin()){
        $version_remove = NULL;
        if ($_SERVER['REMOTE_ADDR'] == '::1') {

            /*- BOOTSTRAP CORE ON LOCAL -*/
            wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, '3.3.7', 'all');
            wp_enqueue_style('bootstrap-css');

            /*- BOOTSTRAP THEME ON LOCAL -*/
            wp_register_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array('bootstrap-css'), '3.3.7', 'all');
            wp_enqueue_style('bootstrap-theme');

            /*- ANIMATE CSS ON LOCAL -*/
            wp_register_style('animate-css', get_template_directory_uri() . '/css/animate.css', false, '3.5.1', 'all');
            wp_enqueue_style('animate-css');

            /*- FONT AWESOME ON LOCAL -*/
            wp_register_style('fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.6.3', 'all');
            wp_enqueue_style('fontawesome-css');

            /*- FLICKITY ON LOCAL -*/
            //wp_register_style('flickity-css', get_template_directory_uri() . '/css/flickity.min.css', false, '2.0.2', 'all');
            //wp_enqueue_style('flickity-css');

            /*- OWL ON LOCAL -*/
            //wp_register_style('owl-css', get_template_directory_uri() . '/css/owl.carousel.css', false, '1.3.3', 'all');
            //wp_enqueue_style('owl-css');

            /*- OWL ON LOCAL -*/
            //wp_register_style('owltheme-css', get_template_directory_uri() . '/css/owl.theme.css', false, '1.3.3', 'all');
            //wp_enqueue_style('owltheme-css');

            /*- OWL ON LOCAL -*/
            //wp_register_style('owltrans-css', get_template_directory_uri() . '/css/owl.transitions.css', false, '1.3.3', 'all');
            //wp_enqueue_style('owltrans-css');

        } else {

            /*- BOOTSTRAP CORE -*/
            wp_register_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', false, '3.3.7', 'all');
            wp_enqueue_style('bootstrap-css');

            /*- BOOTSTRAP THEME -*/
            wp_register_style('bootstrap-theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', array('bootstrap-css'), '3.3.7', 'all');
            wp_enqueue_style('bootstrap-theme');

            /*- ANIMATE CSS -*/
            wp_register_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css', false, '3.5.1', 'all');
            wp_enqueue_style('animate-css');

            /*- FONT AWESOME -*/
            wp_register_style('fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', false, '4.6.3', 'all');
            wp_enqueue_style('fontawesome-css');

            /*- FLICKITY -*/
            //wp_register_style('flickity-css', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.0.2/flickity.min.css', false, '2.0.2', 'all');
            //wp_enqueue_style('flickity-css');

            /*- OWL -*/
            //wp_register_style('owl-css', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css', false, '1.3.3', 'all');
            //wp_enqueue_style('owl-css');

            /*- OWL -*/
            //wp_register_style('owltheme-css', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css', false, '1.3.3', 'all');
            //wp_enqueue_style('owltheme-css');

            /*- OWL -*/
            //wp_register_style('owltrans-css', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css', false, '1.3.3', 'all');
            //wp_enqueue_style('owltrans-css');
        }

        /*- GOOGLE FONTS -*/
        wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic', false, $version_remove, 'all');
        wp_enqueue_style('google-fonts');

        /*- MAIN STYLE -*/
        wp_register_style('main-style', get_template_directory_uri() . '/css/proyecto-style.css', false, $version_remove, 'all');
        wp_enqueue_style('main-style');

        /*- MAIN MEDIAQUERIES -*/
        wp_register_style('main-mediaqueries', get_template_directory_uri() . '/css/proyecto-mediaqueries.css', array('main-style'), $version_remove, 'all');
        wp_enqueue_style('main-mediaqueries');

        /*- WORDPRESS STYLE -*/
        wp_register_style('wp-initial-style', get_template_directory_uri() . '/style.css', false, $version_remove, 'all');
        wp_enqueue_style('wp-initial-style');
    }
}

add_action('init', 'proyecto_load_css');

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER JS
-------------------------------------------------------------- */

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", '');
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    if ($_SERVER['REMOTE_ADDR'] == '::1') {
        /*- JQUERY ON LOCAL  -*/
        wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '1.12.4', true);
    } else {
        /*- JQUERY ON WEB  -*/
        wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, '1.12.4', true);
    }
    wp_enqueue_script('jquery');
}


function proyecto_load_js() {
    if (!is_admin()){
        $version_remove = NULL;
        if ($_SERVER['REMOTE_ADDR'] == '::1') {
            /*- MODERNIZR ON LOCAL  -*/
            wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'), '2.8.3', true);
            wp_enqueue_script('modernizr');

            /*- BOOTSTRAP ON LOCAL  -*/
            wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true);
            wp_enqueue_script('bootstrap');

            /*- JQUERY STICKY ON LOCAL  -*/
            wp_register_script('sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.0.4', true);
            wp_enqueue_script('sticky');

            /*- JQUERY NICESCROLL ON LOCAL  -*/
            wp_register_script('nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery'), '3.6.8', true);
            wp_enqueue_script('nicescroll');

            /*- LETTERING  -*/
            //wp_register_script('lettering', get_template_directory_uri() . '/js/jquery.lettering.js', array('jquery'), '0.7.0', true);
            //wp_enqueue_script('lettering');

            /*- SMOOTH SCROLL -*/
            //wp_register_script('smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array('jquery'), '10.0.0', true);
            //wp_enqueue_script('smooth-scroll');

            /*- IMAGESLOADED ON LOCAL  -*/
            //wp_register_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array('jquery'), '4.1.0', true);
            //wp_enqueue_script('imagesloaded');

            /*- ISOTOPE ON LOCAL  -*/
            //wp_register_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '3.0.1', true);
            //wp_enqueue_script('isotope');

            /*- FLICKITY ON LOCAL  -*/
            //wp_register_script('flickity', get_template_directory_uri() . '/js/flickity.pkgd.min.js', array('jquery'), '2.0.2', true);
            //wp_enqueue_script('flickity');

            /*- MASONRY ON LOCAL  -*/
            //wp_register_script('masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '4.1.0', true);
            //wp_enqueue_script('masonry');

            /*- OWL ON LOCAL -*/
            //wp_register_script('owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.3.3', true);
            //wp_enqueue_script('owl-js');

        } else {


            /*- MODERNIZR -*/
            wp_register_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array('jquery'), '2.8.3', true);
            wp_enqueue_script('modernizr');

            /*- BOOTSTRAP -*/
            wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7', true);
            wp_enqueue_script('bootstrap');

            /*- JQUERY STICKY -*/
            wp_register_script('sticky', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.3/jquery.sticky.min.js', array('jquery'), '1.0.3', true);
            wp_enqueue_script('sticky');

            /*- JQUERY NICESCROLL -*/
            wp_register_script('nicescroll', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js', array('jquery'), '3.6.8', true);
            wp_enqueue_script('nicescroll');

            /*- LETTERING  -*/
            //wp_register_script('lettering', 'https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js', array('jquery'), '0.7.0', true);
            //wp_enqueue_script('lettering');

            /*- SMOOTH SCROLL -*/
            //wp_register_script('smooth-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/10.0.0/js/smooth-scroll.min.js', array('jquery'), '10.0.0', true);
            //wp_enqueue_script('smooth-scroll');

            /*- IMAGESLOADED -*/
            //wp_register_script('imagesloaded', 'https://cdn.jsdelivr.net/imagesloaded/4.1.0/imagesloaded.pkgd.min.js', array('jquery'), '4.1.0', true);
            //wp_enqueue_script('imagesloaded');

            /*- ISOTOPE -*/
            //wp_register_script('isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.1/isotope.pkgd.min.js', array('jquery'), '3.0.1', true);
            //wp_enqueue_script('isotope');

            /*- FLICKITY -*/
            //wp_register_script('flickity', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.0.2/flickity.pkgd.min.js', array('jquery'), '1.2.1', true);
            //wp_enqueue_script('flickity');

            /*- MASONRY -*/
            //wp_register_script('masonry', 'https://cdnjs.cloudflare.com/ajax/libs/masonry/4.1.0/masonry.pkgd.min.js', array('jquery'), '4.1.0', true);
            //wp_enqueue_script('masonry');

            /*- OWL ON LOCAL -*/
            //wp_register_script('owl-js', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js', array('jquery'), '1.3.3', true);
            //wp_enqueue_script('owl-js');

        }

        /*- MAIN FUNCTIONS -*/
        wp_register_script('main-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), $version_remove, true);
        wp_enqueue_script('main-functions');
    }
}

add_action('init', 'proyecto_load_js');

/* --------------------------------------------------------------
    ADD THEME SUPPORT
-------------------------------------------------------------- */

load_theme_textdomain( 'PROYECTO', get_template_directory() . '/languages' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ));
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form' ) );
add_theme_support( 'custom-background',
                  array(
                      'default-image' => '',    // background image default
                      'default-color' => '',    // background color default (dont add the #)
                      'wp-head-callback' => '_custom_background_cb',
                      'admin-head-callback' => '',
                      'admin-preview-callback' => ''
                  )
                 );

/* --------------------------------------------------------------
    ADD NAV MENUS LOCATIONS
-------------------------------------------------------------- */
function PROYECTO_add_editor_styles() {
    add_editor_style( get_stylesheet_directory_uri() . '/css/editor-styles.css' );
}
add_action( 'admin_init', 'PROYECTO_add_editor_styles' );

/* --------------------------------------------------------------
    ADD NAV MENUS LOCATIONS
-------------------------------------------------------------- */

register_nav_menus( array(
    'header_menu' => __( 'Menu Header Principal', 'PROYECTO' ),
    'footer_menu' => __( 'Menu Footer', 'PROYECTO' ),
) );

/* --------------------------------------------------------------
    ADD DYNAMIC SIDEBAR SUPPORT
-------------------------------------------------------------- */

add_action( 'widgets_init', 'PROYECTO_widgets_init' );
function PROYECTO_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'PROYECTO' ),
        'id' => 'main_sidebar',
        'description' => __( 'Widgets seran vistos en posts y pages', 'PROYECTO' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Shop Sidebar', 'PROYECTO' ),
        'id' => 'shop_sidebar',
        'description' => __( 'Widgets seran vistos en Tienda y Categorias de Producto', 'PROYECTO' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

/* --------------------------------------------------------------
    CUSTOM ADMIN LOGIN
-------------------------------------------------------------- */

add_action('login_head', 'custom_login_logo');
function custom_login_logo() {
    echo '
    <style type="text/css">
        body{
            background-color: #f5f5f5 !important;
            background-image:url(' . get_template_directory_uri() . '/images/bg.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        h1 {
            background-image:url(' . get_template_directory_uri() . '/images/logo.png) !important;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain !important;
        }
        a { background-image:none !important; }
        .login form{
            -webkit-border-radius: 5px;
            border-radius: 5px;
            background-color: rgba(203, 203, 203, 0.5);
            box-shadow: 0px 0px 6px #878787;
        }
        .login label{
            color: black;
            font-weight: 500;
        }
    </style>
    ';
}

if (! function_exists('dashboard_footer') ){
    function dashboard_footer() {
        echo '<span id="footer-thankyou">';
        _e ('Gracias por crear con ', 'PROYECTO' );
        echo '<a href="http://wordpress.org/" >WordPress.</a> - ';
        _e ('Tema desarrollado por ', 'PROYECTO' );
        echo '<a href="http://robertochoa.com.ve/" >Robert Ochoa</a></span>';
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
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 9999, 400, true);
}
if ( function_exists( 'add_image_size' ) ) {
    add_image_size('avatar', 100, 100, true);
    add_image_size('blog_img', 276, 217, true);
    add_image_size( 'single_img', 636, 297, true );
}


/* --------------------------------------------------------------
    ADD CUSTOM WALKER BOOTSTRAP
-------------------------------------------------------------- */

// WALKER COMPLETO TOMADO DESDE EL NAVBAR COLLAPSE
require_once('includes/wp_bootstrap_navwalker.php');

// WALKER CUSTOM SI DEBO COLOCAR ICONOS AL LADO DEL MENU PRINCIPAL - SU ESTRUCTURA ESTA DENTRO DEL MISMO ARCHIVO
//require_once('includes/wp_walker_custom.php');

/* --------------------------------------------------------------
    ADD CUSTOM WORDPRESS FUNCTIONS
-------------------------------------------------------------- */

require_once('includes/wp_custom_functions.php');

/* --------------------------------------------------------------
    ADD CUSTOM WOOCOMMERCE OVERRIDES
-------------------------------------------------------------- */

//require_once('includes/wp_woocommerce_functions.php');



?>
