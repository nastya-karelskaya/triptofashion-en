<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hill-theme
 */
$hill_option = hill_get_all_options();
?>
<?php if (function_exists('WC')): ?>
<div class="h_float_utiliy_box">
    <?php if(!isset($hill_option['is_shop_enable']) || $hill_option['is_shop_enable']){?>
    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="h_float_box1">
      <span class="h_f_number_box1"> <?php echo WC()->cart->cart_contents_count; ?> </span>
      <i class="fa fa-shopping-cart"></i>
    </a>
    <?php
    }
    if (class_exists('YITH_Woocompare')):
      
    ?>
    <a href="<?php echo esc_url(hill_get_yith_compare()->obj->view_table_url()) ?>" class="h_float_box2">
      <span class="h_f_number_box2"> <?php echo count(hill_get_yith_compare()->obj->products_list); ?> </span>
      <i class="fa fa-retweet"></i>
    </a>
    <?php endif; ?>
    <?php if( function_exists( 'YITH_WCWL' ) ): ?>
        <?php $hill_wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
        <a class="h_float_box3" href="<?php echo esc_url($hill_wishlist_url); ?>"><i class="fa fa-star"></i></a>
    <?php endif; ?>
    <a href="#" class="gotto_f_top_box"><i class="fa fa-angle-up"></i><span class="h_f_go_to_box_txt"><?php esc_html_e('go top','hill'); ?></span></a>
    
    <a class="h_float_box3" href="<?php echo esc_url(hill_get_option('hill_footer_email')); ?>"><i class="fa fa-envelope"></i></a>
</div>
<?php endif; ?>
<footer>

<div class="h_footer">
        
        <div class="container">
          
          <div class="row">
              
              <div class="col-md-2 col-lg-2 col-sm-4 col-xs-12">
                  <?php
                    if ( is_active_sidebar( 'footer_col_1' ) ) {
                      dynamic_sidebar( 'footer_col_1' );
                    }
                  ?>
              </div>


              <div class="col-md-2 col-lg-2 col-sm-4 col-xs-12">
                  <?php
                    if ( is_active_sidebar( 'footer_col_2' ) ) {
                      dynamic_sidebar( 'footer_col_2' );
                    }
                  ?>
              </div>


              <div class="col-md-2 col-lg-2 col-sm-4 col-xs-12">
                  <?php
                    if ( is_active_sidebar( 'footer_col_3' ) ) {
                      dynamic_sidebar( 'footer_col_3' );
                    }
                  ?>
              </div>

              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <?php if(
                  (hill_get_option('hill_footer_social_facebook')) ||
                  (hill_get_option('hill_footer_social_twitter')) ||
                  (hill_get_option('hill_footer_social_google_plus')) ||
                  (hill_get_option('hill_footer_social_youtube')) ||
                  (hill_get_option('hill_footer_social_pinterest')) ||
                  (hill_get_option('hill_footer_social_flickr')) ||
                  (hill_get_option('hill_footer_social_dribbble')) ||
                  (hill_get_option('hill_footer_social_behance')) ||
                  (hill_get_option('hill_footer_social_instagram')) ||
                  (hill_get_option('hill_footer_social_git')) ||
                  (hill_get_option('hill_footer_email')) ||
                  (hill_get_option('hill_footer_map_url'))
                ): ?>
                <div class="hill_footer_social">
                  <div class="h_media_single_box_cont">
                    <?php if((hill_get_option('hill_footer_email'))): ?><a class="h_media_single_box" href="<?php echo esc_url(hill_get_option('hill_footer_email')); ?>"><i class="fa fa-envelope"></i></a><?php endif; ?>
                    <?php if((hill_get_option('hill_footer_map_url'))): ?><a class="h_media_single_box" href="<?php echo esc_url(hill_get_option('hill_footer_map_url')); ?>"><i class="fa fa-map-marker"></i></a><?php endif; ?>
                  </div>
                  <?php if(
                    (hill_get_option('hill_footer_social_facebook')) ||
                    (hill_get_option('hill_footer_social_twitter')) ||
                    (hill_get_option('hill_footer_social_google_plus')) ||
                    (hill_get_option('hill_footer_social_youtube')) ||
                    (hill_get_option('hill_footer_social_pinterest')) ||
                    (hill_get_option('hill_footer_social_flickr')) ||
                    (hill_get_option('hill_footer_social_dribbble')) ||
                    (hill_get_option('hill_footer_social_behance')) ||
                    (hill_get_option('hill_footer_social_instagram')) ||
                    (hill_get_option('hill_footer_social_git'))
                  ): ?>
                  <div class="social_media_footer_pan">
                            
                    <ul class="list-unstyled footer-social-media">
                        <?php if((hill_get_option('hill_footer_social_facebook'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_facebook')); ?>"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
                        <?php if((hill_get_option('hill_footer_social_twitter'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_twitter')); ?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                        <?php if((hill_get_option('hill_footer_social_google_plus'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_google_plus')); ?>"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
                        <?php if((hill_get_option('hill_footer_social_youtube'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_youtube')); ?>"><i class="fa fa-youtube-play"></i></a></li><?php endif; ?>
                        <?php if((hill_get_option('hill_footer_social_pinterest'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_pinterest')); ?>"><i class="fa fa-pinterest-p"></i></a></li><?php endif; ?>
                        <?php if((hill_get_option('hill_footer_social_flickr'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_flickr')); ?>"><i class="fa fa-flickr"></i></a></li><?php endif; ?>
                        <?php if((hill_get_option('hill_footer_social_dribbble'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_dribbble')); ?>"><i class="fa fa-dribbble"></i></a></li><?php endif; ?>
                        <?php if((hill_get_option('hill_footer_social_behance'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_behance')); ?>"><i class="fa fa-behance"></i></a></li><?php endif; ?>
                        <?php if((hill_get_option('hill_footer_social_instagram'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_instagram')); ?>"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
                        <?php if((hill_get_option('hill_footer_social_git'))): ?><li><a href="<?php echo esc_url(hill_get_option('hill_footer_social_git')); ?>"><i class="fa fa-git"></i></a></li><?php endif; ?>
                    </ul>
                  
                  </div>
                  <?php endif; ?>
                </div><!-- /.hill_footer_social -->
                <?php endif; ?>

                <?php if ( (hill_get_option('hill_footer_phn_label')) || (hill_get_option('hill_footer_phn_number')) ): ?>
                <div class="footer-utility-box">
                    
                   <h5><span><?php echo esc_html(hill_get_option('hill_footer_phn_label')); ?></span>  <?php echo esc_html(hill_get_option('hill_footer_phn_number')); ?></h5>  

                </div>
                <?php endif; ?>
              </div>

          </div>    

          <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="footer_search_box">
            <?php get_search_form(); ?>

          </div>
          </div>
          </div>
          <?php
          if($copyright = hill_get_option('hill_footer_copyright')){
          ?>
          <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="footer_copyright">
            <?php echo wp_kses_post($copyright)?>
          </div>
          </div>
          </div>
          <?php
          }
          ?>
        </div><!-- end: container  -->      
    </div><!-- end: h_footer  -->

    <?php if ( hill_get_option('is_popup_enable') ) { get_template_part( 'template-parts/popup' ); } ?>

<?php wp_footer(); ?>

</footer>
</body>
</html>
