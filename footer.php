<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
?>

	<?php do_action( 'storefront_before_footer' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="col-full">

        <?php
        /**
         * @hooked storefront_footer_widgets - 10
         * @hooked storefront_credit - 20 -> Todo:move credits
         */
        do_action('storefront_footer');
        ?>

    </div><!-- .col-full -->
    <div class="footer-bottom">
        <div class="col-full">
            <!-- footer-links --><?php wp_nav_menu(array('theme_location' => 'footer-links')); ?>
            <?php do_action('storefront_child_footer'); ?>
        </div>
    </div>
</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
