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
