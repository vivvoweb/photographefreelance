    <!-- Filtre | Sélectionner  électionner une catégorie -->
<div class="classification">
    <!-- Filtre | Categorie -->
    <label for="classification_category"></label>
<select name="classification_category" id="classification_category">
    <option value="ALL">Sélectionner une catégorie :</option>
    <?php
    // Récupère les catégories de la taxonomie 'categorie' (ou 'category' pour les catégories WordPress par défaut)
    $photo_categories = get_terms('categorie'); // Si vous utilisez les catégories WordPress par défaut, remplacez 'categorie' par 'category'
    
    // Vérifie si des catégories existent et qu'il n'y a pas d'erreur
    if ( !empty($photo_categories) && !is_wp_error($photo_categories) ) {
        // Pour chaque catégorie récupérée, on crée une option dans le menu déroulant
        foreach ($photo_categories as $category) {
            echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
        }
    }
    ?>
</select>

    <!-- Filtre | Sélectionner un format -->
    <label for="classification_format"></label>
<select name="classification_format" id="classification_format">
    <option value="ALL">FORMAT</option>
    <?php
    // Récupérer les termes dans la taxonomie 'format' sans options superflues
    $classification_format_photo = get_terms([
        'taxonomy' => 'format',
        'hide_empty' => false,  // Affiche les formats même si aucun article ne leur est associé
        'orderby' => 'name',    // Trie les formats par nom
        'order' => 'ASC'        // Ordre ascendant
    ]);

    if (!is_wp_error($classification_format_photo) && !empty($classification_format_photo)) {
        foreach ($classification_format_photo as $format) {
            // Echo format name and slug
            echo '<option value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</option>';
        }
    }
    ?>
</select>


    <!-- Filtre | Trier par date -->
    <label for="trier_par_date" aria-label="Trier par date"></label>
<select name="trier_par_date" id="trier_par_date">
    <option value="" disabled selected hidden>TRIER PAR</option>
    <option value="DESC">Du plus récent au plus ancien</option>
    <option value="ASC">Du plus ancien au plus récent</option>
</select>

</div>