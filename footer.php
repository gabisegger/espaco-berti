<footer class="elastic">
  <div class="center content-footer">
    <div class="column box-logo">
      <a href="<?= get_site_url(); ?>" class="logo">
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.jpg" alt="Espaço Berti" title="Espaço Berti">
      </a>

      <div class="social-links">
        <?php if( have_rows('informacoes_de_contato', 'option') ): ?>
          <?php   while ( have_rows('informacoes_de_contato', 'option') ) : the_row(); ?> 
            <a target="_blank" href="<?php the_sub_field('facebook'); ?>" class="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a target="_blank" href="<?php the_sub_field('instagram'); ?>" class="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a target="_blank" href="<?php the_sub_field('youtube'); ?>" class="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
          <?php endwhile;	?>
        <?php endif; ?>
      </div>
    </div>
    <div class="column box-contact">
      <?php if( have_rows('informacoes_de_contato', 'option') ): ?>
        <?php   while ( have_rows('informacoes_de_contato', 'option') ) : the_row(); ?> 
          <div class="contact-items">
            <?php $replacePhone = str_replace(['(', ')', ' ', '-'], '' ,get_sub_field('telefone')); ?>
            <?php $replaceWhats = str_replace(['(', ')', ' ', '-'], '' ,get_sub_field('whatsapp')); ?>
            <a class="tel" target="_blank" href="tel:+55<?= $replacePhone; ?>" rel="noopener"><i class="fa fa-phone" aria-hidden="true"></i> <?php the_sub_field('telefone'); ?></a>
            <a class="whats" target="_blank" href="https://web.whatsapp.com/send?phone=55<?= $replaceWhats; ?>" rel="noopener"><i class="fa fa-whatsapp" aria-hidden="true"></i> <?php the_sub_field('whatsapp'); ?></a>
            <a class="mail" target="_blank" href="mailto:<?php the_sub_field('e-mail'); ?>" rel="noopener"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php the_sub_field('e-mail'); ?></a></a>
          </div>
          <a class="address" target="_blank" href="https://www.google.com/maps/place/<?php the_sub_field('endereco'); ?>"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_sub_field('endereco'); ?></a>
        <?php endwhile;	?>
      <?php endif; ?>
    </div>
  </div>

  <nav class="box-menu">
    <div class="center"> 
      <span>Categorias:</span>
      <?php
        $menu = array(
          'menu' => 'Menu Footer', 
          'container' => 'ul',
          'container_id' => 'menu-footer',
          'container_class' => 'menu-footer',
        );
        wp_nav_menu($menu); 
      ?>
    </div>
  </nav>

  <div class="footer-copyright">
    <p class="copyright">Copyright © <?= currentYear(); ?> Espaço Berti. <?php if (DEVICE == 'mobile') { ?><br/><?php } ?> Todos os direitos reservados. | Desenvolvido por <a href="https://mcaruso.com.br/" target="_blank" rel="noopener">M.Caruso</a></p>
  </div>
</footer>

<?php if( have_rows('informacoes_de_contato', 'option') ): ?>
  <?php   while ( have_rows('informacoes_de_contato', 'option') ) : the_row(); ?> 
    <?php $replaceWhats2 = str_replace(['(', ')', ' ', '-'], '' ,get_sub_field('whatsapp')); ?>
      <a class="floating-whats" target="_blank" href="https://api.whatsapp.com/send?phone=55<?= $replaceWhats2; ?>" rel="noopener"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
    </a>
  <?php endwhile;	?>
<?php endif; ?>

<div class="modal-newsletter-home" style="display: none">
	<div class="modal-bg"></div>
	<div class="modal-box">
		<div class="close">×</div>
		<div class="modal-content">
			<p>Inscreva-se em nossa Newsletter</p>
      <small>E fique por dentro de todas as nossas novidades!</small>
			<?php echo do_shortcode('[contact-form-7 id="156" title="Formulário Newsletter"]'); ?>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/slick.min.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/assets/js/leaflet.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/actions.js"></script>

</body>

</html> 