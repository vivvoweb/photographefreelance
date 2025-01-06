<?php
// -----------------------------------------------------------------
// 1. Enregistrement des menus personnalisés
// -----------------------------------------------------------------

// Enregistrer le menu principal
function Nathalie_menu_principal() {
    register_nav_menu('main-menu', __('Menu principal', 'text-domain')); // Enregistre le menu principal
}
add_action('after_setup_theme', 'Nathalie_menu_principal');


// Enregistrer le menu du pied de page
function Nathalie_footer_menu() {
    register_nav_menu('footer-menu', __('Menu du pied de page', 'text-domain')); // Enregistre le menu du pied de page
}
add_action('after_setup_theme', 'Nathalie_footer_menu');



// -----------------------------------------------------------------
// 2. Enregistrement des styles CSS
// -----------------------------------------------------------------

// Enregistrer les feuilles de style CSS
function Nathalie_enqueue_styles() {
    wp_enqueue_style('GlobalNathalie.css', get_template_directory_uri() . '/css/GlobalNathalie.css', array(), '1.0', 'all'); // Style global
    wp_enqueue_style('custom-single-photo-css', get_template_directory_uri() . '/css/single-photo.css', array(), '1.0', 'all'); // Page photo unique
    wp_enqueue_style('classification-photos.css', get_template_directory_uri() . '/css/classification-photos.css', array(), '1.0', 'all'); // Classification des photos
    wp_enqueue_style('lightbox-single-photo', get_template_directory_uri() . '/css/lightbox-single-photo.css', array(), '1.0', 'all'); // Lightbox pour les photos
}
add_action('wp_enqueue_scripts', 'Nathalie_enqueue_styles'); // Ajoute les styles aux pages du site



// -----------------------------------------------------------------
// 3. Enregistrement des scripts JavaScript
// -----------------------------------------------------------------

// Enregistrer les scripts JS
function Nathalie_enqueue_scripts() {
    wp_enqueue_script('Nathalie_header_burger.js', get_template_directory_uri() . '/js/Nathalie_header_burger.js', array('jquery'), '1.1.1', true); // Menu burger
    wp_enqueue_script('Nathalie_modal_contact.js', get_template_directory_uri() . '/js/Nathalie_modal_contact.js', array('jquery'), '1.0', true); // Modale de contact
    wp_enqueue_script('Nathalie_modal_photo', get_template_directory_uri() . '/js/Nathalie_modal_photo.js', array('jquery'), '1.0', true); // Modale photo
    wp_enqueue_script('lightbox-single-photo', get_template_directory_uri() . '/js/lightbox-single-photo.js', array('jquery'), '1.0', true); // Lightbox pour les photos
}
add_action('wp_enqueue_scripts', 'Nathalie_enqueue_scripts'); // Ajoute les scripts aux pages du site



// -----------------------------------------------------------------
// 4. Enregistrement de FontAwesome
// -----------------------------------------------------------------

// Charger FontAwesome pour les icônes
function Nathalie_enqueue_font_awesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'); // Charge FontAwesome via CDN
}
add_action('wp_enqueue_scripts', 'Nathalie_enqueue_font_awesome'); // Ajoute le style FontAwesome



// -----------------------------------------------------------------
// 5. Pagination infinie (Chargement dynamique des publications)
// -----------------------------------------------------------------

// Enregistrer le script pour la pagination infinie
function Nathalie_pagination() {
    wp_enqueue_script('infinite-pagination', get_template_directory_uri() . '/js/infinite-pagination.js', array('jquery'), '', true); // Pagination infinie
    wp_localize_script('infinite-pagination', 'wp_data', array('ajax_url' => admin_url('admin-ajax.php'))); // URL AJAX pour la requête
}
add_action('wp_enqueue_scripts', 'Nathalie_pagination'); // Ajoute le script à la page


// -----------------------------------------------------------------
// 6. Fonction AJAX pour charger les articles (photos) dynamiquement
// -----------------------------------------------------------------

