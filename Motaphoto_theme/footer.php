<!-- 2. Création footer -->

</main>  <!-- 3. appel de la modal dans le footer -->

<?php get_template_part('template-parts/modal/modal');?>
<?php get_template_part('template-parts/lightbox');?>

<footer>
    <nav class="footer-nav">
        <?php
    wp_nav_menu(array(
        'theme_location' => 'footer-menu', // Utilisez l'emplacement 'footer-menu'
        'container' => 'ul', // Pour éviter la création d'une div supplémntaire
        'menu_class' => 'footer-menu', // Classe CSS pour la liste du menu
    ));
    ?>
    </nav>

</footer>

<?php wp_footer(); ?>
</body>

</html>