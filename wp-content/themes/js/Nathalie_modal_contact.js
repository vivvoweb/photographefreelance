/* 
Nom du fichier : modal_contact.js
Description : Ce script contrôle l'ouverture et la fermeture de la modal de contact située dans l'en-tête du site, offrant ainsi aux utilisateurs un moyen rapide d'accéder au formulaire de contact sans quitter la page.
*/

// Récupération des éléments HTML nécessaires
var headerModal = document.getElementById('myModal');  // Modal qui contient le formulaire de contact
var headerBtn = document.getElementById("bouton-ouvrir-modal");  // Bouton qui déclenche l'ouverture de la modal
var headerSpan = document.getElementsByClassName("close")[0];  // L'élément de fermeture de la modal (généralement une croix)

// Affichage de la modal lorsque l'utilisateur clique sur le bouton d'ouverture
headerBtn.onclick = function() {
    headerModal.style.display = "block";  // Change la propriété de style pour afficher la modal
}

// Masquage de la modal lorsque l'utilisateur clique sur le bouton de fermeture (généralement une croix)
headerSpan.onclick = function() {
    headerModal.style.display = "none";  // Change la propriété de style pour masquer la modal
}

// Masquage de la modal lorsque l'utilisateur clique en dehors de la modal (sur l'arrière-plan)
window.onclick = function(event) {
    if (event.target == headerModal) {  // Vérifie si l'événement vient du fond de la modal
        headerModal.style.display = "none";  // Masque la modal si l'utilisateur clique à l'extérieur
    }
}
