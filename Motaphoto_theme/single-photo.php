<!-- 8. création de la page article -->
<!-- 8.2 photo et attribut -->
<?php get_header(); ?>
<div class="container">
    <section class="full-screen-section post">

        <div class="photo-details">
            <?php
        $args = array(
            'post_type' => 'photo',
            'p' => get_the_ID(), // Obtient l'ID de la publication actuelle
        );

        $photo_query = new WP_Query($args);

        if ($photo_query->have_posts()) :

 while ($photo_query->have_posts()) : $photo_query->the_post();

        if ( $photo_query->current_post == 0 ) {
            $first_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
        }

        ?>

            <h2><?php the_title(); ?></h2>
            <p>Référence: <?php echo get_post_meta(get_the_ID(), 'reference', true); ?></p>
            <p>Catégorie: <?php the_terms(get_the_ID(), 'categories-photos'); ?></p>
            <p>Format: <?php the_terms(get_the_ID(), 'format'); ?></p>
            <p>Type: <?php echo get_post_meta(get_the_ID(), 'type', true); ?></p>
            <p>Année: <?php echo get_post_meta(get_the_ID(), 'date', true); ?></p>
            <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
        </div>

        <div class="photo-image">
            <?php the_post_thumbnail(); ?>
        </div>

        <!-- 8.3. ajout de la modale via un bouton -->
        <div class="additional-content">
            <?php    $current_photo = $post;?>
            <div class="text-contact-container">
                <p>Cette photo vous intéresse ?</p>
                <a href="#myModal" id="reference-field" class="contact open-modal-link"
                    data-photo-ref="<?php echo esc_attr(get_post_meta(get_the_ID(), 'reference', true)); ?>">Contact</a>
            </div>


        <!-- 8.4/5. photo en miniature -->
            <?php


$previous_photo = get_previous_post();
$next_photo = get_next_post();
?>

            <div class="navigation">
                <!-- Conteneur pour les miniatures -->
                <div id="hover-thumbnail-container">
                    <?php
    // Récupére le post précédent
    $previous_photo = get_previous_post();

    // 8.4. Si l'article précédent existe, afficher sa miniature
    if ($previous_photo) :
        $prev_thumbnail_url = get_the_post_thumbnail_url($previous_photo->ID, 'thumbnail');
        $prev_post_url = get_permalink($previous_photo->ID); // Obtenez l'URL du post précédent
        ?>
                    <!-- La miniature est maintenant affichée dans le conteneur et est cliquable -->
                    <a href="<?php echo esc_url($prev_post_url); ?>"
                        title="<?php echo esc_attr(get_the_title($previous_photo->ID)); ?>">
                        <img src="<?php echo esc_url($prev_thumbnail_url); ?>" class="thumbnail-img" alt="Miniature">
                    </a>
                    <?php endif; ?>
                </div>

                <!-- 8.6. Conteneur pour les flèches -->
                <div class="navigation-links">
                    <!-- Lien précédent -->
                    <?php if ($previous_photo) : ?>
                    <a href="<?php echo get_permalink($previous_photo->ID); ?>" class="nav-link prev-link"
                        data-thumbnail="<?php echo get_the_post_thumbnail_url($previous_photo->ID, 'thumbnail'); ?>"
                        data-postlink="<?php echo get_permalink($previous_photo->ID); ?>">


                        <img src="<?php echo get_template_directory_uri(); ?>/img/arrow_left.png"
                            alt="flèche précédente">
                    </a>

                    <?php endif; ?>

                    <!-- Lien suivant -->
                    <?php if ($next_photo) : ?>
                    <a href="<?php echo get_permalink($next_photo->ID); ?>" class="nav-link next-link"
                        data-thumbnail="<?php echo get_the_post_thumbnail_url($next_photo->ID, 'thumbnail'); ?>"
                        data-postlink="<?php echo get_permalink($next_photo->ID); ?>">


                        <img src="<?php echo get_template_directory_uri(); ?>/img/arrow_right.png"
                            alt="flèche suivante">
                    </a>

                    <?php endif; ?>
                </div>
            </div>
        </div>


    </section>
            
               <!-- 8.7. affichage des photos faisant partie de la méme catégorie -->
    <section class="related-photo-section">
        <div class="photo-appart">

            <h3>Vous aimerez aussi</h3>

            <div class="photo-suggest photo-gallery">
                <?php
    $categories = get_the_terms(get_the_ID(), 'categories-photos'); // catégories du post actuel

    if ($categories) {
        $category_slugs = wp_list_pluck($categories, 'slug'); // slugs des catégories

        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 2,
            'orderby' => 'rand',
            'tax_query' => array(
                array(
                    'taxonomy' => 'categories-photos',
                    'field'    => 'slug',
                    'terms'    => $category_slugs,
                ),
            ),
        );
    }

  
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();
                get_template_part('template-parts/photo_block'); // 9. Appel du block photo pour l'ensemble des photos affichées

            endwhile;
    endif;
    wp_reset_postdata();
?>
            </div>

            <!-- 8.8. bouton charger plus de la catégorie -->
            <button class="load-more" id="load-more-single">Toutes les photos</button>
        </div>




    </section>
</div>

<?php get_footer(); ?>