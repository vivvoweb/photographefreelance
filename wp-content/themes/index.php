<?php get_header(); ?>

<main>
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      // Afficher le contenu de l'article
      the_content();
    endwhile;
  else :
    echo 'Aucun contenu trouvé';
  endif;
  ?>
</main>

<?php get_footer(); ?>
