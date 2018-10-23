<article class="page content content-none">

    <header class="page-header">
        <h1 class="page-title"><?php _e('Nothing Found', 'blujay'); ?></h1>
    </header>

    <section class="page-content">

        <?php if (is_search()) : ?>
            <?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blujay'); ?>
        <?php else : ?>
            <?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'blujay'); ?>
        <?php endif; ?>

        <?php get_search_form(); ?>

    </section>

</article>
