<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nathalie Mota</title>
    <meta name="description" content="Site Photographe Freelance">
    <meta name="keywords" content="Nathalie Mota">
    <meta name="author" content="RACHID ICHOU">
    
    <!-- Fichiers CSS ici -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/GlobalNathalie.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.ico'); ?>" type="image/x-icon">
    
    <?php wp_head(); // Ajoute | Scripts & Styles WordPress à l'en-tête ?>
</head>
<body>
    <!-- Section d'en-tête -->
    <header>
        <!-- Logo de l'en-tête -->
        <div class="header-logo">
            <?php
// Récupérer l'ID du logo personnalisé
$custom_logo_id = get_theme_mod('custom_logo');

// Vérifier si un logo personnalisé a été défini
if ($custom_logo_id) {
    // Récupérer l'URL du logo
    $logo_url = wp_get_attachment_image_src($custom_logo_id, 'full')[0];
} else {
    // Si aucun logo personnalisé n'a été défini, utiliser un logo par défaut
    $logo_url = get_template_directory_uri() . '/assets/images/logo-motaphoto.png';
}
?>

<a href="<?php echo home_url(); ?>">
    <img src="<?php echo esc_url($logo_url); ?>" alt="Logo de Nathalie Mota, Photographe Freelance">
</a>

        </div>

        <!-- Bouton | Menu Mobile -->
        <div class="mobile-menu-button" id="open-fullscreen-menu-button" aria-label="Ouvrir le menu mobile">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        
        <!-- Menu de l'en-tête -->
        <nav class="Nathalie_main-navigation">
            <div class="btn-fermeture">
                <!-- Conteneur du logo -->
                <div class="Nathalie_section-logo

">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo esc_url($logo[0]); ?>" alt="Logo">
                    </a>
                </div>
                <button id="close-fullscreen-menu-button" class="close-button">X</button>
            </div>
            <?php
            // Affiche | Menu de navigation en utilisant un emplacement de thème nommé 'main-menu'
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false
            ]);
            ?>
							        <?php get_template_part( 'template-parts/modal/Nathalie_header_contact-modal' ); ?>

        </nav>
    </header>
</body>
</html>
