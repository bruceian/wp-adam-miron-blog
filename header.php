<!DOCTYPE html>
<html class="no-js supports-no-cookies" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#0c3520">
    <link rel="canonical" href="">
    <link rel="shortcut icon" href="" type="image/png">
    <title>Adam Miron</title>
    <meta name="description" content="">

    <meta property="og:site_name" content="Adam Miron Blog">
    <meta property="og:url" content="">
    <meta property="og:title" content="Adam Miron Blog">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Adam Miron's blog">
    <meta property="og:image" content=""/>
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />


    <meta name="twitter:site" content="@">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Adam Miron">
    <meta name="twitter:description" content="Adam Miron's twitter">
    <link rel="stylesheet" href="https://use.typekit.net/nsh6bgo.css">
    <?php
      wp_head();
    ?>
</head>
  <body <?php body_class(); ?>>

    <header id="header">

        <nav id="mainNav">
          <ul class="nav-list">
            <li class="nav-list__item">
              <a href="<?php echo get_home_url(); ?>" class="Neue95Bold">
                Adam Miron
              </a>
            </li>

            <li class="nav-list__item Neue45Light ">
              <?php
              $recent_spotify_args = array(
              	'numberposts' => 1,
              	'offset' => 0,
              	'category' => 0,
              	'orderby' => 'post_date',
              	'order' => 'DESC',
              	'include' => '',
              	'exclude' => '',
              	'meta_key' => '',
              	'meta_value' =>'',
              	'post_type' => 'spotify',
              	'post_status' => 'publish',
              	'suppress_filters' => true
              );

              $recent_posts = wp_get_recent_posts( $recent_spotify_args, ARRAY_A );

              	foreach( $recent_posts as $recent ){
              		echo '<a href="' . get_permalink($recent["ID"]) . '">' .   "Bio".'</a>';
              	}
              	wp_reset_query();
              ?>
            </li>

            <li class="nav-list__item">
              <a href="mailto:adam@adammiron.com" class="button">
                  Contact
              </a>
            </li>
          </ul>
        </nav>

    </header>
