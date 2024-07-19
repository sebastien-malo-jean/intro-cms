<?php

/**
 * Comportements à l'activation du plugin
 */
function icms_mode_sombre_activation() { 

    global $wpdb;
    $table_name = $wpdb->prefix . 'icms_mode_sombre';

    if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name ) { 
        $sql = "CREATE TABLE $table_name (
            id int NOT NULL AUTO_INCREMENT, 
            mode varchar(50) NOT NULL, 
            PRIMARY KEY (id)
        )";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );

        $wpdb->INSERT( $table_name, array( 'mode' => '' ) );
    }
}