<?php
/**
 * Displays the footer
 */
?>

        </div>
    </section>

    <footer class="site-footer">
        <div class="container">

            <aside class="footer-widgets widget-area">
                <?php dynamic_sidebar( 'footer-widgets' ); ?>
            </aside>

            <div class="site-info">
                <a href="<?php echo site_url(); ?>"><?php bloginfo( 'name' ); ?></a>, <?php bloginfo( 'description' )?>
            </div>

        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
