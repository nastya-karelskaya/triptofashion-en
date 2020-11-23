<?php
$hill_grid_styled_post = (( hill_get_option('hill_blog_grid_type') == 'on' ) || (isset($_GET['grid']) && $_GET['grid'] == 'on')) ? true : false;

$galleries = get_post_meta(get_the_ID(), 'framework-gallery', false);

$post_title_meta_class = '';
$post_title_meta_class = ( (!empty($galleries) && !$hill_grid_styled_post) || (!empty($galleries) && is_sticky()) ) ? 'framework-per-single-post' : 'framework-per-single-post-no-thumb';

$hill_grid_thumb_size = ($hill_grid_styled_post && !is_sticky()) ? 'hill-grid-thumb' : 'post-thumbnail';
?>

<div class="framework-main-loop">
<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <?php    
    
    if (!empty($galleries)):
    ?>
    <div class="flexslider hill_post_gallery flexshortcode ?>">             
        <ul class="list-unstyled slides">
            <?php foreach ($galleries as $gallery):
                $gallery = intval($gallery);
            ?>
                <li>
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <?php echo wp_get_attachment_image($gallery, $hill_grid_thumb_size); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="entry_categories <?php if( !empty($galleries) ) { echo "entry_categories-per-single-post"; } ?>">
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


