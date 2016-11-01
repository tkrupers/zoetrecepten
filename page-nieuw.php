<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package zoetrecepten
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container zoet-container home">


			<!-- Title -->
			<div class="header-wrapper">
				<div class="heart">
					<i class="fa fa-heart"></i>
				</div>
				<div class="title">
					<h3>Nieuwste artikelen</h3>
				</div>
					<div class="heart">
					<i class="fa fa-heart"></i>
				</div>
			</div>

			<div class="new-post-grid clearfix">
				<?php
		        $newest = new WP_Query(
		          array(
		            'post_type'      => ['recepten', 'blog'],
		            'posts_per_page' => 9,
								'paged' => get_query_var('paged')
		            ) );

		        if ( $newest->have_posts() ) :
		        // The Loop
		          while ( $newest->have_posts() ) : $newest->the_post();
		        ?>

		        <?php get_template_part( 'content', 'landingspage' ); ?>

						<?php endwhile; ?>

						<div class="col-xs-12">
							<?php
								wp_pagenavi( array( 'query' => $newest ) );
							?>
						</div>

						<?php
				      wp_reset_postdata();
			        endif;
		        ?>

			</div><!-- /new-post-grid -->
		</div><!-- /container -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
