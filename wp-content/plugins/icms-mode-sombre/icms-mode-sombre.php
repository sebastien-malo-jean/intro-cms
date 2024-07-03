<?php
/*
Plugin Name: ICMS Mode Sombre
Description: Ajoute un mode sombre aux thèmes Twenty Twenty-*.
Version: 1.0
Author: Sebastien Malo Jean
*/

/**
 * Exit si accès direct au fichier 
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Défini la constante indentifiant la table créée
 */

function icms_mode_sombre_define_const() {
    if ( !defined( 'ICMS_MODE_SOMBRE' ) ) {
        global $wpdb;
        define ( 'ICMS_MODE_SOMBRE', $wpdb->prefix . 'icms_mode_sombre' );
    }
}
add_action('plugins_loaded', 'icms_mode_sombre_define_const', 0);

/**
 * Charge les comportements à l'activation
 */
require_once( plugin_dir_path( __FILE__ ) . '/includes/icms-mode-sombre-activation.php' );
register_activation_hook( __FILE__, 'icms_mode_sombre_activation' );