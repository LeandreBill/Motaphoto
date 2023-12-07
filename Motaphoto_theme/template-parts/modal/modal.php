<!-- 3. création de la modal pour popup maker avec id myModal  -->
<div class="modal-container" id="modal-container">
<div class="overlay" id="overlay"></div> <!-- Couche semi-transparente -->
    <div id="myModal" class="modal">
        <div class="modal-header">
        <img src="<?php echo get_template_directory_uri() . '/wp-content/themes/Motaphoto_theme/img/contact_header.png' ?>"
    alt="Titre contact"
    width="100%" />
            <!-- Contenu de l'en-tête de la modal -->
        </div>
        <div class="modal-content">
            <?php echo do_shortcode('[contact-form-7 id="4b5a5d3" class="wpcf7" title="Formulaire de contact Motaphoto]'); ?>
        </div>
    </div>
</div>