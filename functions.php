<?php

  function adam_miron_blog_script_enqueue() {
      wp_enqueue_style( 'adammironstyle', get_template_directory_uri() . '/css/theme/theme.css', array(), '1.0.0', 'all' );


      wp_enqueue_script( 'adammironjs', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
  }

  add_action( 'wp_enqueue_scripts', 'adam_miron_blog_script_enqueue');

  wp_register_script( 'jQuery', 'https://code.jquery.com/jquery-3.3.1.min.js', null, null, true );
  wp_enqueue_script('jQuery');


  function adam_miron_blog_setup() {
    add_theme_support('post-thumbnails');
  }

  add_action('after_setup_theme', 'adam_miron_blog_setup');


  // the_excerpt remove '[...]' and replace with custom
  function new_excerpt_more( $more ) {
      return '..';
  }
  add_filter('excerpt_more', 'new_excerpt_more');


?>
