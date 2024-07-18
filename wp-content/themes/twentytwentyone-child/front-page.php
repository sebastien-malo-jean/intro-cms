<?php
    
    get_header();


    $args = [
        'posts_per_page'    => -1,
        'post_type'     => 'produit',
    ];
    
    // query
    $the_query = new WP_Query( $args );
    
    if( $the_query->have_posts() ): 
    
    
    ?>

<ul>
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
    $champs = get_fields();
    // var_dump($champs);

    $produit_description = $champs['produit_description'];
    $produit_prix = $champs['produit_prix'];
    $produit_image = $champs['produit_image']['url'];?>
    <article>
        <a href="<?php the_permalink(); ?>">
            <img src="<?= $produit_image; ?>" />
            <?php the_title(); ?>
        </a>
    </article>
    <?php endwhile; ?>
</ul>
<?php endif; ?>

<?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>

<?php get_footer();