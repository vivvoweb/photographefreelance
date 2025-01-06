<!-- Bouton pour ouvrir la modale dans l'en-tête -->
<button id="bouton-ouvrir-modal">CONTACT</button>

<!-- Modale - Fenêtre modale pour afficher une photo et un formulaire de contact -->
<div id="myModal" class="modal">
    <!-- Contenu de la modale -->
    <div class="modal-content">
        
        <!-- Bouton pour fermer la modale (généralement un "X") -->
        <span class="close">X</span>
        
        <!-- Image affichée dans la modale, l'URL de l'image est récupérée dynamiquement via WordPress -->
        <img src="<?php echo esc_url(wp_get_attachment_url(55)); ?>" alt="Contact" />

        <!-- Formulaire de contact via Contact Form 7 -->
        <!-- Le shortcode '[contact-form-7 id="b4c5585" title="Formulaire de Contact"]' permet d'afficher un formulaire spécifique -->
        <?php echo do_shortcode('[contact-form-7 id="b4c5585" title="Formulaire de Contact"]'); ?>
    </div>
</div>
