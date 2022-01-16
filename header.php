<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title><?php the_title(); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800&display=swap" rel="stylesheet">

	<link href="<?= get_theme_file_uri() ?>/assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/leaflet.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/style.css">
	<?php wp_head(); ?>
</head>

<?php
	require_once ('detect-mobile/Mobile_Detect.php'); //Detectar se for mobile
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'computer');
	define("DEVICE", $deviceType);
?>

<body <?php body_class(); ?>>

	<header class="elastic">
		<div class="center content-header">

			<?php if (DEVICE == 'mobile') { ?>
				<div class="hamburguer">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div> 
			<?php } ?>

			<a href="<?= get_site_url(); ?>" class="logo"> 
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.jpg" alt="Espaço Berti" title="Espaço Berti">
			</a>
			
			<?php if (DEVICE == 'mobile') { ?>
				<a href="<?= get_site_url(); ?>/entre-em-contato/" class="contact-button">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
				</a>
			<?php } ?>

			<div class="menu box-menu">

				<?php if (DEVICE == 'mobile') { ?>
					<div class="bg-menu"></div>
					<div class="floating-menu">
						<div class="floating-menu-header">
							<p class="title">Todas categorias</p>
							<div class="close-menu">×</div>
						</div>					
				<?php } ?>

				<?php
					$menu = array(
						'menu' => 'Menu Principal', 
						'container' => 'ul',
						'container_id' => 'menu-principal',
						'container_class' => 'menu-header',
					);
					wp_nav_menu($menu); 
				?>

				<?php if (DEVICE == 'mobile') { ?>
					</div>
				<?php } ?>
 					
				<div class="social-header">
					<?php if( have_rows('informacoes_de_contato', 'option') ): ?>
						<?php   while ( have_rows('informacoes_de_contato', 'option') ) : the_row(); ?> 
							<a target="_blank" href="<?php the_sub_field('facebook'); ?>" class="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
							<a target="_blank" href="<?php the_sub_field('instagram'); ?>" class="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a target="_blank" href="<?php the_sub_field('youtube'); ?>" class="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
						<?php endwhile;	?>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</header>
