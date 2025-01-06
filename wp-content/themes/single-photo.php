<?php
/**
 * Modèle de page : Photo .
 * Description : Modèle de page pour une photo unique.
 */

// Inclure l'en-tête de la page.
get_header();
?>
<!-- Section | Lightbox Photo -->
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



<main id="main-nathalie" class="espace-principal-nathalie">
    <div class="zone-contenu-single mobile-first">
        <!-- Section | Information de la Photo -->
        <div class="section-gauche">
            <div class="contenu-gauche">
                <!-- Titre de la photo -->
                <h1><?php the_title(); ?></h1>
                
                <?php
                // Référence de la photo
                // Récupère la valeur du champ personnalisé 'reference_photo' et l'affiche s'il existe.
                $reference_photo = get_field('reference');
                if ($reference_photo) {
                    echo '<p>Référence : <span id="ph-reference">' . esc_html($reference_photo) . '</span></p>';
                }

                // Catégories de la photo
                // Récupère les catégories associées à la photo actuelle.
                $categories = get_the_terms(get_the_ID(), 'categorie');
                $current_category_slugs = array(); // Initialise un tableau vide pour les slugs de catégorie.

                if ($categories) {
                    // Parcourt les catégories et stocke leurs slugs dans le tableau.
                    foreach ($categories as $category) {
                        $current_category_slugs[] = $category->slug;
                    }
                }

                if ($categories) {
                    // Si des catégories existent, les afficher.
                    echo '<p>Catégorie : <span id="ph-category">';
                    $category_names = array();
                    foreach ($categories as $category) {
                        $category_names[] = esc_html($category->name);
                    }
                    echo implode(', ', $category_names); // Utilise implode pour joindre les noms de catégorie par une virgule.
                    echo '</span></p>';
                }

                // Format de la photo
                // Récupère les termes de format associés à la photo actuelle.
                $format_terms = get_the_terms(get_the_ID(), 'format');
                if ($format_terms) {
                    // Si des termes de format existent, les afficher.
                    echo '<p>Format : ';
                    $format_names = array();
                    foreach ($format_terms as $format_term) {
                        $format_names[] = esc_html($format_term->name);
                    }
                    echo implode(', ', $format_names); // Utilise implode pour joindre les noms de format par une virgule.
                    echo '</p>';
                }

                // Type de la photo
                // Récupère la valeur du champ personnalisé 'type_de_photo' et l'affiche s'il existe.
                $type_de_photo = get_field('type_de_photo');
                if ($type_de_photo) {
                    echo '<p>Type : ' . esc_html($type_de_photo) . '</p>';
                }

                // L'année de capture
                // Récupère l'année de capture et l'affiche si elle existe.
                $date_capture = get_the_date('Y');
                if ($date_capture) {
                    echo '<p>Année : ' . esc_html($date_capture) . '</p>';
                }
                ?>
            </div>
        </div>
        
        <!-- Section | Photo [data-lightbox="image-gallery"]-->
        <div class="conteneur-droit">
            <!-- Affichage de l'image en vignette -->
            <?php if (has_post_thumbnail()) : ?>
                <!-- Lien vers l'image en taille large -->
                <a data-href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>" class="photo">
                    <?php the_post_thumbnail(); ?>
                </a>
                <!-- Icône fullscreen -->
                <i class="fas fa-expand-arrows-alt fullscreen-icon"></i><!-- Fullscreen icon -->
            <?php endif; ?>
        </div>
    </div>

    <!-- Section | Contact & Navigation Photos -->
    <div class="section_contact_nathalie">
        <!-- Section | Contact - Bouton Modal avec référence -->
        <div class="section-contact-gauche">
            <div class="texte-contact">
                <p>Cette photo vous intéresse ?</p>
            </div>
            <div class="bouton-formulaire-contact">
                <!-- Inclusion du formulaire de contact modal -->
                <?php get_template_part( 'template-parts/modal/Nathalie_contact-modal-photo' ); ?>

                <?php
                // Récupère la valeur du champ personnalisé 'reference_photo' et la définit comme une variable JavaScript.
                $reference_photo = get_field('reference');
                if ($reference_photo) {
                    echo '<script type="text/javascript">';
                    echo 'var acfReferencePhoto = "' . esc_js($reference_photo) . '";';
                    echo '</script>';
                }
                ?>
            </div>
        </div>

        <!-- Section | Contact - Navigation de photos - Flèches & Miniature -->
        <div class="section-contact-droit">
            <?php
            // Récupère l'ID de la publication actuelle.
            $current_post_id = get_the_ID();

            // Récupère toutes les publications de type 'photo'.
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => -1,
                'order' => 'ASC',
            );
            $all_photo_posts = get_posts($args);

            // Trouve l'index de la publication actuelle dans le tableau de toutes les publications de photos.
            $current_post_index = array_search($current_post_id, array_column($all_photo_posts, 'ID'));

            // Calcule les index des publications précédentes et suivantes.
            $prev_post_index = $current_post_index - 1;
            $next_post_index = $current_post_index + 1;

            // Récupère les publications précédentes et suivantes.
            $prev_post = ($prev_post_index >= 0) ? $all_photo_posts[$prev_post_index] : end($all_photo_posts);
            $next_post = ($next_post_index < count($all_photo_posts)) ? $all_photo_posts[$next_post_index] : reset($all_photo_posts);

            $prev_permalink = get_permalink($prev_post);
            $next_permalink = get_permalink($next_post);

            // Récupère les miniatures des publications précédentes et suivantes.
            $prev_thumbnail = get_the_post_thumbnail($prev_post, 'thumbnail');
            $next_thumbnail = get_the_post_thumbnail($next_post, 'thumbnail');
            ?>

            <!-- Conteneur de miniatures individuelles -->
            <div class="conteneur_de_vignettes">
                <div class="nathalie-conteneur-vignette">
                    <!-- Initialement, le contenu de la miniature sera vide -->
                </div>
                <!-- Lien pour la photo précédente -->
                <a href="<?php echo esc_url($prev_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($prev_post, 'thumbnail')); ?>" id="prev-arrow-link">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-gauche.png" alt="Précédent" class="arrow-img-gauche" id="prev-arrow" />
                </a>
                <!-- Lien pour la photo suivante -->
                <a href="<?php echo esc_url($next_permalink); ?>" class="arrow-link" data-thumbnail="<?php echo esc_url(get_the_post_thumbnail_url($next_post, 'thumbnail')); ?>" id="next-arrow-link">
					
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-droite.png" alt="Suivant" class="arrow-img-droite" id="next-arrow" />
                </a>
            </div>
        </div>
    </div>

    <!-- Inclusion de la section des images apparentées -->
    <?php include get_template_directory() . '/template-parts/vous_aimerez_aussi.php'; ?>

</main>

<?php get_footer(); ?>

