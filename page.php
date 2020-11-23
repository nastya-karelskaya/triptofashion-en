<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hill-theme
 */

get_header();


$page_type = get_post_meta( get_the_id(), 'framework_page_style', true );


$content_class = ( $page_type == 'nosidebar' ) ? 'col-md-12' : 'col-md-9 col-lg-9 col-sm-9 col-xs-12';

$content_class .= ( $page_type == 'leftsidebar' ) ? ' hill-content-left' : '';

$sidebar_class = ( $page_type == 'leftsidebar' ) ? ' hill-sidebar-left' : '';

?>
<main>
	<div class="container"> 


		<div class="hil_container">
			<div class="row">
				<div class="<?php echo esc_attr( $content_class ); ?>">
					
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'template-parts/content', 'page' ); ?>

								<?php
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>

							<?php endwhile; // End of the loop. ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div>
				
				<?php if( $page_type != 'nosidebar' ): ?>
					<div class="con-md-3 col-lg-3 col-sm-3 col-xs-12 <?php echo esc_attr( $sidebar_class ); ?>">
						<?php
							$page_left = get_post_meta(get_the_ID(),'framework_page_left_sidebar',true);

							$page_left = ($page_left && $page_left !== "0") ? $page_left : 'sidebar-page' ;

							if ( is_active_sidebar( $page_left ) ) {
								dynamic_sidebar( $page_left );
							}
						?>
					</div>
				<?php endif; ?>

			</div>	
		</div>
	</div>
</main>

<?php get_footer(); ?>
