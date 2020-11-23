<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hill-theme
 */

get_header();


$hill_grid_styled_post = (( hill_get_option('hill_blog_grid_type') == 'on' ) || (isset($_GET['grid']) && $_GET['grid'] == 'on')) ? true : false;
?>

<div class="container framwork-content-modify">


<!-- <div class="framwork-header-box">
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<h3 class="framwork-hdr-title">Full Blog</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			
			<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

		</div>

	</div>

</div>
 -->
<div class="hil_container">

<div class="row">
	


<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">


	<main id="main" class="site-main" role="main">
        
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
			<?php if ( $hill_grid_styled_post ) : ?><div class="row"><?php endif; ?>
			<?php
           
			$post_i = 0;
			// Start the loop.
			while ( have_posts() ) : the_post();

				$post_i++;

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				$grid_col_class = (is_sticky()) ? 'col-md-12' : 'col-md-6 framework-grid-post';
				?>
				
					<?php if ( $hill_grid_styled_post ) : ?><div class="<?php echo esc_attr($grid_col_class); ?>"><?php endif; ?>
						<?php 
                get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php if ( $hill_grid_styled_post ) : ?></div><?php endif; ?>
					<?php if(($post_i == 2 || is_sticky()) && $hill_grid_styled_post): $post_i = 0; ?>
						</div><div class="row">
					<?php endif; ?>
				
				
				<?php
				

			// End the loop.
			endwhile;
			?>
			<?php if ( $hill_grid_styled_post ) : ?></div><?php endif; ?>
			<div class="clearfix pagination_wrap d_inline_b">
                <?php
                global $wp_query;
                   
                    $big = 999999999; // need an unlikely integer					
                    $page_links = paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $wp_query->max_num_pages,
                            'type' => 'plain',
                            'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
                            'next_text' => '<i class="fa fa-long-arrow-right"></i>',
                    ) );
                    if(!empty($page_links)){
                    	echo '<ul class="hr_list fs_medium paginations blog_paginations t_align_c f_left f_mxs_none m_mxs_bottom_10">';
	                    $page_links = explode("\n", $page_links);
	                    foreach($page_links as $plink){
	                        echo "<li>{$plink}</li>";
	                    }
                        echo '</ul>';
                    }
                ?>
                </div>
			<?php 

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->



</div>

<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
	<?php get_sidebar(); ?>
</div>

</div>		
</div>


</div>
<?php 
global $flexsliderArray; 
print_r($flexsliderArray);  
echo '<script> var flexobject = '. json_encode($flexsliderArray) .'</script>'; ?>

<?php get_footer(); ?>
