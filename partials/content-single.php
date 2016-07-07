<?php
/**
 * Displays single post content
 */
?>

<article id="post-<?php the_ID(); ?>" class="post content content-single">

    <header class="post-header">

        <h1 class="post-title">
            <?php the_title(); ?>
        </h1>

        <?php get_template_part('partials/post-meta'); ?>
    </header>

    <section class="post-featured-image">
        <?php the_post_thumbnail( 'large' ); ?>
    </section>

    <section class="post-content">
        <?php the_content(); ?>
    </section>

</article>
