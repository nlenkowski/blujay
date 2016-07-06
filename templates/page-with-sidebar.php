<?php
/*
Template Name: With Sidebar
*/
?>

<?php get_header(); ?>

<main class="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'parts/content', 'page' ); ?>

    <?php endwhile; ?>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
