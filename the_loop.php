<main>
<?php if ( have_posts() ) {
	while ( have_posts() ) : the_post(); ?>
		<!-- //Abrimos elemento o contenedor que contiene la información del post -->
		<article>
			<header>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<div class="the-date"><?php the_date(); ?></div>

				<div class="my-excerpt"><?php the_excerpt(); ?></div>

				<small><?php the_author(); ?></small> · <small><?php the_date(); ?></small>
				<?php comments_popup_link('Ningún Comentario »', '1 Comment »', '% Comments »'); ?>
			</header>


			<?php
			// Nos muestra las imágenes del post
			$args = array( 'post_type' => 'attachment', 'post_parent' => get_the_ID() );
			$attachments = get_posts($args);
			if ($attachments) {
				foreach ($attachments as $attachment) {
					$post_id = $attachment->post_parent;
					echo "<img src='" .wp_get_attachment_url($attachment->ID, 'medium'). "' />";
				}
			}
			?>
			<!-- Imprime un resumen de la entrada -->
			<?php the_excerpt(); ?>

			<footer>
				<small><strong>Etiquetas:</strong>	<?php the_tags("-"); ?>	</small>
				<small><strong>Categorías:</strong> <?php the_category("-"); ?></small>
			</footer>
	</article>
	Aqui va la imagen

<?php endwhile; ?>


<?php }	else { ?>
	<p>NO hay posts</p>
<?php } ?>

</main>