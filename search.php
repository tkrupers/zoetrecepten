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


			<?php if(have_posts()) : ?>

				<div class="container">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'landingspage' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

				<?php wp_pagenavi(); ?>

				</div>

				<?php else :  ?>
					<div class="container">
						<div class="alert alert-warning" role="alert">
							<div class="text-center">
								<div><i class="fa fa-meh-o fa-2x"></i></div>
								<em>Helaas peanut butter cheese</em>, geen recept gevonden!
								<br /><br>
								<div><a href="/recepten">Check hier</a> al mijn recepten of probeer een andere zoekterm.</div>
							</div>
						</div>
					</div>
				<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_footer(); ?>
