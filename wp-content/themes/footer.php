<footer>
    <nav class="footer-menu">
        <?php
        // Affiche le menu de pied de page WordPress
        wp_nav_menu([
            'theme_location' => 'footer-menu', // Spécifie l'emplacement du menu dans le thème
        ]);
        ?>
    </nav>
</footer>
<?php wp_footer(); ?>
<?php get_template_part('template_parts/modal/Nathalie_contact-modal-photo.php'); ?>

</body>
</html>

