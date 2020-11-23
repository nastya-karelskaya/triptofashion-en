<div class="framework-main-loop">
	<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<?php
		$linktitle = get_post_meta(get_the_ID(),'framework-link-title',true);
		$link = get_post_meta(get_the_ID(),'framework-link',true);
		if(!empty($linktitle) && !empty($link)){
		?>

		<div class="hill_link">
		    <label class="dashicons dashicons-admin-links"></label><h3><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($linktitle)?></a></h3>
		</div>
		<?php }?>
		<div class="framework-per-single-post-no-thumb" >
			<div class="entry-meta">
				<?php hill_entry_meta(); ?>
			</div>

			<header class="entry-header">
				<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' .esc_html__( 'Pages:', 'hill' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' .esc_html__( 'Page', 'hill' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				?>
			</div><!-- .entry-content -->

			<?php
				// Author bio.
				if ( is_single() && get_the_author_meta( 'description' ) ) :
					get_template_part( 'author-bio' );
				endif;
			?>

			<footer class="entry-footer">
				
				<?php edit_post_link(esc_html__( 'Edit', 'hill' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->



		</div>
	</article>
</div>