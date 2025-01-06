<div class="hero_nathalie">
    <?php
    // Interrogation | Sélection d'une photo aléatoire de la même catégorie
    // Ici, nous préparons les arguments pour récupérer une seule photo de type 'photo'
    // avec un tri aléatoire
    $args_photos_aleatoire = array(
        'post_type' => 'photo',           // Type de publication à récupérer : 'photo'
        'posts_per_page' => 1,            // Limiter à une seule photo
        'orderby' => 'rand',              // Tri aléatoire des publications
    );

    // Exécution de la requête avec WP_Query pour récupérer les photos
    $photos_aleatoires_query = new WP_Query($args_photos_aleatoire);

    // Boucle | Parcourir les résultats de la requête
    // Si des publications ont été trouvées, on va les afficher
    while ($photos_aleatoires_query->have_posts()) :
        $photos_aleatoires_query->the_post();  // Récupérer chaque publication (photo)
        
        // Obtenir l'URL du lien permanent de la photo actuelle
        $nathalie_post_permalink = get_permalink();
    ?>
    <!-- Lien vers la page de la photo -->
    <a href="<?php echo esc_url($nathalie_post_permalink); ?>">
        <!-- Affichage de l'image d'en-tête avec un fond d'image dynamique -->
        <div class="hero_nathalie-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
            <!-- Image du titre du site (au-dessus de la photo d'en-tête) -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/titre-accueil.png" alt="Titre Accueil">
        </div>
    </a>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); // Réinitialiser | Réinitialise les données de la publication à leur état d'origine ?>
</div>