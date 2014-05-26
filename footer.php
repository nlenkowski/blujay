<?php
/**
 * The template for displaying the footer
 *
 * @package bbln_bootstrap
 */
?>

        </div><!-- /container -->
    </section><!-- /site-content -->

    <footer class="site-footer">
        <div class="container">

            <aside class="footer-widgets widget-area">
                <?php dynamic_sidebar( 'footer-widgets' ); ?>
            </aside>

            <div class="site-info">
                &copy; <?php echo date("Y"); ?> <?php echo bloginfo('name'); ?>
            </div>

        </div><!-- /container -->
    </footer><!-- /footer -->

    <?php wp_footer(); ?>

</body>
</html>
