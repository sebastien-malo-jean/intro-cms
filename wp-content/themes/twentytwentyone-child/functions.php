<?php
    function twentytwentyonechild_styles() {
wp_enqueue_style( 'twenty-twenty-one-child-style',
 get_stylesheet_uri(),
 array( 'twenty-twenty-one-style' ) );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyonechild_styles' );