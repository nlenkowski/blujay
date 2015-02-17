<?php
/**
 * Theme activation
 * Borrowed from the amazing Roots theme, http://roots.io/starter-theme/
 *
 * @package bbln_bootstrap
 */

if (is_admin() && isset($_GET['activated']) && 'themes.php' == $GLOBALS['pagenow']) {
  wp_redirect(admin_url('themes.php?page=theme_activation_options'));
  exit;
}

function bbln_bootstrap_theme_activation_options_init() {
  register_setting(
    'bbln_bootstrap_activation_options',
    'bbln_bootstrap_theme_activation_options'
  );
}
add_action('admin_init', 'bbln_bootstrap_theme_activation_options_init');

function bbln_bootstrap_activation_options_page_capability($capability) {
  return 'edit_theme_options';
}
add_filter('option_page_capability_bbln_bootstrap_activation_options', 'bbln_bootstrap_activation_options_page_capability');

function bbln_bootstrap_theme_activation_options_add_page() {
  $bbln_bootstrap_activation_options = bbln_bootstrap_get_theme_activation_options();

  if (!$bbln_bootstrap_activation_options) {
    $theme_page = add_theme_page(
      __('Theme Activation', 'bbln_bootstrap'),
      __('Theme Activation', 'bbln_bootstrap'),
      'edit_theme_options',
      'theme_activation_options',
      'bbln_bootstrap_theme_activation_options_render_page'
    );
  } else {
    if (is_admin() && isset($_GET['page']) && $_GET['page'] === 'theme_activation_options') {
      flush_rewrite_rules();
      wp_redirect(admin_url('themes.php'));
      exit;
    }
  }
}
add_action('admin_menu', 'bbln_bootstrap_theme_activation_options_add_page', 50);

function bbln_bootstrap_get_theme_activation_options() {
  return get_option('bbln_bootstrap_theme_activation_options');
}

function bbln_bootstrap_theme_activation_options_render_page() { ?>
  <div class="wrap">
    <h2><?php printf(__('%s Theme Activation', 'bbln_bootstrap'), wp_get_theme()); ?></h2>
    <div class="update-nag">
      <?php _e('These settings are optional and should usually be used only on a fresh installation', 'bbln_bootstrap'); ?>
    </div>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
      <?php settings_fields('bbln_bootstrap_activation_options'); ?>
      <table class="form-table">
        <tr valign="top"><th scope="row"><?php _e('Create static front page?', 'bbln_bootstrap'); ?></th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><span><?php _e('Create static front page?', 'bbln_bootstrap'); ?></span></legend>
              <select name="bbln_bootstrap_theme_activation_options[create_front_page]" id="create_front_page">
                <option selected="selected" value="true"><?php echo _e('Yes', 'bbln_bootstrap'); ?></option>
                <option value="false"><?php echo _e('No', 'bbln_bootstrap'); ?></option>
              </select>
              <p class="description"><?php printf(__('Create a page called Home and set it to be the static front page', 'bbln_bootstrap')); ?></p>
            </fieldset>
          </td>
        </tr>
        <tr valign="top"><th scope="row"><?php _e('Change permalink structure?', 'bbln_bootstrap'); ?></th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><span><?php _e('Update permalink structure?', 'bbln_bootstrap'); ?></span></legend>
              <select name="bbln_bootstrap_theme_activation_options[change_permalink_structure]" id="change_permalink_structure">
                <option selected="selected" value="true"><?php echo _e('Yes', 'bbln_bootstrap'); ?></option>
                <option value="false"><?php echo _e('No', 'bbln_bootstrap'); ?></option>
              </select>
              <p class="description"><?php printf(__('Change permalink structure to /&#37;postname&#37;/', 'bbln_bootstrap')); ?></p>
            </fieldset>
          </td>
        </tr>
        <tr valign="top"><th scope="row"><?php _e('Create navigation menu?', 'bbln_bootstrap'); ?></th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><span><?php _e('Create navigation menu?', 'bbln_bootstrap'); ?></span></legend>
              <select name="bbln_bootstrap_theme_activation_options[create_navigation_menus]" id="create_navigation_menus">
                <option selected="selected" value="true"><?php echo _e('Yes', 'bbln_bootstrap'); ?></option>
                <option value="false"><?php echo _e('No', 'bbln_bootstrap'); ?></option>
              </select>
              <p class="description"><?php printf(__('Create the Primary Navigation menu and set the location', 'bbln_bootstrap')); ?></p>
            </fieldset>
          </td>
        </tr>
        <tr valign="top"><th scope="row"><?php _e('Add pages to menu?', 'bbln_bootstrap'); ?></th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><span><?php _e('Add pages to menu?', 'bbln_bootstrap'); ?></span></legend>
              <select name="bbln_bootstrap_theme_activation_options[add_pages_to_primary_navigation]" id="add_pages_to_primary_navigation">
                <option selected="selected" value="true"><?php echo _e('Yes', 'bbln_bootstrap'); ?></option>
                <option value="false"><?php echo _e('No', 'bbln_bootstrap'); ?></option>
              </select>
              <p class="description"><?php printf(__('Add all current published pages to the Primary Navigation', 'bbln_bootstrap')); ?></p>
            </fieldset>
          </td>
        </tr>
      </table>
      <?php submit_button(); ?>
    </form>
  </div>

<?php }

