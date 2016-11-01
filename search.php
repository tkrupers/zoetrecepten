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
					<div class="alert alert-info" role="alert">
						<div class="text-center">
							<i class="fa fa-frown-o fa-2x"></i><br><em> Oh snap</em>, geen recept gevonden! 
							</div>
						</div>
				<?php endif; ?>
			

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_footer(); ?>