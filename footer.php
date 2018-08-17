<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chefeedback
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="container">
            <?php dynamic_sidebar('sidebar-3') ?>
            <div class="list">
                <?php dynamic_sidebar('list-footer') ?>
            </div>
            <?php dynamic_sidebar('last-list'); ?>
            <?php echo get_the_date(); ?>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
