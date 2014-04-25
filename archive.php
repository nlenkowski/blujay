<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                        if ( is_category() ) :
                            single_cat_title();

                        elseif ( is_tag() ) :
                            single_tag_title();

                        elseif ( is_author() ) :
                            printf( __( 'Author: %s', 'bbln_bootstrap' ), '<span class="vcard">' . get_the_author() . '</span>' );

                        elseif ( is_day() ) :
                            printf( __( 'Day: %s', 'bbln_bootstrap' ), '<span>' . get_the_date() . '</span>' );

                        elseif ( is_month() ) :
                            printf( __( 'Month: %s', 'bbln_bootstrap' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bbln_bootstrap' ) ) . '</span>' );

                        elseif ( is_year() ) :
                            printf( __( 'Year: %s', 'bbln_bootstrap' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bbln_bootstrap' ) ) . '</span>' );

                        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                            _e( 'Asides', 'bbln_bootstrap' );

                        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                            _e( 'Galleries', 'bbln_bootstrap');

                        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                            _e( 'Images', 'bbln_bootstrap');

                        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                            _e( 'Videos', 'bbln_bootstrap' );

                        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                            _e( 'Quotes', 'bbln_bootstrap' );

                        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                            _e( 'Links', 'bbln_bootstrap' );

                        elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                            _e( 'Statuses', 'bbln_bootstrap' );

                        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                            _e( 'Audios', 'bbln_bootstrap' );

                        elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                            _e( 'Chats', 'bbln_bootstrap' );

                        else :
                            _e( 'Archives', 'bbln_bootstrap' );

                        endif;
                    ?>
                </h1>
                <?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) :
                        printf( '<div class="taxonomy-description">%s</div>', $term_description );
                    endif;
                ?>
            </header><!-- .page-header -->

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );
                ?>

            <?php endwhile; ?>

            <?php bbln_bootstrap_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
