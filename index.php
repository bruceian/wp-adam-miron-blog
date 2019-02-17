<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

    <?php if( is_home() ) {

        get_template_part('partials/home/intro');

          }
    ?>

<section id="articles_index">
	<div class="articles">
		<?php
      if( have_posts() ){

        while( have_posts() ): the_post();
		?>


		<div class="article">

			<?php if( is_home() ) { ?>

				<?php

				if ( has_post_thumbnail() ) {
					?>

					<div class="article_banner">

						<div class="article_img-wrap">
							<?php the_post_thumbnail(); ?>
						</div>
						<p class="date Neue45Light"><?php the_date('F j Y'); ?></p>

					</div>

					<?php
				}
				?>
				<div class="row">
					<div class="column _33 border-top">
						<h3 class="title"><?php the_title(); ?></h3>
						<div class="read-more__wrap">
							<a class="read-more" href="<?php the_permalink() ?>">Read more</a>
							<svg id="arrow-left-long" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 57.13 8.18"><defs><style>.cls-1{fill:none;stroke:#000;stroke-miterlimit:10;}</style></defs><title>arrow-left-long</title><line class="cls-1" x1="1.08" y1="4.09" x2="57.13" y2="4.09"/><polygon points="4.4 8.18 5.08 7.45 1.47 4.09 5.08 0.73 4.4 0 0 4.09 4.4 8.18"/></svg>
						</div>
					</div>
					<div class="column flex_reverse-desktop _66 border-top">
						<?php the_excerpt(); ?>
					</div>
				</div>
				<?php
			} else {
				?>
				<?php

				if ( has_post_thumbnail() ) {
					?>

					<div class="article_banner__half-screen">
						<?php the_post_thumbnail(); ?>
					</div>

					<?php
				}
				?>
				<p><?php the_date('F j Y'); ?></p>
				<h1><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
			<?php } ?>

		</div>

    <?php
        endwhile;

      } else {
     ?>
	 </div>
 </section>


    <?php
      }
    ?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();
?>
