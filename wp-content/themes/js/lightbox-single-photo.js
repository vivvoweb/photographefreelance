/* 
   Nom du fichier : lightbox-single-photo.js
  
Ce script gère la fonctionnalité de la lightbox pour la navigation entre les photos dans une galerie. Il permet à l'utilisateur de visualiser une image dans un modèle (modale) et de naviguer entre les images à l'aide de flèches précédentes et suivantes.
*/

// LIGHTBOX - NAVIGATION PHOTOS 
    // Ajouter une division modale lorsque l'on clique sur une image dans .conteneur-droit
    $('.conteneur-droit img').click(function(){
        // Ajoute la classe 'opened' à la boîte modale
        $('.modal-container').addClass('opened');
        
        // Obtient l'URL de l'image cliquée
        const imageSrc = $(this).attr('src');
        
        // Clone les flèches précédentes et suivantes
        const prevArrow = $('#prev-arrow-link').clone();
        const nextArrow = $('#next-arrow-link').clone();
        
        // Obtient les valeurs de référence et de catégorie à partir de leurs éléments correspondants
        const reference = $('#ph-reference').text();
        const category = $('#ph-category').text();
        
        // Met à jour les éléments de la boîte modale avec les valeurs obtenues
        $('#modal-reference').html(reference);
        $('#modal-category').html(category);
        $('.middle-image').attr('src', imageSrc);
        $('.left-arrow').html(prevArrow);
        $('.right-arrow').html(nextArrow);
        
        // Obtient les liens des flèches précédentes et suivantes
        const refLeft = $('.left-arrow > a').attr('href');
        const refRight = $('.right-arrow > a').attr('href');
        
        // Modifie les liens des flèches pour inclure "?modal=1"
        $('.left-arrow > a').attr('href', refLeft + '?modal=1');
        $('.right-arrow > a').attr('href', refRight + '?modal=1');
        
        // Ajoute "Précédente" à la flèche de gauche si le span n'existe pas encore
        if (!$('.left-arrow > a > span').length) {
            $('.left-arrow > a').append('<span>Précédente</span>');
        }
        
        // Ajoute "Suivante" à la flèche de droite si le span n'existe pas encore
        if (!$('.right-arrow > a > span').length) {
            $('.right-arrow > a').append('<span>Suivante</span>');
        }
    })
    
    // Gestion de la fermeture de la boîte modale lorsque l'on clique sur le bouton de fermeture
    $('.btn-close').click(function(e){
        // Retire la classe 'opened' de la boîte modale pour la fermer
        $('.modal-container').removeClass('opened');
    })
    
    // Obtient la chaîne de requête depuis l'URL actuelle
    var queryString = window.location.search;
    
    // Crée un objet URLSearchParams pour analyser les paramètres de la requête
    var searchParams = new URLSearchParams(queryString);
    
    // Obtient la valeur du paramètre 'modal'
    var modal = searchParams.get('modal');
    
    // Si 'modal' est présent dans l'URL, simule un clic sur une image pour ouvrir la boîte modale
    if( modal ){
        $('.conteneur-droit img').click();
    }
