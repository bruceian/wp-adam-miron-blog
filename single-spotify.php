<?php

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

      <section id="articles_index">
      	<div class="articles">
      		<?php
            if( have_posts() ){

              while( have_posts() ): the_post();
      		?>


      		<div class="article">
      				<?php

      				if ( has_post_thumbnail() ) {
      					?>

      					<div class="split left article_banner__half-screen">
      						<?php the_post_thumbnail(); ?>
      					</div>

      					<?php
      				}
      				?>
      				<div class="archive_flex">
      					<a href="<?php the_permalink(); ?>">
      						<h1 class="title"><?php the_title(); ?></h1>
      					</a>
      					<p class="date Neue45Light"><?php the_date('F j Y'); ?></p>

      					<?php	if ( is_singular() ) { ?>
									<div class="carouel-3">
										<div class="spotify-iframe__wrap">
											<iframe src="<?php echo get_field("spotify_url_one")?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
										</div>
										<div class="spotify-iframe__wrap">
											<iframe src="<?php echo get_field("spotify_url_two")?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
										</div>
										<div class="spotify-iframe__wrap">
											<iframe src="<?php echo get_field("spotify_url_three")?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
										</div>
									</div>
									<p class="content"><?php the_content(); ?></p>
      						<div class="read-more__wrap">
      							<a class="read-more" href="<?php echo get_home_url(); ?>">Index</a>
      							<svg id="arrow-left-long" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 57.13 8.18"><defs><style>.cls-1{fill:none;stroke:#000;stroke-miterlimit:10;}</style></defs><title>arrow-left-long</title><line class="cls-1" x1="1.08" y1="4.09" x2="57.13" y2="4.09"/><polygon points="4.4 8.18 5.08 7.45 1.47 4.09 5.08 0.73 4.4 0 0 4.09 4.4 8.18"/></svg>
      						</div>
      					<?php	} ?>
      				</div>

      		</div>

          <?php
              endwhile;

            }
           ?>
      	 </div>
       </section>


		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();
?>
