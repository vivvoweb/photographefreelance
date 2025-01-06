<?php
// Empêcher l'accès direct au fichier
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


// Enregistrer les scripts JS
function Nathalie_enqueue_scripts() {
    
    wp_enqueue_script('Nathalie_modal_contact.js', get_template_directory_uri() . '/js/Nathalie_modal_contact.js', array('jquery'), '1.0', true); // Modale de contact
    
}
add_action('wp_enqueue_scripts', 'Nathalie_enqueue_scripts'); // Ajoute les scripts aux pages du site
