<div class="post-blog">
	<?php while ( have_posts() ) : the_post(); ?>
		<article>
			<div class="post-info">
				<div class="post-thumb">
					<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
						<?php if(has_post_thumbnail() == 'noticias'): ?>
							<?php the_post_thumbnail('noticias'); ?>
						<?php else: ?>
							<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/imagens/img-padrao-blog.jpg" alt="<?php the_title(); ?>">
						<?php endif; ?>
					</a>
				</div>
				<div class="informacoes">
					<div class="post-details"><?= the_category() ?> | <?= get_the_date() ?></div>
					<h3><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
					<div class="descricao">
						<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo wp_trim_words( get_the_content(), 16 ); ?></a>
					</div>
					<div class="botao">
						<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="text">
							<span class="btn-over"></span><span class="button-see-more">Ler Mais</span>
						</a>
					</div>
				</div>
			</div>
		</article>
	<?php endwhile; ?>
</div>