<?php
/**
 * Displays 404 errors
 */
?>

<?php get_template_part( 'partials/header' ); ?>

<main class="main">

    <header class="entry-header">
        <h1 class="entry-title"><?php _e( 'Sorry, but the page you were trying to view does not exist.', 'blujay' ); ?></h1>
    </header><!-- /entry-header -->

    <div class="entry-content">
        <p><?php _e( 'Maybe try one of the links below?', 'blujay' ); ?></p>
        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
        <?php the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" ); ?>
    </div><!-- /entry-content -->

</main><!-- /main -->

<?php get_template_part( 'partials/footer' ); ?>
