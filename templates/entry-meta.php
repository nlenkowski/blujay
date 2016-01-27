<?php
/**
 * Entry meta content
 */
?>

<span class="entry-date"><?php echo __('Posted on ', 'blujay'); echo get_the_date(); ?></span>
<span class="entry-author"><?php echo __('by', 'blujay'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></span>
