<?php


/**
 * Ajoute un panneau du plugin dans le menu admin
 */
function icms_copyright_ajoute_admin_menu() {
    add_menu_page(
        __( 'ICMS Copyright', 'icms-copyright' ),       // Page title
        __( 'ICMS Copyright', 'icms-copyright' ),       // Menu title
        'manage_options',                               // Capability
        'icms-copyright',                               // Menu slug
        'icms_copyright_page_admin'                     // Callable function
    );
}
add_action( 'admin_menu', 'icms_copyright_ajoute_admin_menu' );



/**
 * Injecte le contenu du panneau (argument Callable function de add_menu_page())
 */
function icms_copyright_page_admin() {

    //include();
    // S’il y a un query string icms-copyright-nom, ajoute sa valeur à la db
    if ( isset( $_POST['icms-copyright-nom'] ) ) {
        icms_copyright_update_data();   // Appelle la fonction pour l’appel à la db
    };

    require_once( 'icms-copyright-get-nom.php' );
    $icms_copyright_nom = icms_copyright_get_nom();

    echo '<div style="padding:5vw;">
                <h2>' . get_admin_page_title() . '</h2>
                <form method="post" style="margin-top:25px;">
                    <label for="icms-copyright-nom">' . __( 'Nom : ', 'icms-copyright' ) . '</label>
                    <input type="text" id="icms-copyright-nom" name="icms-copyright-nom" value="' . esc_attr( $icms_copyright_nom ) . '"?>
                    <button type="submit" name="enregistrer">' . __( 'Enregistrer', 'icms-copyright' ) . '</button>
                </form>
            </div>';
}



/**
 * Update le nom à afficher en copyright
 */
function icms_copyright_update_data() {
    global $wpdb;

    $icms_copyright_nom = sanitize_text_field( $_POST['icms-copyright-nom'] );

    $data = [ 'nom' => $icms_copyright_nom ];
    $where = [ 'id' => 1 ];
    $wpdb->UPDATE( ICMS_COPYRIGHT, $data, $where );
}