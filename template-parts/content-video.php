<?php

$hill_grid_styled_post = (( hill_get_option('hill_blog_grid_type') == 'on' ) || (isset($_GET['grid']) && $_GET['grid'] == 'on')) ? true : false;

$video_class = ($hill_grid_styled_post) ? '4by3' : '16by9' ;

$videomarkup = get_post_meta(get_the_ID(),'framework-video-markup',true);

if(!empty($videomarkup)){   
?>
<div class="framework-main-loop">
	<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<div class="video">
		    <div class="embed-responsive embed-responsive-<?php echo esc_attr($video_class); ?>"><?php echo wp_kses_post($videomarkup); ?></div>
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