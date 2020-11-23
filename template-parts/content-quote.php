<div class="framework-main-loop">
	<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<?php $quote = get_post_meta(get_the_ID(),'framework-quote',true);
		if(!empty($quote)){
		?>
			<div class="hill_quote_post_type">
			    <label class="dashicons dashicons-format-quote"></label>    
			    <h3><?php print wp_kses_post($quote)?></h3>
			    <h4><a href="<?php echo esc_url(get_post_meta(get_the_ID(),'framework-quote-author-link',true)); ?>"><?php echo esc_html(get_post_meta(get_the_ID(),'framework-quote-author',true))?></a></h4>
			</div>
		<?php }?>

		<div class="framework-per-single-post-no-thumb">
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
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'hill' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'hill' ) . ' </span>%',
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
				
				<?php edit_post_link( esc_html__( 'Edit', 'hill' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->



		</div>
	</article>
</div>