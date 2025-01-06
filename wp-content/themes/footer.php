<footer>
    <nav class="footer-menu">
        <?php
        // Implémentation d'un footer avec un menu de pied de page pour le site WordPress
        wp_nav_menu([
            'theme_location' => 'footer-menu', // Spécifie l'emplacement du menu dans le thème
        ]);
        ?>
    </nav>
</footer>

<?php wp_footer(); ?>
</body>
</html>

