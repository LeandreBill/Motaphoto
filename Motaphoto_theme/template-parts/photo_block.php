<!-- 10. Creation bloc photo -->

<div class="photo-items" data-photo-id="<?php echo get_the_ID(); ?>">
       <a href="<?php the_permalink(); ?>">
           <!-- Ajout du lien pour la vue de page unique -->
           <?php if (has_post_thumbnail()) : ?>
           <?php the_post_thumbnail(); ?>
           <?php endif; ?>
       </a>
       <div class="photo-icons"
           data-cat="<?php echo esc_attr(get_the_terms(get_the_ID(), 'categories-photos')[0]->name); ?>">
           <a href="<?php echo wp_get_attachment_image_url( get_the_ID(), 'full' ); ?>" class="fullscreen-icon"
               data-reference="<?php echo esc_attr(get_post_meta(get_the_ID(), 'reference', true)); ?>"
               data-image="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" data-title="<?php the_title(); ?>">
           </a>
           <a href="<?php the_permalink(); ?>" class="single-page-icon"></a>
           <div class="photo-infos">
               <p class="photo-title"><?php the_title(); ?></p>
               <p class="photo-cat"><?php the_terms(get_the_ID(), 'categories-photos'); ?></p>
           </div>
       </div>
   </div>

