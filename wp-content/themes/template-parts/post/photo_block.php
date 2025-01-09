<div class='modal-container'>
    <!-- Bouton fermer -->
    <span class="btn-close">X</span>
    <!-- Fleche -->
    <div class="left-arrow"></div>
    <div>
        <!-- Image | Information de la Photo -->
        <img src="" class="middle-image" />
        <div class="info-photo">
            <span id="modal-reference"></span>
            <span id="modal-category"></span>
        </div>
    </div>
    <!-- Fleche -->
    <div class="right-arrow"></div>
</div>


<!-- Section | Miniatures Personnalisées -->
<div class="vignette-personnalise_nathalie">
			<div class="conteneur-droit">

    <!-- Champ caché pour la gestion de la page actuelle (utilisé pour pagination) -->
    <input type="hidden" name="page" value="1">

    <!-- Conteneur des vignettes d'images -->
    <div class="conteneur-vignettes-accueil_nathalie">
        <?php
        // Arguments de la requête pour récupérer les publications personnalisées
        $args_custom_posts = array(
            'post_type' => 'photo',          // Type de publication personnalisée (ici 'photo')
            'posts_per_page' => 12,           // Limite le nombre de publications affichées à 8
            'orderby' => 'date',             // Trie les publications par date
            'order' => 'DESC',               // Tri décroissant (les plus récentes en premier)
        );        

        // Création de la requête WP_Query avec les arguments définis ci-dessus
        $custom_posts_query = new WP_Query($args_custom_posts);

        // Boucle pour afficher les publications personnalisées
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post();
        ?>

			<div class="nathalie-thumbnails-container">

		<div class="nathalie-conteneur-vignette">
                <i class="fas fa-expand-arrows-alt fullscreen-icon"></i><!-- Fullscreen icon -->


                            <?php the_post_thumbnail(); ?>
					

							                        <a href="<?php the_permalink(); ?>">

                            <!-- Section | Overlay (superposition d'informations au survol) -->
                            <div class="nathalie-superposition-vignette">
                                <!-- Icône de l'œil pour indiquer que l'on peut obtenir plus d'informations -->
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône de l'œil"> 

                                <!-- Icône pour plein écran (envisagée pour un affichage en plein écran de l'image) -->

                                <?php
                                // Récupère la référence photo (champ personnalisé)
                                $related_reference_photo = get_field('reference');   // Récupère la référence de la photo

                                // Récupère les catégories associées à la photo (taxonomie 'categorie')
                                $related_categories = get_the_terms(get_the_ID(), 'categorie');   

                                // Initialise un tableau pour stocker les noms des catégories
                                $related_category_names = array();

                                // Si des catégories sont associées à la photo, les ajouter au tableau
                                if ($related_categories) {
                                    foreach ($related_categories as $category) {
                                        $related_category_names[] = esc_html($category->name);  // Nettoie et ajoute le nom de chaque catégorie
                                    }
                                }
                                ?>

                                <!-- Overlay avec la Référence et les Catégories de la photo -->
                                <div class="nathalie-info-photo">
                                    <div class="nathalie-photo-gauche">
                                        <!-- Affiche la référence de la photo -->
                                        <p><?php echo esc_html($related_reference_photo); ?></p>
                                    </div>
                                    <div class="nathalie-photo-droite">
                                        <!-- Affiche les catégories associées à l'image -->
                                        <p><?php echo implode(', ', $related_category_names); ?></p>
                                    </div>
                                </div>
                            </div>
								
                        </a>  
                    </div>
                <!-- Icône fullscreen -->
        </div>


        <!-- Restauration des données d'origine après la boucle -->
        <?php wp_reset_postdata(); // Rétablir les données de publication d'origine ?>


		<?php endwhile; ?>

		        </div>
	

    <!-- Bouton pour afficher plus de publications -->
    <div class="afficher_toutes_publications">
        <button id="load-more-posts">Voir plus d'images</button>
    </div>
</div>
