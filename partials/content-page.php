<?php
/**
 * Displays page content
 */
?>

<article class="entry entry-page">

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <section class="entry-content">
        <?php the_content(); ?>
    </section>

</article>