function bbln_bootstrap_theme_activation_action() {
  if (!($bbln_bootstrap_theme_activation_options = bbln_bootstrap_get_theme_activation_options())) {
    return;
  }

  if (strpos(wp_get_referer(), 'page=theme_activation_options') === false) {
    return;
  }

  if ($bbln_bootstrap_theme_activation_options['create_front_page'] === 'true') {
    $bbln_bootstrap_theme_activation_options['create_front_page'] = false;

    $default_pages = array(__('Home', 'bbln_bootstrap'));
    $existing_pages = get_pages();
    $temp = array();

    foreach ($existing_pages as $page) {
      $temp[] = $page->post_title;
    }

    $pages_to_create = array_diff($default_pages, $temp);

    foreach ($pages_to_create as $new_page_title) {
      $add_default_pages = array(
        'post_title' => $new_page_title,
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat, orci ac laoreet cursus, dolor sem luctus lorem, eget consequat magna felis a magna. Aliquam scelerisque condimentum ante, eget facilisis tortor lobortis in. In interdum venenatis justo eget consequat. Morbi commodo rhoncus mi nec pharetra. Aliquam erat volutpat. Mauris non lorem eu dolor hendrerit dapibus. Mauris mollis nisl quis sapien posuere consectetur. Nullam in sapien at nisi ornare bibendum at ut lectus. Pellentesque ut magna mauris. Nam viverra suscipit ligula, sed accumsan enim placerat nec. Cras vitae metus vel dolor ultrices sagittis. Duis venenatis augue sed risus laoreet congue ac ac leo. Donec fermentum accumsan libero sit amet iaculis. Duis tristique dictum enim, ac fringilla risus bibendum in. Nunc ornare, quam sit amet ultricies gravida, tortor mi malesuada urna, quis commodo dui nibh in lacus. Nunc vel tortor mi. Pellentesque vel urna a arcu adipiscing imperdiet vitae sit amet neque. Integer eu lectus et nunc dictum sagittis. Curabitur commodo vulputate fringilla. Sed eleifend, arcu convallis adipiscing congue, dui turpis commodo magna, et vehicula sapien turpis sit amet nisi.',
        'post_status' => 'publish',
        'post_type' => 'page'
      );

      $result = wp_insert_post($add_default_pages);
    }

    $home = get_page_by_title(__('Home', 'bbln_bootstrap'));
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home->ID);

    $home_menu_order = array(
      'ID' => $home->ID,
      'menu_order' => -1
    );
    wp_update_post($home_menu_order);
  }

  if ($bbln_bootstrap_theme_activation_options['change_permalink_structure'] === 'true') {
    $bbln_bootstrap_theme_activation_options['change_permalink_structure'] = false;

    if (get_option('permalink_structure') !== '/%postname%/') {
      global $wp_rewrite;
      $wp_rewrite->set_permalink_structure('/%postname%/');
      flush_rewrite_rules();
    }
  }

  if ($bbln_bootstrap_theme_activation_options['create_navigation_menus'] === 'true') {
    $bbln_bootstrap_theme_activation_options['create_navigation_menus'] = false;

    $bbln_bootstrap_nav_theme_mod = false;

    $primary_nav = wp_get_nav_menu_object(__('Primary Navigation', 'bbln_bootstrap'));

    if (!$primary_nav) {
      $primary_nav_id = wp_create_nav_menu(__('Primary Navigation', 'bbln_bootstrap'), array('slug' => 'primary_navigation'));
      $bbln_bootstrap_nav_theme_mod['primary_navigation'] = $primary_nav_id;
    } else {
      $bbln_bootstrap_nav_theme_mod['primary_navigation'] = $primary_nav->term_id;
    }

    if ($bbln_bootstrap_nav_theme_mod) {
      set_theme_mod('nav_menu_locations', $bbln_bootstrap_nav_theme_mod);
    }
  }

  if ($bbln_bootstrap_theme_activation_options['add_pages_to_primary_navigation'] === 'true') {
    $bbln_bootstrap_theme_activation_options['add_pages_to_primary_navigation'] = false;

    $primary_nav = wp_get_nav_menu_object(__('Primary Navigation', 'bbln_bootstrap'));
    $primary_nav_term_id = (int) $primary_nav->term_id;
    $menu_items= wp_get_nav_menu_items($primary_nav_term_id);

    if (!$menu_items || empty($menu_items)) {
      $pages = get_pages();
      foreach($pages as $page) {
        $item = array(
          'menu-item-object-id' => $page->ID,
          'menu-item-object' => 'page',
          'menu-item-type' => 'post_type',
          'menu-item-status' => 'publish'
        );
        wp_update_nav_menu_item($primary_nav_term_id, 0, $item);
      }
    }
  }

  update_option('bbln_bootstrap_theme_activation_options', $bbln_bootstrap_theme_activation_options);
}
add_action('admin_init','bbln_bootstrap_theme_activation_action');

function bbln_bootstrap_deactivation() {
  delete_option('bbln_bootstrap_theme_activation_options');
}
add_action('switch_theme', 'bbln_bootstrap_deactivation');

/**
 * Hide duplicate tgmpa notification when activating theme
 */
function hide_tgmpa_error() {
    echo "<style>
      #setting-error-tgmpa.below-h2 {
        display: none;
      }
    </style>";
}
add_action('admin_head', 'hide_tgmpa_error');

?>