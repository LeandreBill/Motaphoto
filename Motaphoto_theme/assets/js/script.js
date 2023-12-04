// gestion modal contact bis


jQuery(document).ready(function ($) {
    // Sélectionnez le lien dans le <li> avec la classe "contact-link"
    var contactLink = $("li.contact-link > a");
});

    //  3. Sélectionnez la modal par son ID
    var modalContainer = $("#modal-container");
  
    // Gérez l'ouverture de la modal au clic sur le lien
    $(".open-modal-link").click(function (e) {(function (e) {
      e.preventDefault(); // Empêche le lien de suivre son URL
      modalContainer.css("display", "block");
    });

    // 9. Récupérez la référence de la photo depuis l'attribut "data-photo-ref"
      var photoReference = $(this).data("photo-ref");

    // 9. Pré-remplissez le champ "Réf-photo" avec la référence
      $('[name="your-subject"]').val(photoReference);
  
    // Gérez la fermeture de la modal
    modalContainer.find(".close").click(function () {
      modalContainer.css("display", "none");
    });
  
    // Gérez la fermeture de la modal lorsque l'utilisateur clique en dehors de celle-ci
    modalContainer.find("#overlay").click(function () {
      modalContainer.css("display", "none");
      });
  });



  // 9. gestion thumbnail
jQuery(document).ready(function ($) {
  $(".prev-link").hover(
    function () {
      $(".prev-thumbnail").show();
    },
    function () {
      $(".prev-thumbnail").hide();
    }
  );

  $(".next-link").hover(
    function () {
      $(".next-thumbnail").show();
    },
    function () {
      $(".next-thumbnail").hide();
    }
  );
});