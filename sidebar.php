<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package zoetrecepten
 */
?>

<?php get_template_part('content', 'bio'); ?>

<!-- Zoetrecepten/rectangle -->
<div id='adf-rectangle' style='text-align:center; margin:auto;'>
</div>

<h1 class="widget-title">Nieuwsbrief</h1>

<div class="newsletter">
	<div class="newsletter-wrapper">
		<p><strong>Schrijf je in</strong> en ontvang een mailtje bij elke nieuwe zoete post     <span class="fa fa-heart"></span></p>

		<div class="input-group">
			<?php echo do_shortcode('[wysija_form id="1"]') ?>
		</div>
	</div>
</div>

<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

	<aside id="meta" class="widget">

	</aside>

<?php endif; // end sidebar widget area ?>
