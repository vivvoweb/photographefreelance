          <!-- Trigger/Ouvrir Modale - Single Photo -->
          <button id="Nathalie_bouton_photo">Contact</button>

<!-- Modale - Single Photo Modale de contact-->
<div id="Nathalie_Modal-photo" class="modal-photo">

    <!-- Contenu Modale - Single Photo -->
    <div class="photo-modal-content">
        <span class="fermer-photo">X</span>
        <img src="<?php echo esc_url(wp_get_attachment_url(55)); ?>" alt="Contact" />
        <!-- Contact Form 7 Shortcode -->
        <?php echo do_shortcode('[contact-form-7 id="b4c5585" title="Contact form 1"]'); ?>
    </div>

</div>