<?php

namespace ContentTypes\CustomPostTypes;

class TeamMembers extends CustomPost {
  /**
   * registerPostType
   *
   * @return void
   */
  public static function registerPostType() {
    self::$name = "team-member";

    self::$singular = "Team Member";

    self::$plural = "Team Members";

    self::$icon = 'dashicons-groups';

    self::args_and_labels();

    self::$args['supports'] = array( 'title', 'thumbnail', 'editor');
    self::$args['menu_position'] = 8;

    self::$taxonomy = array(
      array(
        'name' => 'position',
        'single' => 'Position',
        'plural' => 'Positions',
      )
    );

    self::$taxonomy_args = array(
      array(
        'hierarchical' => true,
        'query_var'    => true,
        'label' => __('Positions', LJSHERLOCK_TEXT_DOMAIN),
        'public' => true,
        'rewrite' => array( 'slug' => self::$name . '/' . self::$taxonomy[0]['name'], 'with_front' => false ),
        'labels' => array(
          'name'          => 'Positions',
          'singular_name' => self::$taxonomy[0]['single'],
          'search_items'  => 'Search ' . self::$taxonomy[0]['plural'],
          'edit_item'     => 'Edit ' . self::$taxonomy[0]['single'],
          'add_new_item'  => 'Add New ' . self::$taxonomy[0]['single'],
          'view_item' => 'View ' . self::$taxonomy[0]['single'],
          'not_found'          => __("No " . self::$taxonomy[0]['plural'] . " found.", LJSHERLOCK_TEXT_DOMAIN),
          'not_found_in_trash' => __("No " . self::$taxonomy[0]['plural'] . " found in Trash.", LJSHERLOCK_TEXT_DOMAIN),
          'all_items'          => __("All " . self::$taxonomy[0]['plural'], LJSHERLOCK_TEXT_DOMAIN),
          'search_items'       => __("Search " . self::$taxonomy[0]['plural'], LJSHERLOCK_TEXT_DOMAIN),
          'parent_item'       => __( "Parent " . self::$taxonomy[0]['single'], LJSHERLOCK_TEXT_DOMAIN ),
          'parent_item_colon'  => __("Parent " . self::$taxonomy[0]['single'] . ":", LJSHERLOCK_TEXT_DOMAIN),
        )
      ),
    );

    // add_filter('use_block_editor_for_post_type', '__return_false', 10);

    self::register();
  }
}
