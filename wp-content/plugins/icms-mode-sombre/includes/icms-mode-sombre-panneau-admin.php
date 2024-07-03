<?php


/**
 * Ajoute un panneau du plugin dans le menu admin
 */
function icms_mode_sombre_ajoute_admin_menu() {
    add_menu_page(
        __( 'ICMS Mode sombre', 'icms-mode-sombre' ),       // Page title
        __( 'ICMS Mode sombre', 'icms-mode-sombre' ),       // Menu title
        'manage_options',                               // Capability
        'icms-mode-sombre',                               // Menu slug
        'icms_mode_sombre_page_admin'                     // Callable function
    );
}
add_action( 'admin_menu', 'icms_mode_sombre_ajoute_admin_menu' );



/**
 * Injecte le contenu du panneau (argument Callable function de add_menu_page())
 */
function icms_mode_sombre_page_admin() {

    //include();
    // S’il y a un query string icms-copyright-nom, ajoute sa valeur à la db
    if ( isset( $_POST['icms-mode-sombre-mode'] ) ) {
        icms_mode_sombre_update_data();// Appelle la fonction pour l’appel à la db
    };

    require_once( 'icms-mode-sombre-get-mode.php' );
    $icms_mode_sombre_mode = icms_mode_sombre_get_mode();

    ?>
<div class="ims-formulaire">
    <h2><?php echo get_admin_page_title(); ?></h2>
    <form method="post">
        <label for="icms-mode-sombre"><?=  __('mode : ','icsm-mode-sombre')?></label>
        <select name="icms-mode-sombre-mode" id="icms-mode-sombre">
            <option value="" selected><?= __(esc_attr($icms_mode_sombre_mode))?></option>
            <option value="sombre-fonce">Mode sombre foncé</option>
            <option value="sombre-leger">Mode sombre léger</option>
            <option value="sombre-bleute">Mode sombre bleuté</option>
            <option value="clair">Mode clair</option>
        </select>

        <button type="submit">Changer</button>
    </form>
</div>
<?php
}

/**
* Update le mode à afficher
*/
function icms_mode_sombre_update_data() {
global $wpdb;

$icms_mode_sombre_mode = sanitize_text_field( $_POST['icms-mode-sombre-mode'] );

$data = [ 'mode' => $icms_mode_sombre_mode ];
$where = [ 'id' => 1 ];
$wpdb->UPDATE( ICMS_MODE_SOMBRE, $data, $where );
}

/**
 * Ajouter une classe CSS au <body> selon le mode récupéré de la base de données
 */
function icms_mode_sombre_add_body_class( $classes ) {
    require_once( 'icms-mode-sombre-get-mode.php' );
    $icms_mode_sombre_mode = icms_mode_sombre_get_mode();
    
    if ( $icms_mode_sombre_mode ) {
        $classes[] = sanitize_html_class( $icms_mode_sombre_mode );
    }
    return $classes;
}
add_filter( 'body_class', 'icms_mode_sombre_add_body_class' );