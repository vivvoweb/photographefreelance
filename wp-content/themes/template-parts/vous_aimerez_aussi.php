<div class="related-images">
    <!-- Titre de la section qui affiche des photos liées -->
    <h3>VOUS AIMEREZ AUSSI</h3>
    
    <div class="image-container">
        <?php
        // Crée une requête pour récupérer deux photos aléatoires de la même catégorie que la photo actuelle
        $args_related_photos = array(
            'post_type' => 'photo', // Type de contenu (ici 'photo')
            'posts_per_page' => 2,  // Limite à 2 photos
            'orderby' => 'rand',    // Trie les photos de manière aléatoire
            'tax_query' => array(   // Filtre par catégorie
                array(
                    'taxonomy' => 'categorie', // Taxonomie utilisée pour la catégorie
                    'field' => 'slug',         // Utilisation du slug (identifiant) de la catégorie
                    'terms' => $current_category_slugs, // Utilise le slug de la catégorie de la photo actuelle
                ),
            ),
        );

        // Exécute la requête WordPress
        $related_photos_query = new WP_Query($args_related_photos);

        // Boucle pour afficher les photos liées
        while ($related_photos_query->have_posts()) :
            $related_photos_query->the_post(); // Définit les données de la publication actuelle
        ?>
            <div class="related-image">
                <a href="<?php the_permalink(); ?>"> <!-- Lien vers la page de la photo liée -->
                    <?php if (has_post_thumbnail()) : // Vérifie si la photo a une image à la une ?>
                        <div class="image-wrapper">
                            <?php the_post_thumbnail(); ?> <!-- Affiche l'image à la une de la photo -->
                            
                            <!-- Section de superposition pour informations supplémentaires -->
                            <div class="nathalie-superposition-vignette-single">
                                <!-- Icône pour indiquer l'affichage des informations -->
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône de l'œil"> <!-- Icône de l'œil | Information Photo -->
                                <i class="fas fa-expand-arrows-alt fullscreen-icon"></i><!-- Icône plein écran -->
                                
                                <?php
                                // Récupère des informations supplémentaires comme la référence et la catégorie de la photo
                                $related_reference_photo = get_field('reference'); // Champ personnalisé 'reference'
                                $related_categories = get_the_terms(get_the_ID(), 'categorie'); // Récupère les termes (catégories) associés à la photo
                                $related_category_names = array(); // Tableau pour stocker les noms des catégories

                                if ($related_categories) { // Si des catégories existent
                                    foreach ($related_categories as $category) {
                                        $related_category_names[] = esc_html($category->name); // Ajoute chaque nom de catégorie
                                    }
                                }
                                ?>
                                
                                <!-- Affichage des informations liées à la photo -->
                                <div class="nathalie-info-photo">
                                    <div class="nathalie-photo-gauche">
                                        <p><?php echo esc_html($related_reference_photo); ?></p> <!-- Affiche la référence de la photo -->
                                    </div>
                                    <div class="nathalie-photo-droite">
                                        <p><?php echo implode(', ', $related_category_names); ?></p> <!-- Affiche les catégories associées -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); // Restaure les données originales des publications ?>
    </div>

    <!-- Bouton pour rediriger l'utilisateur vers la page d'accueil -->
    <div class="home-button">
        <a href="<?php echo home_url(); ?>" class="button">Toutes les photos</a> <!-- Lien vers l'accueil -->
    </div>
</div>
