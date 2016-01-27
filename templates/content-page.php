<?php
/**
 * Page content
 */
?>

<article <?php post_class(); ?>>

    <header class="page-header">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </header><!-- /entry-header -->

    <div class="page-content">
        <?php the_content(); ?>
    </div><!-- /entry-content -->

</article>
