<?php
/*
Plugin Name: ICMS Copyright
Description: Ajoute un copyright en bas de page
Version: 1
Author: Simon C-Bouchard
*/


/**
 * Exit si accès direct au fichier 
 */
if ( !defined( 'ABSPATH' ) ){
    exit;
}



/**
 * Défini la constante indentifiant la table créée
 */
function icms_copyright_define_const() {
    if ( !defined( 'ICMS_COPYRIGHT' ) ) {
        global $wpdb;
        define ( 'ICMS_COPYRIGHT', $wpdb->prefix . 'icms_copyright' );
    }
}
add_action('plugins_loaded', 'icms_copyright_define_const', 0);



/**
 * Charge les comportements à l'activation
 */
require_once( plugin_dir_path( __FILE__ ) . '/includes/icms-copyright-activation.php' );
register_activation_hook( __FILE__, 'icms_copyright_activation' );



/**
 * Charge le panneau admin
 */
require_once( plugin_dir_path( __FILE__ ) . '/includes/icms-copyright-panneau-admin.php' );



/**
 * Charge le copyright côté client
 */
require_once( plugin_dir_path( __FILE__ ) . '/includes/icms-copyright-client.php' );



/**
 * Charge le fichier CSS
 */
function icms_copyright_styles() {
    $template = get_option( 'template' );
    if ( $template == 'twentytwentyone' ) {
        $styleFilePath = 'styles/icms-twentytwentyone-styles.css';
    } else {
        $styleFilePath = 'styles/icms-styles.css';
    }

    wp_register_style( 'icms-styles', plugins_url( $styleFilePath, __FILE__  ) );
    wp_enqueue_style( 'icms-styles' );
}
add_action( 'wp_enqueue_scripts', 'icms_copyright_styles' );

