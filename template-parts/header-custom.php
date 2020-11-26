<?php
$hill_option = hill_get_all_options();


$hill_revslider = get_post_meta(get_the_ID(),'framework_revslider',true);

$header_class = array();
$header_class[] = (!empty($hill_revslider)) ? 'hill_revslider_on' : 'h_banner_1';


$mini_cart_popup_ext_class = ( hill_get_option('mini_cart_bottom_border_only') == 'on' ) ? 'hill_border_bottom_only' : '';

?>

<header>
    <div class="h_banner_1_modify hill_revslider_on <?php //echo implode(' ', $header_class); ?>">
        <div class="h_header_1">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                      <div class="hill_header_cont">
                        <div class="h_header_top"> 
                          <div class="row">
                        
                            <div class="col-md-5 col-lg-5 col-sm-12">
<!--                               <p class="h_telephone_box">
                                <?php print hill_get_option('hill_header_left_txt'); ?>
                              </p> -->
								<ul class="list-unstyled footer-social-media">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>                        <li><a href="#"><i class="fa fa-behance"></i></a></li>                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>                        <li><a href="#"><i class="fa fa-git"></i></a></li>                    </ul>
                            </div>
                        
                            <div class="col-md-7 col-lg-7 col-sm-12 h_header_cart_utility_menu_cont clearfix"> 
                        
                                <div class="h_header_utility_menu_cont"> 
                                    <ul class="h_header_utility_menu">
                                    <?php if( function_exists( 'YITH_WCWL' ) ):?> 
                                      <li><i class="fa fa-star"></i> <a href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><span><?php esc_html_e('Wishlist', 'hill'); ?></span></a></li>
                                    <?php endif; ?>
                                    <?php $hill_sitepress = hill_wpml();  if( !empty( $hill_sitepress ) ):?> 
                                      <li><?php do_action('wpml_add_language_selector'); ?></li>
                                    <?php endif; ?>
                                    <?php if ( class_exists('woocommerce_wpml') && (int) hill_wpml_wc()->settings['enable_multi_currency'] ): ?>
                                      <li><i class="fa fa-money"></i> <span><?php esc_html_e('Currency:', 'hill') ?> <?php do_action('currency_switcher'); ?></span></li>
                                    <?php endif; ?>
                                    </ul>
                                </div>

                                <?php if (function_exists('WC') && (!isset($hill_option['is_shop_enable']) || $hill_option['is_shop_enable'])): ?>
                                <div class="hill_minicart_holder <?php echo esc_attr($mini_cart_popup_ext_class); ?>">
                                  <div class="h_header_cart_box_cont"> 
                                      <div class="h_header_cart_box">
                                        <span class="h_mycart_txt p2">
                                           <a href="<?php echo esc_url(wc_get_cart_url()); ?>"> <?php echo sprintf (__( '<strong>My cart:</strong> %s', 'hill' ), WC()->cart->get_cart_total() ); ?></a>
                                        </span>
                                        <strong class=" h_shoping_crt fa fa-shopping-cart"></strong>
                                        <span class="h_cart_number_symble"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>
                                      </div>
                                      <div class="hill_min_cart_popup">
                                        <?php get_template_part('woocommerce/cart/mini', 'cart'); ?>
                                      </div>
                                  </div>
                                </div>
                                <?php endif; ?>
                        
                            </div>
                        
                          </div>
                        </div> <!-- /.h_header_top -->
                        
                        <div class="h_header_bottom  clearfix"> 
                        
                          <!-- <div class="row"> -->
                              <div class="h_header_brand">
								  <div class="h_logo" >
									  <?php the_custom_logo(); ?>
								  </div>
<!--                                   <a class="h_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <?php $hill_logo_vals = hill_get_option('hill_logo'); ?>
                                    <img src="<?php if(isset($hill_logo_vals['url'])){ echo esc_url( $hill_logo_vals['url'] ); }else{ echo get_template_directory_uri().'/images/interface/logo_hill.png'; } ?>" alt="img">
                                  </a> -->
                              </div>
                        
                              <div class="h_header_nav_bar clearfix">
                                  <nav class="navbar">
                                      <div id="navbar" class="navbar-collapse">
                                          <?php
                                            wp_nav_menu( array(
                                              'theme_location' => 'primary',
                                              'menu_class' => 'nav navbar-nav',
                                              'menu_id' => 'primary-menu',
                                              'fallback_cb' => 'hill_page_menu'
                                            ) ); 
                                          ?>
                                      </div><!-- #navbar -->
                                  </nav><!-- /.navbar -->
                                  <nav class="hill-mobile-nav">
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
                                  </nav>
                              </div>
                        
                              <div class="h_header_search_box">
                                  <?php get_search_form(); ?>
                              </div>
                          <!-- </div> -->
                        
                          </div><!-- /.h_header_bottom  -->
                        </div> <!-- /.hill_header_cont -->
                    <?php
                      $show_page_title = get_post_meta(get_the_ID(),'framework_show_page_title',true);
                      if((!empty($show_page_title) && $show_page_title == 'on') || empty($show_page_title) ):
                    ?>
                    <div class="framwork-header-box">
                        <div class="framwork-header-box-top">
                            <h3 class="framwork-hdr-title">
                              <?php
                                if (function_exists('is_woocommerce') && is_woocommerce()){
                                  woocommerce_page_title();
                                } elseif (is_home()) {
                                  esc_html_e('Blog', 'hill');
                                } else if (is_single()){
                                  the_title();
                                } else {
                                  the_title();
                                }
                              ?>
                            </h3>
                        </div> <!-- /.framwork-header-box-top -->
                        <div class="framwork-header-box-bottom">
                          <?php
                          if( function_exists('yoast_breadcrumb')){
                            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                          }
                          ?>
                        </div>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="main-page__slider-wrapper">
	<div class="main-page__slider">
    <img src="https://lp-cms-production.imgix.net/image_browser/Effiel%20Tower%20-%20Paris%20Highlights.jpg" alt="paris">
    <img src="https://cdn-image.departures.com/sites/default/files/1584458652/header-empty-clean-grand-canal-venice-CLEANVENICE0320.jpg" alt="venice">
    <img src="https://www.hotelalgamilano.it/sites/alga2torri.gisnet.it/files/Hotel_Santa_Barbara_Milano_01t.jpg" alt="milano">
  </div>
  <div class="main-page__slider-title">
    <!-- <div class="container">
      <div class="row">
        <div class="col-md-12"> -->
          <h1>
            Hello, fashion enthusiasts!
          </h1>
        <!-- </div>
      </div> -->
    </div>
    
    
  </div>
</div>