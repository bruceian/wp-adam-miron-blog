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

		<?php
      if( have_posts() ){

        while( have_posts() ): the_post();
		?>

<section id="articles_index">
	<div class="articles">

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
					<div class="column _33">
						<h3 class="title"><?php the_title(); ?></h3>
						<a href="<?php the_permalink() ?>">Read more</a>
					</div>
					<div class="column flex_reverse-desktop _66">
						<p class="excerpt"><?php the_excerpt(); ?></p>
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

	</div>
</section>
    <?php
        endwhile;

      } else {
     ?>


    <?php
      }
    ?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();
?>
