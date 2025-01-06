<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enregistre une feuille de style principale
 */
function mytheme_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

/**
 * Active le support des images mises en avant
 */
function mytheme_setup() {
    add_theme_support('post-thumbnails'); // Active les images mises en avant
}
add_action('after_setup_theme', 'mytheme_setup');
