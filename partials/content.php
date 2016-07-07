<?php
/**
 * Displays posts content
 */
?>

<article id="post-<?php the_ID(); ?>" class="post content content-post">

    <header class="post-header">

        <h1 class="post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h1>

        <?php get_template_part('partials/post-meta'); ?>
    </header>

    <section class="post-featured-image">
        <?php the_post_thumbnail( 'large' ); ?>
    </section>

    <section class="post-content">
        <?php the_content(); ?>
    </section>

    <footer class="post-footer">
        <?php get_template_part('partials/comments-link'); ?>
    </footer>

</article>
