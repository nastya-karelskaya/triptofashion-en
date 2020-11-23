<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package hill-theme
 */

get_header('one'); ?>

<div class="hill-four-zero-container">
<div class="container">
	
<div class="hill-four-zero">
	<h3 class="txt-four-zero"><?php esc_html_e('404', 'hill'); ?></h3>
	<p class="txt-four-zero2"><?php esc_html_e('Find other way or use search below, unfortunately page not found', 'hill'); ?></p>
</div>

<div class="footer_search_box">
<?php get_search_form(); ?>
</div>


</div>

<?php get_footer(); ?>
