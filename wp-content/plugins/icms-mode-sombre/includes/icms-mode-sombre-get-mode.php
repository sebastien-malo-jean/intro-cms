<?php
    /**
 * Récupère la valeur de la colonne nom à l'id 1 de la table wp_icms_copyright
 */
function icms_mode_sombre_get_mode() {
    global $wpdb;

    $resultat = $wpdb->get_var( "SELECT mode FROM " . ICMS_MODE_SOMBRE . " WHERE id=1" );
    return $resultat;
}