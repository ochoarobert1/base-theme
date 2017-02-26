<?php
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
            //wp_register_script('smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', array('jquery'), '10.2.1', true);
            //wp_enqueue_script('smooth-scroll');

            /*- IMAGESLOADED ON LOCAL  -*/
            //wp_register_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array('jquery'), '4.1.1', true);
            //wp_enqueue_script('imagesloaded');

            /*- ISOTOPE ON LOCAL  -*/
            //wp_register_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '3.0.2', true);
            //wp_enqueue_script('isotope');

            /*- FLICKITY ON LOCAL  -*/
            //wp_register_script('flickity', get_template_directory_uri() . '/js/flickity.pkgd.min.js', array('jquery'), '2.0.5', true);
            //wp_enqueue_script('flickity');

            /*- MASONRY ON LOCAL  -*/
            //wp_register_script('masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '4.1.1', true);
            //wp_enqueue_script('masonry');

            /*- OWL ON LOCAL -*/
            //wp_register_script('owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.2.0', true);
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
            //wp_register_script('smooth-scroll', 'https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/10.2.1/js/smooth-scroll.min.js', array('jquery'), '10.2.1', true);
            //wp_enqueue_script('smooth-scroll');

            /*- IMAGESLOADED -*/
            //wp_register_script('imagesloaded', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js', array('jquery'), '4.1.1', true);
            //wp_enqueue_script('imagesloaded');

            /*- ISOTOPE -*/
            //wp_register_script('isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.2/isotope.pkgd.min.js', array('jquery'), '3.0.2', true);
            //wp_enqueue_script('isotope');

            /*- FLICKITY -*/
            //wp_register_script('flickity', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.0.5/flickity.pkgd.min.js', array('jquery'), '2.0.5', true);
            //wp_enqueue_script('flickity');

            /*- MASONRY -*/
            //wp_register_script('masonry', 'https://cdnjs.cloudflare.com/ajax/libs/masonry/4.1.1/masonry.pkgd.min.js', array('jquery'), '4.1.1', true);
            //wp_enqueue_script('masonry');

            /*- OWL ON LOCAL -*/
            //wp_register_script('owl-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js', array('jquery'), '2.2.0', true);
            //wp_enqueue_script('owl-js');

        }

        /*- MAIN FUNCTIONS -*/
        wp_register_script('main-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), $version_remove, true);
        wp_enqueue_script('main-functions');
    }
}

add_action('init', 'proyecto_load_js');
?>
