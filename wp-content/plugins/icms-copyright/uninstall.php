<?php


// Si uninstall.php n’est pas appelé par WordPress, die
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

global $wpdb;
$table_name = $wpdb->prefix . 'icms_copyright';
$wpdb->query( "DROP TABLE IF EXISTS $table_name" );