<?php
/**
 * The template for displaying 404 pages
 *
 * @package bbln_bootstrap
 */

get_header(); ?>

    <div class="content">

        <header class="page-header">
            <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'bbln_bootstrap' ); ?></h1>
        </header>

        <div class="page-content">
            <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bbln_bootstrap' ); ?></p>

            <?php get_search_form(); ?>

            <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

            <?php if ( bbln_bootstrap_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
            <div class="widget widget_categories">
                <h2 class="widgettitle"><?php _e( 'Most Used Categories', 'bbln_bootstrap' ); ?></h2>
                <ul>
                <?php
                    wp_list_categories( array(
                        'orderby'    => 'count',
                        'order'      => 'DESC',
                        'show_count' => 1,
                        'title_li'   => '',
                        'number'     => 10,
                    ) );
                ?>
                </ul>
            </div><!-- .widget -->
            <?php endif; ?>

            <?php
            /* translators: %1$s: smiley */
            $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'bbln_bootstrap' ), convert_smilies( ':)' ) ) . '</p>';
            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
            ?>

            <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
        </div><!-- /page-content -->

    </div><!-- /content -->

<?php get_footer(); ?>