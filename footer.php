<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package zoetrecepten
 */
?>
	<?php if(!is_single()) : ?>
	<?php get_template_part('content', 'social-buttons'); ?>
<?php endif; ?>

      <div id="footer" class="container">
      <hr>

      <footer class="text-center">
      	<p><small><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?></small></p>
      </footer>
    </div> <!-- /container -->

<?php wp_footer(); ?>
</body>
</html>
