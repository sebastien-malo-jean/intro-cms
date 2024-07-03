<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$table_name = $wpdb->prefix . 'icms_mode_sombre';
$sql = "DROP TABLE IF EXISTS $table_name;";
$wpdb->query($sql);