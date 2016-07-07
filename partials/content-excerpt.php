<?php
/**
 * Displays archive and search posts content
 */
?>

<article id="post-<?php the_ID(); ?>" class="post content content-excerpt">

    <section class="post-featured-image">
        <?php the_post_thumbnail( 'thumbnail' ); ?>
    </section>

    <section class="post-content">

        <header class="post-header">

            <h3 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <?php get_template_part('partials/post-meta'); ?>
        </header>

        <section class="post-summary">
            <?php the_excerpt(); ?>
        </section>

        <footer class="post-footer">
            <?php get_template_part('partials/comments-link'); ?>
        </footer>

    </section>
</article>
