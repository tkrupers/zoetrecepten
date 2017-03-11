<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package zoetrecepten
 */
?>

<section class="col-md-6 col-md-push-3">
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'zoet_' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'zoet_' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>
			<div class="alert alert-warning" role="alert">
				<div class="text-center">
					<div><i class="fa fa-meh-o fa-2x"></i></div>
					<em>Helaas peanut butter cheese</em>, geen recept gevonden!
					<br /><br>
					<div><a href="/recepten">Check hier</a> al mijn recepten of probeer een andere zoekterm.</div>
				</div>
			</div>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
