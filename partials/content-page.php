<?php
/**
 * Displays page content
 */
?>

<article <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- /entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- /entry-content -->

</article>
