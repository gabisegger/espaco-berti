<?php get_header(); /* Template Name: Página de Contato */ ?> 

<main class="elastic page-contact">
  <div class="center">

    <div class="top-infos">
      <h1>Entre em contato</h1>
      <div class="breadcumbs">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
      </div>
    </div>

    <div class="center">
      <div class="contact-form">
        <?php echo do_shortcode('[contact-form-7 id="51" title="Formulário de Contato"]'); ?>
      </div>

      <div class="contact-infos">

        <div class="left">
          <div id="mapid"></div> 
        </div>

        <div class="right">
          <div class="contact-items">
            <p class="title">Informações de contato:</p>
            <?php if( have_rows('informacoes_de_contato', 'option') ): ?>
              <?php   while ( have_rows('informacoes_de_contato', 'option') ) : the_row(); ?> 
                <?php $replacePhone = str_replace(['(', ')', ' ', '-'], '' ,get_sub_field('telefone')); ?>
                <?php $replaceWhats = str_replace(['(', ')', ' ', '-'], '' ,get_sub_field('whatsapp')); ?>
                <a class="tel" target="_blank" href="tel:+55<?= $replacePhone; ?>" rel="noopener"><i class="fa fa-phone" aria-hidden="true"></i> <?php the_sub_field('telefone'); ?></a>
                <a class="whats" target="_blank" href="https://web.whatsapp.com/send?phone=55<?= $replaceWhats; ?>" rel="noopener"><i class="fa fa-whatsapp" aria-hidden="true"></i> <?php the_sub_field('whatsapp'); ?></a>
                <a class="mail" target="_blank" href="mailto:<?php the_sub_field('e-mail'); ?>" rel="noopener"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php the_sub_field('e-mail'); ?></a></a>
                <a class="address" target="_blank" href="https://www.google.com/maps/place/<?php the_sub_field('endereco'); ?>"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_sub_field('endereco'); ?></a>

                <p class="opening-hours">
                  <span class="line"><i class="fa fa-clock-o" aria-hidden="true"></i> HORÁRIO DE FUNCIONAMENTO</span>
                  <span class="line"><?php the_sub_field('horario_de_funcionamento'); ?></span>
                  <small>*Horários especiais, agendar diretamente através de nossos telefones</small>
                </p>
              <?php endwhile;	?>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>

  </div>
</main>

<script>
  document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '<?= get_site_url(); ?>/obrigado';
  }, false );
</script>

<?php get_footer(); ?>