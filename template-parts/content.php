<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

$hill_grid_styled_post = (( hill_get_option('hill_blog_grid_type') == 'on' ) || (isset($_GET['grid']) && $_GET['grid'] == 'on')) ? true : false;


$post_title_meta_class = '';
$post_title_meta_class = ( (has_post_thumbnail() && !$hill_grid_styled_post) || (has_post_thumbnail() && is_sticky()) ) ? 'framework-per-single-post' : 'framework-per-single-post-no-thumb';

if (is_single()) {
	$post_title_meta_class = ( has_post_thumbnail() ) ? 'framework-per-single-post' : 'framework-per-single-post-no-thumb';
}



?>


<div class="framework-main-loop">
<article  id="post-<?php the_ID(); ?>" <?php post_class('hill-blog-post'); ?> >

	<?php if( has_post_thumbnail() ): ?><div class="hill-post-thumb-have-hover"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><span class="hill-blog-overlayer"></span></a> <?php hill_post_thumbnail(); ?></div><?php endif; ?>



	 <?php //hill_post_thumbnail(); ?>

	<div class="entry_categories <?php if( has_post_thumbnail() ) { echo "entry_categories-per-single-post"; } ?>">
		<?php
		$categories = get_the_category();
		if (count($categories)) {
			foreach ($categories as $categorie) {
				?>
				<span><a href="<?php echo esc_url(get_term_link($categorie)); ?>"><?php echo esc_html($categorie->cat_name); ?></a></span>
				<?php
			}
		}
		?>
	</div>
	
	<div class="<?php echo esc_attr($post_title_meta_class); ?>">
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
</article><!-- #post-## -->
</div>


	





