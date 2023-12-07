<!-- 2.création header -->

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>  <!-- permet à des extensions d’écrire du code au début du body-->

    <header class="header">

        <div class="logo">
            <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
    }
    ?>
        </div>


        <!-- 5. on ajoute notre menu dans le header-->
        <nav class="header-nav">
            <?php
    wp_nav_menu(array(
        'theme_location' => 'main-menu', // Emplacement du menu à afficher
        'container' => 'ul', // Pour généré une ul et non une div comme container
       'menu_class' => 'main-menu', // Classe CSS pour la liste du menu
    ));
    ?>
        </nav>
    </header>