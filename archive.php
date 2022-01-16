<?php get_header(); ?>

<main class="internas elastic archive" role="main">
	<div class="center">

		<div class="top-infos">
      <h1><?php single_cat_title(); ?></h1>
      <div class="breadcumbs">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
      </div>
    </div>

		<div class="submenu elastic">

			<div class="vejacategorias elastic">
				<?php if (DEVICE != 'mobile') { ?>
					<span class="open-nav menuopen"></span>
					<p class="texto">Todas Categorias</p>
				<?php } else { ?>
					<p class="texto">Todas Categorias</p>
					<span class="open-nav"></span>
				<?php } ?>
			</div>
			<?php
				$term_id = 1;

				$taxonomy_name = 'category';

				$termchildren = get_term_children( $term_id, $taxonomy_name );
			
				echo '<ul>';

				$children = array();
				foreach ($termchildren as $child) {
					$term = get_term_by( 'id', $child, $taxonomy_name );
					$children[$term->name] = $term;
				}
				ksort($children);

				foreach ( $children as $child ) {				   
						$term = get_term_by( 'id', $child->term_id, $taxonomy_name );
					if(!$term->count == 0){
						if($cat_id == $term->term_id){
							echo '<li class="ativomb"><a class="ativo" title="'.$term->name.'" href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
						}else {
							echo '<li><a title="'.$term->name.'" href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
						}
					}
				} 
				echo '</ul>';
			?>
				
		</div>

		<div class="content-page">
			<div class="bloco-artigos">
				<?php get_template_part('content') ;?>
			</div> 
		</div>
	</div>
</main>



<?php get_footer(); ?>
