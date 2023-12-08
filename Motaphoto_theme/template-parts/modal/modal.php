<!-- 3. création de la modal pour popup maker avec id myModal  -->
<div class="modal-container" id="modal-container">
<div class="overlay" id="overlay"></div> <!-- Couche semi-transparente -->
    <div id="myModal" class="modal">
 
        <img src="<?php echo get_bloginfo('template_url') ?>/img/contact.png" class="modal-header" alt="banderolle contact"> 
            <!-- Contenu de l'en-tête de la modal -->
            
        <div class="modal-content">
            <?php echo do_shortcode('[contact-form-7 id="4b5a5d3" class="wpcf7" title="Formulaire de contact Motaphoto]'); ?>
        </div>
    </div>
</div>