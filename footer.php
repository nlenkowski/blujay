<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the content div and all content after
 *
 * @package bbln_bootstrap
 */
?>

    </div><!-- /content -->

    <footer class="site-footer" role="contentinfo">

        <?php get_sidebar( 'footer' ); ?>

        <div class="site-info">
            &copy; <?php echo date("Y"); ?> <?php echo bloginfo('name'); ?>
        </div>

    </footer>

</div><!-- /page -->

<?php wp_footer(); ?>

</body>
</html>
