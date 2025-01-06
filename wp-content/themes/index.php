<?php
/**
 * Modèle de page : nathalie_home */

// Inclure l'en-tête du site
get_header();
?>

<!-- Section | Chargement du hero  -->
        <?php get_template_part( 'template-parts/header/Nathalie_hero' ); ?>

<!-- Inclusion d'un fichier PHP pour les filtres des photos -->
        <?php get_template_part( 'template-parts/post/photos_Filtres' ); ?>

<!-- Section | Bloc de photos -->
<div id="Bloc_de_photos">
    <!-- Inclusion d'un autre fichier PHP pour afficher un bloc de photos -->
	        <?php get_template_part( 'template-parts/post/photo_block' ); ?>

</div>

<!-- Inclure le pied de page du site -->
<?php get_footer(); ?>
