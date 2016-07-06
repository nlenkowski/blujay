<?php
/**
 * Displays default post content
 */
?>

<article id="post-<?php the_ID(); ?>" class="entry entry-default">

    <header class="entry-header">

        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h1>

        <?php get_template_part('partials/entry-meta'); ?>
    </header>

    <section class="entry-featured">
        <?php the_post_thumbnail( $post_id, 'large' ); ?>
    </section>

    <section class="entry-content">
        <?php the_content(); ?>
    </section>

    <footer class="entry-footer">
        <?php get_template_part('partials/comments-link'); ?>
    </footer>

</article>
