<?php get_header(); /* Template Name: Detalhe do Serviço */ ?>

<main class="elastic page-service">
  <div class="center">

    <div class="top-infos">
      <h1><?= get_the_title(); ?></h1>
      <div class="breadcumbs">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
      </div>
    </div>

    
    <div class="service-description">
      <div class="left-content">
        <?php the_post_thumbnail(); ?>
      </div>
      <?php if( have_rows('detalhe_do_servico') ): ?>
        <?php   while ( have_rows('detalhe_do_servico') ) : the_row(); ?> 
          <div class="right-content">
            <h2>Detalhes do serviço</h2>
            <?php the_sub_field('descricao'); ?>
          </div>
        <?php endwhile;	?>
      <?php endif; ?>
    </div>
    <div class="contact-form">
      <h2>Tire suas dúvidas</h2>
      <?php echo do_shortcode('[contact-form-7 id="13" title="Formulário de Contato Serviço"]'); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>