<!-- 7. Création de la page d'acceuil -->

<?php get_header(); ?>

<!-- 7.1 Hero -->
<section class="hero">
    <div class="photo-hero">
        <?php
                $args = array(
                    'post_type' => 'photo',
                    'posts_per_page' => 1,
                    'orderby' => 'rand',
                );

                $loop = new WP_Query($args);

                while ($loop->have_posts()) : $loop->the_post();
                    the_post_thumbnail();
                endwhile;
                wp_reset_postdata();
                ?>
        <h2>photographe event </h2>
    </div>

</section>

<!-- 7.2. Filtres des photos -->
<section class="gallery container">
    <div class="filter-options">
        <form id="filter-form" method="GET">

            <!-- Pour les catégories -->
            <select name="category_filter">

                <option value="">Catégories</option>

                <?php
            $categories = get_terms('categories-photos');
            foreach ($categories as $category) {
                echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
            }
            ?>
            </select>

            <!-- Pour les formats -->
            <select name="format_filter">
                <option value="">Formats</option>
                <?php
            $formats = get_terms('format');
            foreach ($formats as $format) {
                echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
            }
            ?>
            </select>

            <!-- Pour la date -->
            <select name="sort_order">
                <option value="">Date </option>
                <option value="date-DESC">Plus récent au plus ancien</option>
                <option value="date-ASC">Plus ancien au plus récent</option>
                    </a>
            </select>

        </form>
    </div>

    <div class="photo-gallery">
        <?php

$photo_ids = array();

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'orderby' => 'date',
		'order'=> 'DESC',
		'paged'=> 1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('template-parts/photo_block'); // 9. Appel du block photo pour l'ensemble des photos affichées

			  // Récupére l'ID de la photo et ajoute au tableau
        $photo_id = get_the_ID();
        $photo_ids[] = $photo_id;
        endwhile;
    endif;
    wp_reset_postdata();


    ?>
    </div>

<!-- 7.4. chargez les photos -->
    <button class="load-more" id="load-more">Charger plus</button>
</section>


<?php get_footer(); ?>