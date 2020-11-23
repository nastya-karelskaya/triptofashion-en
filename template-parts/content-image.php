<?php
if(has_post_thumbnail()){
    $id = get_post_thumbnail_id();
    $image = wp_get_attachment_image_src($id,'full');
?>

<div class="image large-12 medium-12">
    <a rel="bookmark" title="Permalink to Test Posts" href="<?php echo esc_url($image[0])?>" class="list-image">
        <img height="<?php echo esc_attr($image[2])?>" width="<?php echo esc_attr($image[1])?>" alt="featured-640x229" src="<?php echo esc_url($image[0])?>" />
    </a>                        	
</div>
<?php 
}
?>