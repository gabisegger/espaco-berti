<?php get_header(); /* Template Name: Home */ ?>

<main class="elastic">
  <?php if( have_rows('home') ): ?>
    <?php   while ( have_rows('home') ) : the_row(); ?> 
      <div class="block-1 full-banner">
        <div class="center">
          <ul class="banners">
            <?php if( have_rows('bloco_1_full_banner') ): ?>
              <?php   while ( have_rows('bloco_1_full_banner') ) : the_row(); ?> 
                <?php if (DEVICE == 'mobile') { ?>
                  <?php if( have_rows('mobile') ): ?>
                    <?php   while ( have_rows('mobile') ) : the_row(); ?> 
                      <li>
                        <a href="<?php the_sub_field('link_banner'); ?>">
                          <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo_banner'); ?>" title="<?php the_sub_field('titulo_banner'); ?>" />
                        </a>
                      </li>
                    <?php endwhile;	?>
                  <?php endif; ?>
                <?php } else { ?>
                  <?php if( have_rows('desktop') ): ?>
                    <?php   while ( have_rows('desktop') ) : the_row(); ?> 
                      <li>
                        <a href="<?php the_sub_field('link_banner'); ?>">
                          <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo_banner'); ?>" title="<?php the_sub_field('titulo_banner'); ?>" />
                        </a>
                      </li>
                    <?php endwhile;	?>
                  <?php endif; ?>
                <?php } ?>
              <?php endwhile;	?>
            <?php endif; ?>
          </ul>
        </div>
      </div>

      <hr>

      <div class="block-2">
        <div id="quem-somos" class="center know-us">
          <?php if( have_rows('bloco_2_quem_somos') ): ?>
            <?php   while ( have_rows('bloco_2_quem_somos') ) : the_row(); ?> 
              <div class="left">
                <h2><?php the_sub_field('titulo'); ?></h2>
                <div class="description">
                  <?php the_sub_field('conteudo'); ?>
                </div>
              </div>
              <div class="right">
                <img src="<?php the_sub_field('banner'); ?>" alt="<?php the_sub_field('titulo'); ?>" title="<?php the_sub_field('titulo'); ?>" />
              </div>
            <?php endwhile;	?>
          <?php endif; ?>
        </div>
      </div>

      <hr>

      <div class="block-3">
        <div class="center services">
          <?php if( have_rows('bloco_3_procedimentos') ): ?>
            <?php   while ( have_rows('bloco_3_procedimentos') ) : the_row(); ?> 
              <h2><?php the_sub_field('titulo'); ?></h2>
              <h3><?php the_sub_field('subtitulo'); ?></h3>

              <?php /*
              <div class="services-box">
                <?php
                  $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = 23    AND post_type = 'page' ORDER BY menu_order", 'OBJECT');
                  if ( $child_pages ) : foreach ( $child_pages as $key=>$pageChild ) : setup_postdata( $pageChild );
                ?>
                  <?php $variable = get_field('exibir_na_home', $pageChild->ID); ?>
                  <?php if($variable === true) { ?>
                    <?php $key += 1; ?>
                    <?php if($key <= 6) { ?>
                      <div class="service-item">
                        <div class="img-service">
                          <?php echo get_the_post_thumbnail($pageChild->ID, 'thumbnail'); ?>
                        </div>
                        <div class="content-service">
                          <h3><?php echo $pageChild->post_title; ?></h3>
                          <p><?php the_content($pageChild->ID); ?></p>
                          <a href="<?php echo  get_permalink($pageChild->ID); ?>">Quero Conhecer</a>
                        </div>
                      </div>
                    <?php } else {
                      break;
                    } ?>
                  <?php } ?>
                <?php endforeach; endif; ?>
              </div>
              */ ?>

              <div class="services-box">
                <?php
                  $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = 23    AND post_type = 'page' ORDER BY menu_order", 'OBJECT');
                  if ( $child_pages ) : foreach ( $child_pages as $key=>$pageChild ) : setup_postdata( $pageChild );
                ?>
                  <?php $variable = get_field('exibir_na_home', $pageChild->ID); ?>

                  <?php if($variable === true) { ?>
                    <div class="service-item">
                      <div class="img-service">
                        <?php echo get_the_post_thumbnail($pageChild->ID, 'thumbnail'); ?>
                      </div>
                      <div class="content-service">
                        <h3><?php echo $pageChild->post_title; ?></h3>
                        <p><?php the_content($pageChild->ID); ?></p>
                        <a href="<?php echo  get_permalink($pageChild->ID); ?>">Quero Conhecer</a>
                      </div>
                    </div>
                  <?php } ?>
 
                <?php endforeach; endif; ?>
              </div>

              <a href="<?= get_site_url(); ?>/procedimentos" class="see-all-services">Ver todos os procedimentos</a>
            <?php endwhile;	?>
          <?php endif; ?>
        </div>
      </div>

      <hr>

      <div class="block-4">
        <div class="center our-space">
          <?php if( have_rows('bloco_4_nosso_espaco') ): ?>
            <?php   while ( have_rows('bloco_4_nosso_espaco') ) : the_row(); ?> 
              <?php $titulo = get_sub_field('titulo'); ?>
              <h2><?php the_sub_field('titulo'); ?></h2>
              <h3><?php the_sub_field('subtitulo'); ?></h3>
              <div class="grid-gallery">
                <span class="fake-item"></span><span class="fake-item"></span><span class="fake-item"></span><span class="fake-item"></span><span class="fake-item"></span><span class="fake-item"></span>
                
                <?php if( have_rows('imagens') ): ?>
                  <?php   while ( have_rows('imagens') ) : the_row(); ?> 
                    <div class="item">
                      <div class="image">
                        <img src="<?php the_sub_field('imagem'); ?>" alt="<?= $titulo; ?>" title="<?= $titulo; ?>">
                      </div>
                    </div>
                  <?php endwhile;	?>
                <?php endif; ?>
              </div>
            <?php endwhile;	?>
          <?php endif; ?>
        </div>
      </div>

      <hr>

      <div class="block-5">
        <div class="center gift-card">
          <?php if( have_rows('bloco_5_vale_presentes') ): ?>
            <?php   while ( have_rows('bloco_5_vale_presentes') ) : the_row(); ?> 
              <div class="content-left">
                <img src="<?php the_sub_field('imagem_esquerda'); ?>" alt="<?php the_sub_field('titulo'); ?>">
              </div>
              <div class="content-center">
                <h2><?php the_sub_field('titulo'); ?></h2>
                <?php if( have_rows('texto') ): ?>
                  <?php   while ( have_rows('texto') ) : the_row(); ?> 
                    <p><?php the_sub_field('paragrafo'); ?></p>
                  <?php endwhile;	?>
                <?php endif; ?>
              </div>
              <div class="content-right">
                <img src="<?php the_sub_field('imagem_direita'); ?>" alt="<?php the_sub_field('titulo'); ?>">
              </div>
            <?php endwhile;	?>
          <?php endif; ?>
        </div>
      </div>
    <?php endwhile;	?>
  <?php endif; ?>
</main>

<?php get_footer(); ?> 