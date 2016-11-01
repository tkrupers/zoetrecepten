<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zoetrecepten
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">

			<div class="col-md-8 single-content-left">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
				

			</div><!-- /single-content-left -->

			<div class="col-md-4 single-content-right">
				<?php get_sidebar(); ?>
			</div><!-- /single-content-right -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_footer(); ?>
