<?php

/**
 * Adds a meta box to the post editing screen
 */
function prfx_custom_meta() {
    add_meta_box( 'prfx_meta', __( 'Etiqueta a visualizar en el home', 'prfx-textdomain' ), 'prfx_meta_callback','post' );
}
add_action( 'add_meta_boxes', 'prfx_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
?>

<span class="prfx-row-title"><?php _e( 'Categorías', 'prfx-textdomain' )?></span>
<div class="prfx-row-content">
    <label for="meta-radio-one" style="padding-left:15px;padding-right:15px;">
        <input type="radio" name="meta-radio" id="economia" value="economia" <?php if ( isset ( $prfx_stored_meta['meta-radio'] ) ) checked( $prfx_stored_meta['meta-radio'][0], 'economia' ); ?>>
        <?php _e( 'Economía', 'prfx-textdomain' )?>
    </label>
    <label for="meta-radio-two" style="padding-left:15px;padding-right:15px;">
        <input type="radio" name="meta-radio" id="entretenimiento" value="entretenimiento" <?php if ( isset ( $prfx_stored_meta['meta-radio'] ) ) checked( $prfx_stored_meta['meta-radio'][0], 'entretenimiento' ); ?>>
        <?php _e( 'Entretenimiento', 'prfx-textdomain' )?>
    </label>
    <label for="meta-radio-two" style="padding-left:15px;padding-right:15px;">
        <input type="radio" name="meta-radio" id="multimedia" value="multimedia" <?php if ( isset ( $prfx_stored_meta['meta-radio'] ) ) checked( $prfx_stored_meta['meta-radio'][0], 'multimedia' ); ?>>
        <?php _e( 'Multimedia', 'prfx-textdomain' )?>
    </label>
    <label for="meta-radio-two" style="padding-left:15px;padding-right:15px;">
        <input type="radio" name="meta-radio" id="mundo" value="mundo" <?php if ( isset ( $prfx_stored_meta['meta-radio'] ) ) checked( $prfx_stored_meta['meta-radio'][0], 'mundo' ); ?>>
        <?php _e( 'Mundo', 'prfx-textdomain' )?>
    </label>
</div>
<div class="prfx-row-content">
    <label for="meta-radio-two" style="padding-left:15px;padding-right:15px;">
        <input type="radio" name="meta-radio" id="pais" value="pais" <?php if ( isset ( $prfx_stored_meta['meta-radio'] ) ) checked( $prfx_stored_meta['meta-radio'][0], 'pais' ); ?>>
        <?php _e( 'País', 'prfx-textdomain' )?>
    </label>
    <label for="meta-radio-two" style="padding-left:15px;padding-right:15px;">
        <input type="radio" name="meta-radio" id="tecnologia" value="tecnologia" <?php if ( isset ( $prfx_stored_meta['meta-radio'] ) ) checked( $prfx_stored_meta['meta-radio'][0], 'tecnologia' ); ?>>
        <?php _e( 'Tecnología', 'prfx-textdomain' )?>
    </label>
    <label for="meta-radio-two" style="padding-left:15px;padding-right:15px;">
        <input type="radio" name="meta-radio" id="vida" value="vida" <?php if ( isset ( $prfx_stored_meta['meta-radio'] ) ) checked( $prfx_stored_meta['meta-radio'][0], 'vida' ); ?>>
        <?php _e( 'Vida', 'prfx-textdomain' )?>
    </label>
    <label for="meta-radio-two" style="padding-left:15px;padding-right:15px;">
        <input type="radio" name="meta-radio" id="deportes" value="deportes" <?php if ( isset ( $prfx_stored_meta['meta-radio'] ) ) checked( $prfx_stored_meta['meta-radio'][0], 'deportes' ); ?>>
        <?php _e( 'Deportes', 'prfx-textdomain' )?>
    </label>
</div>

<?php
}


/**
 * Saves the custom meta input
 */
function prfx_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    /*if( isset( $_POST[ 'meta-text' ] ) ) {
        update_post_meta( $post_id, 'meta-text', sanitize_text_field( $_POST[ 'meta-text' ] ) );
    }*/

    // Checks for input and saves if needed
    if( isset( $_POST[ 'meta-radio' ] ) ) {
        update_post_meta( $post_id, 'meta-radio', $_POST[ 'meta-radio' ] );
    }

}
add_action( 'save_post', 'prfx_meta_save' );


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function add_antetitulo() {

    $screens = array( 'post', 'page' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'antetitulo_sectionId',
            __( 'Antetítulo', 'AnteTitulo' ),
            'add_antetitulo_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'add_antetitulo' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function add_antetitulo_callback( $post ) {

    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'antetitulo', 'antetitulo_nonce' );

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    $value = get_post_meta( $post->ID, 'antetitulo_value_key', true );
    echo '<textarea style="width:100%;" id="antetitulo_text" name="antetitulo_text" >' . wp_specialchars( get_post_meta( $post->ID, 'antetitulo_value_key', true ), 1 ) . '</textarea>';
    echo '<p>'. htmlspecialchars('Es un abreboca que complementa al título') . '</p> ';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function antetitulo_save_meta_box_data( $post_id ) {

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['antetitulo_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['antetitulo_nonce'], 'antetitulo' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if ( ! isset( $_POST['antetitulo_text'] ) ) {
        return;
    }

    // Sanitize user input.
    //$my_data = sanitize_text_field( $_POST['antetitulo_text'] );

    // Update the meta field in the database.
    //update_post_meta( $post_id, 'second_summary_value_key', $my_data );
    update_post_meta( $post_id, 'antetitulo_value_key', $_POST['antetitulo_text']  );
}
add_action( 'save_post', 'antetitulo_save_meta_box_data' );