// Fonction pour charger plus de publications (photos)
function load_more_posts() {
    $page = $_GET['page']; // Récupère le numéro de page via GET

    // Configuration des arguments pour la requête WP
    $args_custom_posts = array(
        'post_type' => 'photo',  // Type de publication personnalisé 'photo'
        'posts_per_page' => 12,  // Nombre de publications à charger par page
    );

    // Gestion des filtres de catégorie et de format
    if ($_GET['category'] != NULL && $_GET['category'] != 'ALL' && $_GET['format'] != NULL && $_GET['format'] != 'ALL') {
        // Filtrage par catégorie et format (relation "AND")
        $args_custom_posts['tax_query'] = array(
            'relation' => 'AND', // Relation "ET" entre catégorie et format
            array(
                'taxonomy' => 'categorie', // Taxonomie catégorie
                'field'    => 'slug', 
                'terms'    => $_GET['category'] // Filtre par catégorie
            ),
            array(
                'taxonomy' => 'format', // Taxonomie format
                'field'    => 'slug',
                'terms'    => $_GET['format'] // Filtre par format
            )
        );
    } else {
        // Filtrage par catégorie seul
        if ($_GET['category'] != NULL && $_GET['category'] != 'ALL') {
            $args_custom_posts['tax_query'] = array(
                array(
                    'taxonomy' => 'categorie', // Filtrage par catégorie
                    'field'    => 'slug',
                    'terms'    => $_GET['category']
                )
            );
        }

        // Filtrage par format seul
        if ($_GET['format'] != NULL && $_GET['format'] != 'ALL') {
            $args_custom_posts['tax_query'] = array(
                array(
                    'taxonomy' => 'format', // Filtrage par format
                    'field'    => 'slug',
                    'terms'    => $_GET['format']
                )
            );
        }
    }

    // Trier par date
    $args_custom_posts['orderby'] = 'date'; 
    $args_custom_posts['order'] = $_GET['dateSort'] != 'ALL' ? $_GET['dateSort'] : 'DESC'; // Trier par date (descendant par défaut)
    $args_custom_posts['paged'] = $page; // Utiliser la page demandée pour la pagination

    // Exécuter la requête pour récupérer les articles
    $custom_posts_query = new WP_Query($args_custom_posts);

    // Vérifier si des articles existent
    if ($custom_posts_query->have_posts()) {
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post(); // Préparer l'article suivant
            ?>
            <div class="conteneur-vignettes-accueil_nathalie">
                <div class="nathalie-thumbnails-container">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="nathalie-conteneur-vignette">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); // Afficher la miniature ?>
                                    <div class="nathalie-superposition-vignette">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_eye.png" alt="Icône de l'œil"> <!-- Icône de l'œil -->
                                        <i class="fas fa-expand-arrows-alt fullscreen-icon"></i> <!-- Icône de plein écran -->
                                        <div class="nathalie-info-photo">
                                            <div class="nathalie-photo-gauche">
                                                <p><?php echo esc_html(get_field('reference_photo')); ?></p> <!-- Affiche la référence de la photo -->
                                            </div>
                                            <div class="nathalie-photo-droite">
                                                <p><?php 
                                                    // Affiche les catégories associées à la photo
                                                    $related_categories = get_the_terms(get_the_ID(), 'categorie');
                                                    $related_category_names = array();
                                                    if ($related_categories) {
                                                        foreach ($related_categories as $category) {
                                                            $related_category_names[] = esc_html($category->name);
                                                        }
                                                    }
                                                    echo implode(', ', $related_category_names); 
                                                ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata(); // Réinitialiser les données de la requête
    } else {
        // Message si aucune publication n'est trouvée
        echo 'Aucune publication à afficher.';
    }

    die(); // Terminer le processus AJAX
}

// Associer la fonction AJAX à l'action 'wp_ajax_load_more_posts' (utilisateurs connectés) et 'wp_ajax_nopriv_load_more_posts' (utilisateurs non connectés)
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
