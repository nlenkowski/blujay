<?php
/**
 * Displays archive and search posts content
 */
?>

<article id="post-<?php the_ID(); ?>" class="content content-excerpt">

    <section class="post-featured">
        <?php the_post_thumbnail( 'thumbnail' ); ?>
    </section>

    <section class="post-content">

        <header class="post-header">

            <h3 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <?php get_template_part('parts/post-meta'); ?>
        </header>

        <section class="post-summary">
            <?php the_excerpt(); ?>
        </section>

        <footer class="post-footer">
            <?php get_template_part('parts/comments-link'); ?>
        </footer>

    </section>
</article>
