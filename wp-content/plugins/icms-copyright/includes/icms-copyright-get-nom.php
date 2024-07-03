<?php


/**
 * Récupère la valeur de la colonne nom à l'id 1 de la table wp_icms_copyright
 */
function icms_copyright_get_nom() {
    global $wpdb;

    $resultat = $wpdb->get_var( "SELECT nom FROM " . ICMS_COPYRIGHT . " WHERE id=1" );
    return $resultat;
}