<?php
 
get_header();




/* Marqueurs de modèles (template tags) communs de WordPress */

if ( have_posts() ) :
?>
<div class="wrapper">
    <?php
    while ( have_posts() ) :
    the_post();
    ?>


    <?php if ( get_the_title() ) : ?>
    <div>
        <h6>Titre</h6>
        <p><?php esc_html( the_title() ); ?>
        <p>
    </div>
    <?php endif; ?>


    <?php if ( get_the_author() ) :  ?>
    <div>
        <h6>Auteur</h6>
        <p><?php esc_html( the_author() ); ?></p>
    </div>
    <?php endif; ?>


    <?php if ( get_the_content() ) : ?>
    <div>
        <h6>Contenu</h6>
        <?php esc_html( the_content() ); ?>
    </div>
    <?php endif; ?>

    <?php


    endwhile;
    endif;


    get_footer();