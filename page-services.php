<?php get_header(); /* Template Name: Página de Procedimentos */ ?>

<main class="elastic page-services">
  <div class="center">

    <div class="top-infos">
      <h1>Procedimentos</h1>
      <div class="breadcumbs">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
      </div>
    </div>

    <div class="center">
      <div class="subcategories">

        <?php
          $child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID."    AND post_type = 'page' ORDER BY menu_order", 'OBJECT');
          if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild );
        ?>
          <a href="<?php echo  get_permalink($pageChild->ID); ?>" class="service-item">
            <div class="img-service">
              <?php echo get_the_post_thumbnail($pageChild->ID, 'thumbnail'); ?>
            </div>
            <div class="content-service">
              <h3><?php echo $pageChild->post_title; ?></h3>
              <div class="text">
                <?php echo $pageChild->post_content; ?>
              </div> 
            </div>
            <?php /*
            <?php the_content($pageChild->ID); ?>
            */ ?>
          </a>
        <?php endforeach; endif; ?>

      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>