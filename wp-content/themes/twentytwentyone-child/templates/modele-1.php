<?php
/* Template Name: Modele 1*/
 
 
get_header();
 
echo "Modele 1!";
/* Start the Loop */
while ( have_posts() ) :
    the_post();
    get_template_part( 'template-parts/content/content-page' );
 
    // If comments are open or there is at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
endwhile; // End of the loop.
 
get_footer();