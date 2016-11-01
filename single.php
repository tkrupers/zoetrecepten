<?php
/**
 * The Template for displaying all single posts.
 *
 * @package zoetrecepten
 */

get_header(); ?>

<div id="single-page" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="container">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="col-md-8 single-content-left">
					<?php get_template_part( 'content', 'single' ); ?>

				<?php get_template_part('content', 'author'); ?>

					<!-- Zoetrecepten/autonative -->
		    <div id='adf-autonative' style='text-align:center; margin:auto;'>
		    </div>

				<?php
						// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) : ?>
				<section id="comments">
				<div class="triangle single-triangle"></div>
					<?php comments_template(); ?>
				</section>
			<?php endif;?>

	   <?php get_template_part('content', 'social-buttons') ?>

				</div><!-- /single-content-left -->

				<div class="col-md-4 single-content-right">
					<?php get_sidebar(); ?>
				</div><!-- /single-content-right -->

		<?php endwhile; // end of the loop. ?>

	</div>
</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
