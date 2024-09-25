<?php

function theme_enqueue_scripts() {
  
  wp_enqueue_script('jquery');

  $theme_directory = get_template_directory_uri();

  wp_enqueue_style('reset-style', $theme_directory . '/assets/css/reset.css');
  wp_enqueue_style( 'common-style', $theme_directory . '/assets/css/common.css', array('reset-style'), null);
  wp_enqueue_script( 'common-script', $theme_directory . '/assets/js/common.js', array('jquery'), null, true);
  wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true );

  if(is_front_page()){
    wp_enqueue_style('front-style', $theme_directory . '/assets/css/front.css', array('common-style'));
    wp_enqueue_script( 'front-script', $theme_directory . '/assets/js/front_page.js', array('common-script'), null, true);
  }

  if(is_singular('news') || is_post_type_archive('news')){
    wp_enqueue_style('news-style', $theme_directory . '/css/archive-news.css', array('common-style'));
    wp_enqueue_script('news-script', $theme_directory . '/js/news.js', array('jquery'), null, true);
  }

  if(is_post_type_archive('product')){
    wp_enqueue_style('product-style', $theme_directory . '/css/archive-product.css', array('common-style'));
    wp_enqueue_script('product-script', $theme_directory . '/js/product.js', array('jquery'), null, true);
  }

  if(is_singular('product')){
    wp_enqueue_style('product-single-style', $theme_directory . '/css/product.css', array('common-style'));
    wp_enqueue_script('product-single-script', $theme_directory . '/js/product.css', array('jquery'), null, true);
  }

  if(is_404()){
    wp_enqueue_style('404-style', $theme_directory . '/css/404.css', array('common-style'));
    wp_enqueue_script('404-script', $theme_directory . '/js/404.js', array('jquery'), null, true);
  }

  if(is_page('thankspage')){
    wp_enqueue_style('thankspage-style', $theme_directory. '/css/thankspage.css', array('common-style'));
    wp_enqueue_script('thankspage-script', $theme_directory. '/js/thanks.js', array('jquery'), null, true);
  }

  if(is_page('contactcf7')){
    wp_enqueue_style('contactcf7-style', $theme_directory. '/css/contactcf7.css', array('common-style'));
    wp_enqueue_script('contactcf7-script', $theme_directory. '/js/contactcf7.js', array('jquery'), null, true);
  }
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');