<?php
/**
 * Plugin Name: ICMS Compositions
 * Description: Mes compositions de blocs personalisées
 * Author: Sebastien Malo Jean
 * Version : 1.0
 */

 function icms_compositions() {
    /**
     * Ajouyr la categorie de composition ICMS (ICMS-compositions)
     */
    register_block_pattern_category(
    'icms-compositions', 
    array(
    'label' => __( 'ICMS', 'icms-compositions' ),
    'description' => __( 'Compositions du plugin ICMS Compositions.' )
    )
    );

    /**
     * Ajoute la composition PAragraphe (icms-compositions/paragraphe)
     */
    register_block_pattern(
        'icms-compositions/paragraphe', 
        array(
        'title' => __( 'Paragraphe', 'icms-compositions' ),
        'categories' => array( 'icms-compositions' ),
        'content' => '<!-- wp:paragraph -->
        <p>Lorem ipsum dolor sit amet.</p>
        <!-- /wp:paragraph -->'
        )
       );
       
       $content = '<!-- wp:heading -->
                    <h2 class="wp-block-heading"></h2>
                    <!-- /wp:heading -->
                    
                    <!-- wp:paragraph -->
                    <p>lorem ipsum</p>
                    <!-- /wp:paragraph -->
                    
                    <!-- wp:buttons -->
                    <div class="wp-block-buttons"><!-- wp:button -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">CTA</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons -->';

    /**
     * Ajoute la composition PAragraphe (icms-compositions/paragraphe)
     */
    register_block_pattern(
        'icms-compositions/', 
        array(
        'title' => __( 'Titre | Texte + CTA ', 'icms-compositions' ),
        'categories' => array( 'icms-compositions' ),
        'keywords' => array('ICMS', '2 colonnes', 'CTA', 'texte' ),
        'content' => $content
        )
       );

   }
   add_action( 'init', 'icms_compositions' );