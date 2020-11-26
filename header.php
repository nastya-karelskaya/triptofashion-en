<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hill-theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php wp_head(); ?>

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

</head>

<body <?php body_class(); ?>>


<?php


// $hill_header_type = hill_get_option('hill_header_type');
// $header_type = !empty($hill_header_type)  ? $hill_header_type : 'one' ;
// get_template_part( 'template-parts/header', $header_type );

// $hill_revslider = get_post_meta(get_the_ID(),'framework_revslider',true);

// if (!empty($hill_revslider) && function_exists('putRevSlider') && $hill_revslider !== "0") {
//   putRevSlider($hill_revslider);
// }


	

get_template_part( 'template-parts/header', 'custom' );

