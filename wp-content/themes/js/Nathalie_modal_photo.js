/* 
   Nom du fichier : modal-scripts-photo.js
   Description : Ce script gère l'affichage et la fermeture de la modal de contact pour une photo unique.
*/
if( jQuery('#Nathalie_bouton_photo').length ){
    // MODAL CONTACT - SINGLE-PHOTO
    var Nathalie_photo_Modal = document.getElementById('Nathalie_Modal-photo');
    var Nathalie_photo_Btn = document.getElementById("Nathalie_bouton_photo");
    var Nathalie_photo_Span = document.getElementsByClassName("fermer-photo")[0];

    // Afficher le modal single-photo
    Nathalie_photo_Btn.onclick = function() {
        Nathalie_photo_Modal.style.display = "block";
    }

    // Masquer le modal single-photo
    Nathalie_photo_Span.onclick = function() {
        Nathalie_photo_Modal.style.display = "none";
    }

    // Fermer le modal single-photo en cliquant en dehors
    window.onclick = function(event) {
        if (event.target == Nathalie_photo_Modal) {
            Nathalie_photo_Modal.style.display = "none";
        }
    }

    // MISE À JOUR DU CHAMP #REF-PHOTO DANS LE FORMULAIRE DE CONTACT 7
    jQuery(document).ready(function($) {
        $("#Nathalie_bouton_photo").on('click', function() {
            // Définissez la valeur de #ref-photo lorsque le bouton est cliqué.
            $("#ref-photo").val(acfReferencePhoto);
        });
    });
    
}