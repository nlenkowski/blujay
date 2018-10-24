        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <hr>
            <aside class="footer-widgets widget-area">
                <?php dynamic_sidebar('footer-widgets'); ?>
            </aside>
            <hr>
            <div class="site-info">
                <a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>, <?php bloginfo('description') ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
