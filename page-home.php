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
	<main class="site-main" role="main">
	<div class="container zoet-container home">


	<!-- Title -->
	<div class="header-wrapper">
		<div class="heart">
			<i class="fa fa-heart"></i>
		</div>
		<div class="title">
			<h3>Nieuwste berichten</h3>
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
            'offset'		 => 1,
            'orderby'		 => 'date'
            ) );

        if ( $newest->have_posts() ) :
        // The Loop
          while ( $newest->have_posts() ) : $newest->the_post();

						get_template_part( 'content', 'landingspage' );

					endwhile;
				wp_reset_postdata();
			endif;
		?>

		<div class="col-xs-12 text-center meer-recepten">
			<a href="/nieuw/page/2" class="btn btn-default btn-lg">Meer recepten...</a>
		</div>

	</div><!-- /new-post-grid -->
</div><!-- /container -->


 <section class="header-hero">
 <div class="triangle"></div>
    <div class="hero-image-wrapper">
      <div class="hero-text-wrapper">
        <h1>Liefde voor alles dat zoet is!</h1>
      </div>
  </div> <!-- /hero-image-wrapper -->
</section> <!-- /header-hero -->


	<section class="basic-posts">
		<div class="container zoet-container home">
			<!-- Title -->
			<div class="header-wrapper">
				<div class="heart">
					<i class="fa fa-heart"></i>
				</div>
				<div class="title">
					<h3>Basis recepten</h3>
				</div>
					<div class="heart">
					<i class="fa fa-heart"></i>
				</div>
			</div>

			<div class="basic-post-grid">
						<?php
		        $query = new WP_Query(
		          array(
		            'post_type'      => 'recepten',
		            'posts_per_page' => 10,
		            'orderby' => 'rand',
		            'category_name' => 'basisrecepten'
		            ) );

		        if ( $query->have_posts() ) :
		        // The Loop
		          while ( $query->have_posts() ) : $query->the_post();
		        ?>

		        <?php get_template_part( 'content', 'basicposts' ); ?>

		        <?php
		        endwhile;
		        endif;
		        wp_reset_postdata();
		        ?>
			</div>
			</div><!-- /container -->
	</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
