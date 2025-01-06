<?php
/**
 * Modèle de page : Photo .
 * Description : Modèle de page pour une photo unique.
 */
// Inclure l'en-tête de la page.
get_header();
?>
<!-- Section | Lightbox Photo -->
<div class='modal-container'>
    <!-- Bouton fermer -->
    <span class="btn-close">X</span>
    <!-- Fleche -->
    <div class="left-arrow"></div>
    <div>
        <!-- Image | Information de la Photo -->
        <img src="" class="middle-image" />
        <div class="info-photo">
            <span id="modal-reference"></span>
            <span id="modal-category"></span>
        </div>
    </div>
    <!-- Fleche -->
    <div class="right-arrow"></div>
</div>



<?php get_footer(); ?>

