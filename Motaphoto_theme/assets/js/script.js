jQuery(document).ready(function ($) {
    // Sélectionnez le lien dans le <li> avec la classe "contact-link"
    var contactLink = $("li.contact-link > a");
  
    //  3. Sélectionnez la modal par son ID
    var modalContainer = $("#modal-container");
  
    // Gérez l'ouverture de la modal au clic sur le lien
    contactLink.click(function (e) {
      e.preventDefault(); // Empêche le lien de suivre son URL
      modalContainer.css("display", "block");
    });
  
    // Gérez la fermeture de la modal
    modalContainer.find(".close").click(function () {
      modalContainer.css("display", "none");
    });
  
    // Gérez la fermeture de la modal lorsque l'utilisateur clique en dehors de celle-ci
    modalContainer.find("#overlay").click(function () {
      modalContainer.css("display", "none");
      });
  });

  