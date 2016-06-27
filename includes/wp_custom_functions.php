<?php
/** FUNCION PARA COLOCAR TIEMPO EN ENTRADAS **/
function PROYECTO_time_ago() {
    global $post;
    $date = get_post_time('G', true, $post);
    $chunks = array(
        array( 60 * 60 * 24 * 365 , __( 'año', 'PROYECTO' ), __( 'años', 'PROYECTO' ) ),
        array( 60 * 60 * 24 * 30 , __( 'mes', 'PROYECTO' ), __( 'meses', 'PROYECTO' ) ),
        array( 60 * 60 * 24 * 7, __( 'semana', 'PROYECTO' ), __( 'semanas', 'PROYECTO' ) ),
        array( 60 * 60 * 24 , __( 'dia', 'PROYECTO' ), __( 'dias', 'PROYECTO' ) ),
        array( 60 * 60 , __( 'hora', 'PROYECTO' ), __( 'horas', 'PROYECTO' ) ),
        array( 60 , __( 'minuto', 'PROYECTO' ), __( 'minutos', 'PROYECTO' ) ),
        array( 1, __( 'segundo', 'PROYECTO' ), __( 'segundos', 'PROYECTO' ) )
    );
    if ( !is_numeric( $date ) ) {
        $time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
        $date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
        $date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
    }
    $current_time = current_time( 'mysql', $gmt = 0 );
    $newer_date = time( );
    $since = $newer_date - $date;
    if ( 0 > $since )
        return __(  ' un momento', 'PROYECTO' );
    for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        if ( ( $count = floor($since / $seconds) ) != 0 )
            break;
    }
    $output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
    if ( !(int)trim($output) ){
        $output = '0 ' . __( 'segundos', 'PROYECTO' );
    }
    return $output;
}

/** QUITAR ACENTOS Y CARACTERES ESPECIALES - USADO PARA SLUGS DE CATEGORIAS **/
function normalize ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

/* CUSTOM EXCERPT */
function get_excerpt($count){
    $foto = 0;
    $permalink = get_permalink($post->ID);
    $category = get_taxonomies($post->ID);
    $excerpt = get_the_excerpt($post->ID);
    if ($excerpt == ""){
        $excerpt = get_the_content($post->ID);
    }
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = $excerpt.'... <a class="plus" href="'.$permalink.'">+</a>';
    return $excerpt;
}

/** META TWITTER PARA USUARIO EN EL WORDPRESS **/
function custom_contact_fields( $contact_meta ) {
    if ( !isset( $contact_meta['twitter'] ) ) {
        $contact_meta['twitter'] = 'Usuario de Twitter';
    }
    return $contact_meta;
}
add_filter( 'user_contactmethods', 'custom_contact_fields' );

/** ORDENAR BUSQUEDA POR FECHA **/
function my_search_query( $query ) {
    // not an admin page and is the main query
    if ( !is_admin() && $query->is_main_query() ) {
        if ( is_search() ) { $query->set( 'orderby', 'date' ); }
    }
}
add_action( 'pre_get_posts', 'my_search_query' );

/** CAPTIONS PARA POST THUMBNAIL  **/
function the_post_thumbnail_caption() {
    global $post;
    $thumbnail_id    = get_post_thumbnail_id($post->ID);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
    if ($thumbnail_image && isset($thumbnail_image[0])) {
        echo '<span class="single-img-text">Foto: '.$thumbnail_image[0]->post_excerpt.'</span>';
    }
}

/* BREADCRUMBS */
function the_breadcrumb() {
    echo '<ol class="breadcrumb">';
    if (!is_home()) {
        echo '<li><a href="' . home_url('/') . '">'. __( 'Inicio', 'PROYECTO' ) . '</a></li>';
        if (is_category() || is_single()) {
            echo '<li>' . get_the_category('title_li=') . '</li>';
            if (is_single()) {
                echo '<li class="active">' . get_the_title() . '</li>';
            }
        } elseif (is_page()) {
            echo '<li class="active">' . get_the_title() . '</li>';
        }
    }
    echo '</ol>';
}

/* IMAGES RESPONSIVE ON ATTACHMENT IMAGES */
function image_tag_class($class) {
    $class .= ' img-responsive';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );

?>
