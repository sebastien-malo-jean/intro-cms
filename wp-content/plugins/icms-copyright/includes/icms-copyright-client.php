<?php


/**
 * Charge le fichier template côté client
 */
function icms_copyright_template() {

    require_once( 'icms-copyright-get-nom.php' );
    $icms_copyright_nom = icms_copyright_get_nom();

    ob_start(); 
    include( dirname( plugin_dir_path( __FILE__ ) ) . '/templates/copyright.php' );
    $template = ob_get_clean();
    echo $template;
}
add_action( 'wp_footer', 'icms_copyright_template' ); 