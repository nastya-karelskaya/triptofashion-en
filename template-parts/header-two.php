<?php

$hill_option = hill_get_all_options();

$mini_cart_popup_ext_class = ( hill_get_option('mini_cart_bottom_border_only') == 'on' ) ? 'hill_border_bottom_only' : '';

?>
<header class="hill_header3">
  

          <div class="h_upper_top_pan">
            
              <div class="container">
                <div class="row">
                 
                        <div class="row">
                          
                          <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">

<!--                             <p class="h_telephone_box">
                              <?php print hill_get_option('hill_header_left_txt'); ?>
                            </p> -->

                          </div>

                          <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12"> 
                            <div class="row">
                                
                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 
                                <ul class="h_header_utility_menu">
                                <?php if( function_exists( 'YITH_WCWL' ) ):?>
                                  <li><i class="fa fa-star"></i> <a href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><span><?php esc_html_e('Wishlist', 'hill'); ?></span></a></li>
                                <?php endif; ?>
                                <?php $hill_sitepress = hill_wpml(); if( !empty( $hill_sitepress ) ):?> 
                                  <li><i class="fa fa-globe"></i> <?php do_action('wpml_add_language_selector'); ?></li>
                                <?php endif; ?>
                                <?php if ( class_exists('woocommerce_wpml') && (int) hill_wpml_wc()->settings['enable_multi_currency'] ): ?>
                                  <li><i class="fa fa-money"></i> <?php esc_html_e( 'Currency:', 'hill' ); ?> <small><span><?php do_action('currency_switcher'); ?></span></small></li>
                                <?php endif; ?>
                                  <?php if( function_exists( 'YITH_WCWL' ) ):?><li><i class="fa fa-check-square-o"></i> <a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>"><span><?php esc_html_e('Checkout', 'hill'); ?></span></a></li><?php endif; ?>
                                  <li><i class="fa fa-unlock-alt"></i> <a href="<?php echo wp_login_url( home_url() ); ?>"><span>Login</span></a></li>
                                
                                </ul>
                              </div>
  
                          </div>

                        </div>
                    </div>

                

          </div>

          </div>    

      </div><!--/.h_upper_top_pan -->


<div class="container">
    <div class="row">
       <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">     
        <div class="h_all_categories_search_pan">

          <div class="row">
              <div class="col-md-9 col-sm-7 col-xs-12 clearfix">
				  <div class="hill_header2_brand" >
					  <?php the_custom_logo(); ?>
				  </div>
<!--                 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hill_header2_brand">
                  <?php $hill_logo_vals = hill_get_option('hill_logo'); ?>
                  <img src="<?php if(isset($hill_logo_vals['url'])){ echo esc_url( $hill_logo_vals['url'] ); }else{ echo get_template_directory_uri().'/images/interface/logo_hill.png'; } ?>" alt="logo">
                </a> -->
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <div class="h_selectbox_cat_search_outer">
                    <select class="h_selectbox_cat_search" name="product_cat">
                      <option value=""><?php esc_html_e('All Categories', 'hill'); ?></option>
                      <?php
                      $woo_cats = get_terms('product_cat');
                      if (!is_wp_error($woo_cats) && is_array($woo_cats)) {
                        if (count($woo_cats)) {
                          foreach ($woo_cats as $woo_cat) {
                            ?>
                            <option value="<?php echo esc_attr($woo_cat->slug); ?>"><?php echo esc_html($woo_cat->name); ?></option>
                            <?php
                          }
                        }
                      }
                      ?>
                      
                    </select>
                  </div>
                  <div class="hill_header2_search_box">
                    <input type="text" value="<?php echo get_search_query(); ?>" class="h_input_search_cat h_input_search_cat_modify2" name="s">
                    <input type="hidden" class="" name="post_type" value="product">
                    <button type="submit" class="h_btn_cat_search" value=""><i class="fa fa-search"></i></button>
                  </div>
                </form>
              </div>
              <?php if(!isset($hill_option['is_shop_enable']) || $hill_option['is_shop_enable']){?>
              <div class="col-md-3 col-sm-5 col-xs-12">
                <div class="hill_minicart_holder2 <?php echo esc_attr($mini_cart_popup_ext_class); ?>">
                  <div class="h_mycart_box3">
                    <div class="my_cart_box2">
                      <div class="my_cart_box2_left">
                        <span><a href="<?php echo esc_url(wc_get_cart_url()); ?>"><?php echo sprintf (__( 'My cart: %s', 'hill' ), WC()->cart->get_cart_total() ); ?></a></span>
                      </div>
                      <div class="my_cart_box2_right">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="h_cart_number_symble"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>
                      </div>
                    </div>
                    <div class="hill_min_cart_popup">
                      <?php get_template_part('woocommerce/cart/mini', 'cart'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>

          </div>

        </div>
    </div>
  </div> 
</div>


<div class="h_upper_nav_pan">
  <div class="container">
      <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-5 col-xs-5 hill_cn_col">
          <!-- <div class="hill_header_catnav">
            <h3 class="hill_cn_title">Categories <i class="fa fa-list-ul"></i></h3>
          </div> -->
          <div class="hill_header_catnav">
            <div class="hill_cm_cont" data-limit="8">
              <h3 class="hill_cm_title"><span><?php esc_html_e('Categories', 'hill'); ?></span> <i class="fa fa-list-ul"></i></h3>
              <?php $cm_holder = (!is_front_page()) ? 'hill_cm_holder_cont_uped': ''; ?>
              <div class="hill_cm_holder_cont <?php echo esc_attr($cm_holder); ?>">
                <div class="hill_cat_menu_holder">
                <?php
                wp_nav_menu( array(
                  'theme_location' => 'cat_menu',
                  'menu_id' => 'cat_menu',
                ) ); 
                ?>
                </div>
                <span class="hill_catmenu_more_less" data-lesscat="<?php esc_html_e('Less Categories', 'hill'); ?>" data-morecat="<?php esc_html_e('View More Categories', 'hill'); ?>"><?php esc_html_e('View More Categories', 'hill'); ?></span>
              </div>
            </div>
          </div>
        </div>
         <div class="col-md-9 col-lg-9 col-sm-7 col-xs-7 hill_header3_nav_col">
            <nav class="navbar">
                <div id="navbar" class="collapse navbar-collapse nav_mofdifier2">
                  <?php
                    wp_nav_menu( array(
                      'theme_location' => 'primary',
                      'menu_class' => 'nav navbar-nav nav_mofdifier2',
                      'menu_id' => 'primary-menu',
                      'fallback_cb' => 'hill_page_menu'
                    ) ); 
                  ?>
                </div><!--/.nav-collapse -->
                <div class="hill-mobile-nav">
                  <div class="hill-mn-toggle"><span><?php esc_html_e('Menu', 'hill'); ?></span> <span class="hill-mn-bar"></span></div>
                  <div class="hill-mobile-nav-container">
                    <?php
                        wp_nav_menu( array(
                          'theme_location' => 'mobile',
                          'menu_class' => 'hill-mobile-menu-ul',
                          'menu_id' => 'mobile-menu',
                          'fallback_cb' => 'hill_page_menu'
                        ) ); 
                      ?>
                  </div>
                </div>
            </nav>
        </div>
      </div>
  </div><!-- end: container -->
</div><!-- end: h_upper_nav_pan -->

</header>