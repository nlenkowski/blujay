<?php
/**
 * Displays single post content
 */
?>

<article id="post-<?php the_ID(); ?>" class="entry entry-single">

    <header class="entry-header">

        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>

        <?php get_template_part('partials/entry-meta'); ?>
    </header>

    <section class="entry-featured">
        <?php the_post_thumbnail( $post_id, 'large' ); ?>
    </section>

    <section class="entry-content">
        <?php the_content(); ?>
    </section>

</article>
