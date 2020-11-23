<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hill-theme
 */

get_header('2'); ?>

<div class="container hil_container">

<div class="row">
	
	<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			
			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php if ( is_single() ): ?>
				<div class="framework-single-article">
					<?php
						the_content( sprintf(
						esc_html__( 'Continue reading %s', 'hill' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );
					
					the_tags('<div class="hill-tagcloud-box"><h3 class="hill-title-tagcloud">'.esc_html__('Post Tags', 'hill').'</h3>', '', '</div>');

					$author_desc = get_the_author_meta( 'description' );
					if($author_desc):
						
					?>
					<div class="hill-about-author-box">
						<?php if(
							get_the_author_meta( 'facebook' ) ||
							get_the_author_meta( 'twitter' ) ||
							get_the_author_meta( 'googleplus' ) ||
							get_the_author_meta( 'url' )
						): ?>
						<div class="hill-author-social-box">
							<ul class="list-unstyled footer-social-media">
		                        <?php if(get_the_author_meta( 'facebook' )): ?><li><a href="<?php echo get_the_author_meta( 'facebook' ); ?>"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
		                        <?php if(get_the_author_meta( 'twitter' )): ?><li><a href="http://twitter.com/<?php echo get_the_author_meta( 'twitter' ); ?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
		                        <?php if(get_the_author_meta( 'googleplus' )): ?><li><a href="<?php echo get_the_author_meta( 'googleplus' ); ?>"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
		                        <?php if(get_the_author_meta( 'url' )): ?><li><a href="<?php echo get_the_author_meta( 'url' ); ?>"><i class="fa fa-globe"></i></a></li><?php endif; ?>
		                    </ul>
						</div>
						<?php endif; ?>
						<h4 class="hill-about-author"><?php esc_html_e('About Author', 'hill'); ?></h4>
						<p><?php print wp_kses_post($author_desc); ?></p>	
					</div>
					<?php endif; ?>

					<?php hill_related_posts(); ?>
					
					<?php
						$prev_post = get_adjacent_post( false, '', true, 'category' );
						$next_post = get_adjacent_post( false, '', false, 'category' );

						$prev_post_link_class = ( ! $prev_post ) ? 'h_visible_hidden' : '' ;
						$next_post_link_class = ( ! $next_post ) ? 'h_visible_hidden' : '' ;
					?>
					
					<?php if( $prev_post || $next_post ): ?>
					<div class="hill-post-scroller-box">
						<div class="hill-post-scroller-box-inner">
							<div class="hill-post-scroller-box-wrap">
								<ul class="clearfix">
									
									<li class="h_post_prev_box">
										<?php if( $prev_post ): ?>
										<a href="<?php echo esc_url(get_permalink( $prev_post )); ?>" class="<?php echo esc_attr($prev_post_link_class); ?>">
											<div class="h_next_prev_post_thumb">
												<span class="hill-post-left-scroller"><i class="fa fa-angle-left"></i></span>		
												<?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail'); ?>
											</div>

											<div class="h_next_prev_link">
												<h4><?php esc_html_e('Prev Post', 'hill'); ?></h4>
												<p><?php esc_html_e('Get to prev news', 'hill'); ?></p>
											</div>
										</a>
										<?php endif; ?>
									</li><!-- /.h_post_prev_box -->

									<li class="h_post_next_box">
										<?php if( $next_post ): ?>
										<a href="<?php echo esc_url(get_permalink( $next_post )); ?>" class="<?php echo esc_attr($next_post_link_class); ?>">				
											<div class="h_next_prev_link">
												<h4><?php esc_html_e('Next Post', 'hill') ?></h4>
												<p><?php esc_html_e('Get to next news', 'hill'); ?></p>
											</div>
											<div class="h_next_prev_post_thumb">		
												<?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
												<span class="hill-post-right-scroller"><i class="fa fa-angle-right"></i></span>
											</div>
										</a>
										<?php endif; ?>
									</li><!-- /.h_post_next_box -->
								</ul>
							</div><!-- /.hill-post-scroller-box-wrap -->
						</div><!-- /.hill-post-scroller-box-inner -->
					</div><!-- /.hill-post-scroller-box -->
					<?php endif; ?>

					

					
					<?php	
					endif;
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					?>
					<h3 class="hill-title-comments">Comments <span>(<?php echo get_comments_number(); ?>)</span></h3>
					<?php
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		

		</main><!-- #main -->
	</div><!-- #primary -->

	</div>

	<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">

		<?php get_sidebar(); ?>
	</div>	

</div>
</div>
<?php get_footer(); ?>
