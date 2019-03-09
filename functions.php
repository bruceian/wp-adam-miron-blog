<?php

  function adam_miron_blog_script_enqueue() {
      wp_enqueue_style( 'slickstyle', get_template_directory_uri() . '/js/vendor/slick-1.8.1/slick/slick.css', array(), '1.0.0', 'all' );
      wp_enqueue_style( 'slickthemestyle', get_template_directory_uri() . '/js/vendor/slick-1.8.1/slick/slick-theme.css', array(), '1.0.0', 'all' );
      wp_enqueue_style( 'adammironstyle', get_template_directory_uri() . '/css/theme/theme.css', array(), '1.0.0', 'all' );

      wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/js/vendor/slick-1.8.1/slick/slick.min.js', array(), '1.0.0', true );
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

  // sidebar
  function adamn_miron_widget_setup() {
      register_sidebar( array(
          'name' => 'Sidebar',
          'id' => 'sidebar-1',
          'class' => 'custom',
          'description' => 'A sidebar',
          'before_widget' => '<aside id="%1$s" class="widget %2$s">',
          'after_widget'  => "</aside>",
          'before_title'  => '<h2 class="widgettitle">',
          'after_title'   => "</h2>",
        )
      );
  }

  add_action('widgets_init', 'adamn_miron_widget_setup');

  // custom post type SPOTIFY

  function spotify_post_type (){

    $labels = array(
      'name' => 'Spotify',
      'singular_name' => 'Spotify',
      'add_new' => 'Add New',
      'all_items' => 'All Spotify Posts',
      'add_new_item' => 'Add Post',
      'edit_item' => 'Edit Item',
      'new_item' => 'New Item',
      'view_item' => 'View Item',
      'search_item' => 'Search Spotify',
      'not_found' => 'No items found',
      'not_found_in_trash' => 'No items found in trash',
      'parent_item_colon' => 'Parent Item'
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'publicly_queryable' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions'
      ),
      'taxonomies' => array(
        'category',
        'post_tag'
      ),
      'menu_position' => 5,
      'exclude_from_search' => false
    );

    register_post_type('spotify', $args);
  }

  add_action('init', 'spotify_post_type');


  // Show posts of 'post', 'page' and 'movie' post types on home page
function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'spotify' ) );
  return $query;
}
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

?>
