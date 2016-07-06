<?php
/**
 * Displays archive post content
 */
?>

<article id="post-<?php the_ID(); ?>" class="content content-archive">

    <section class="entry-featured">
        <?php the_post_thumbnail( 'thumbnail' ); ?>
    </section>

    <section class="entry-content">

        <header class="entry-header">

            <h3 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <?php get_template_part('parts/entry-meta'); ?>
        </header>

        <section class="entry-summary">
            <?php the_excerpt(); ?>
        </section>

        <footer class="entry-footer">
            <?php get_template_part('parts/comments-link'); ?>
        </footer>

    </section>
</article>
