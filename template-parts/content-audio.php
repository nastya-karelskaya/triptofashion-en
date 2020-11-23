<?php
$audiomarkup = get_post_meta(get_the_ID(),'framework-audio-markup',true);
if(!empty($audiomarkup)){   
?>
<div class="framework-main-loop">
	<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<div class="audio">
		    <div class="embed-responsive embed-responsive-16by9"><?php echo wp_kses_post($audiomarkup); ?></div>
		</div>
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
		</div>
	</article>
</div>
<?php
}