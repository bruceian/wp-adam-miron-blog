<?php

  function adam_miron_blog_script_enqueue() {
      wp_enqueue_style( 'adammironstyle', get_template_directory_uri() . '/css/theme/theme.css', array(), '1.0.0', 'all' );

      // wp_enqueue_script( 'jquery', "//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js", array(), '2.2.3', true );
      wp_enqueue_script( 'adammironjs', get_template_directory_uri() . '/css/js/main.js', array(), '1.0.0', true );
  }

  add_action( 'wp_enqueue_scripts', 'adam_miron_blog_script_enqueue');


  function adam_miron_blog_setup() {
    // add_theme_support( $feature, $args,... );

  }

  add_action('after_setup_theme', 'adam_miron_blog_setup');
?>
