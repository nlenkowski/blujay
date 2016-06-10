<?php
/**
 * Displays 404 errors
 */
?>

<?php get_template_part( 'partials/header' ); ?>

<div class="content">

    <header class="page-header">
        <h1 class="page-title"><?php _e( 'Sorry, but the page you were trying to view does not exist.', 'blujay' ); ?></h1>
    </header><!-- /page-header -->

    <div class="page-content">
        <p><?php _e( 'Maybe try one of the links below?', 'blujay' ); ?></p>
        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
        <?php the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" ); ?>
    </div><!-- /page-content -->

</div><!-- /content -->

<?php get_template_part( 'partials/footer' ); ?>
