<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package zoetrecepten
 */
?>
<div class="sidebar-author col-xs-12">
	<div class="col-lg-6">
		<div class="author-image"></div>
	</div>
	<div class="col-lg-6">
		<div class="author-bio">
     <h3 style="font-size:24px">
			 Gezondigen vs zondigen, lekkere inspiratie en makkelijke recepten.
			  Liefde voor alles dat zoet is! Geniet jij mee?
				<br /> X
				<strong>Mariette</strong>
				<br />
			</h3>
		</div>
	</div>
</div>

<!-- Zoetrecepten/rectangle -->
<div id='adf-rectangle' style='text-align:center; margin:auto;'>
</div>

<h1>Nieuwsbrief</h1>

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
