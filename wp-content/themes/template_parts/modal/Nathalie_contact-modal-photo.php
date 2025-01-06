<!-- Bouton déclencheur pour afficher le modal -->
<button id="Nathalie_bouton_photo">Contact</button>

<!-- Modale - Fenêtre modale pour afficher une photo et un formulaire de contact -->
<div id="Nathalie_Modal-photo" class="modal-photo">

    <!-- Contenu de la modale - Photo et formulaire de contact -->
    <div class="photo-modal-content">
        
        <!-- Bouton pour fermer la modale (généralement un "X") -->
        <span class="fermer-photo">X</span>

        <!-- Image affichée dans la modale, l'URL de l'image est récupérée dynamiquement via WordPress -->
        <!-- La fonction wp_get_attachment_url(55) récupère l'URL de l'image avec l'ID 55 -->
        <img src="<?php echo esc_url(wp_get_attachment_url(55)); ?>" alt="Contact" />

        <!-- Insertion d'un formulaire de contact avec le shortcode Contact Form 7 -->
        <!-- Le shortcode '[contact-form-7 id="b4c5585" title="Contact form 1"]' permet d'afficher un formulaire spécifique -->
        <?php echo do_shortcode('[contact-form-7 id="b4c5585" title="Contact form 1"]'); ?>
    </div>

</div>
