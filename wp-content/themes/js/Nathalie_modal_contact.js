    /* 
    Nom du fichier :  modal_contact.js
    Description : Ce script contrôle l'ouverture et la fermeture de la modal de contact située dans l'en-tête du site, offrant ainsi aux utilisateurs un moyen rapide d'accéder au formulaire de contact sans quitter la page.


    */
    // MODALE CONTACT - HEADER
    var headerModal = document.getElementById('myModal');
    var headerBtn = document.getElementById("bouton-ouvrir-modal");
    var headerSpan = document.getElementsByClassName("close")[0];

    // Afficher le modal header
    headerBtn.onclick = function() {
        headerModal.style.display = "block";
    }

    // Masquer le modal header
    headerSpan.onclick = function() {
        headerModal.style.display = "none";
    }

    // Fermer le modal header en cliquant en dehors
    window.onclick = function(event) {
        if (event.target == headerModal) {
            headerModal.style.display = "none";
        }
    }