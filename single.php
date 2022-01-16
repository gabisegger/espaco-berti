<?php get_header(); global $post; ?>

<main id="blog" class="elastic page-article">
	<div class="center">
		<div class="content-page elastic">
			<div class="top-infos">

				<div class="post-details"><?= the_category() ?> | <?= get_the_date() ?></div>

				<h1><?php the_title(); ?></h1>

				<div class="breadcumbs">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
					?>
				</div>

				<div class="redes-sociais">
					<ul>
						<li class="facebook">
							<a href="http://facebook.com/share.php?u=<?php the_permalink() ?>&t=<?php echo urlencode(the_title('','', false)) ?>" target="_blank" title="Compartilhar <?php the_title();?> no Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li class="linkedin">
							<a href="https://www.linkedin.com/cws/share?url=<?php the_permalink() ?>" target="_blank" title="Compartilhar <?php the_title();?> no Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</li>
						<?php if (DEVICE != 'mobile') {?>
							<li class="whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?text=<?php the_permalink() ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
						<?php } else { ?>
							<li class="whatsapp"><a href="whatsapp://send?text=<?php the_permalink() ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
						<?php } ?>
						<li class="email"><a href="mailto:digite o destino?subject=<?php the_title('','',true); ?>&body=<?php the_title('','',true); ?>&#32;&#32;<?php the_permalink(); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
					</ul>
				</div>

			</div>
			<div class="block-1 elastic">

				<div class="article-description elastic">
					
					<div class="descricao elastic">
						<?php
							if ( have_posts() ) : while ( have_posts() ) : the_post();
								the_content();
							endwhile;
							endif;
						?>
					</div>
				</div>

			</div>

			<div class="block-2 elastic">
				<?php
				$categories = get_the_category();
				$category_id = $categories[0]->cat_ID;
				$currentID = get_the_ID();
				global $post;
				$args = array( 'numberposts' => 3, 'post__not_in' => array (get_the_ID()), 'category' => $category_id );
				$myposts = get_posts( $args ); ?>

				<div class="veja-tambem elastic">
					<h2 class="title">Leia também</h2>

				<div class="ct-blog elastic">
					<?php foreach( $myposts as $post ): setup_postdata($post);  ?>

						<article>
							<div class="entry-info">
								<div class="entry-thumb">
									<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
										<?php if(has_post_thumbnail() == 'noticias'): ?>
											<?php the_post_thumbnail('noticias'); ?>
										<?php else: ?>
											<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/imagens/img-padrao-blog.jpg" alt="<?php the_title(); ?>">
										<?php endif; ?>
									</a>
								</div>
								<div class="informacoes">
									<h3><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
									<div class="descricao"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo wp_trim_words( get_the_content(), 10 ); ?></a></div>
									<div class="botao botaoeffect">
										<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="text">
											<span class="btn-over"></span><span class="button-see-more">Ler Mais</span>
										</a>
										<span class="btn-cover btn-cover-red btn-cover-fx"></span>
									</div>
								</div>
							</div>
						</article>

					<?php endforeach; wp_reset_postdata(); ?>
				</div>
				</div>
			</div>

		</div>
	</div>
	
	<div class="center">
		<div class="submenu elastic">

			<div class="vejacategorias elastic">
				<span class="open-nav menuopen"></span>
				<p class="texto">Todas Categorias</p>
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
	</div>
</main>

<?php get_footer(); ?>