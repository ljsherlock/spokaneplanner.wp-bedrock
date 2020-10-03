<?php

namespace ContentTypes\CustomPostTypes;

class Work extends CustomPost {

  /**
   * registerPostType
   *
   * @return void
   */
  public static function registerPostType() {
    self::$name = "work";

    self::$singular = "Work";

    self::$plural = "Work";
    
    self::$icon = 'dashicons-awards';

    self::args_and_labels();

    self::$args['supports'] = array( 'title', 'thumbnail', 'editor', 'page-attributes');
    self::$args['menu_position'] = 6;

    self::$taxonomy = array(
      array(
        'name' => 'work-categories',
        'single' => 'Work Category',
        'plural' => 'Work Categories',
      ),
      array(
        'name' => 'client',
        'single' => 'Client',
        'plural' => 'Clients',
      ),
      array(
        'name' => 'portfolio',
        'single' => 'Portfolio',
        'plural' => 'Portfolios',
      )
    );

    self::$taxonomy_args = array(
      array(
        'hierarchical' => true,
        'query_var'    => true,
        'label' => __('Work Types', LJSHERLOCK_TEXT_DOMAIN),
        'public' => true,
        'rewrite' => array( 'slug' => self::$name . '/' . self::$taxonomy[0]['name'], 'with_front' => false ),
        'labels' => array(
          'name'          => 'Work Categories',
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
        array(
          'hierarchical' => true,
          'query_var'    => true,
          'label' => __('Clients', LJSHERLOCK_TEXT_DOMAIN),
          'public' => true,
          'rewrite' => array( 'slug' => self::$name . '/' . self::$taxonomy[1]['name'], 'with_front' => false ),
          'labels' => array(
            'name'          => 'Clients',
            'singular_name' => self::$taxonomy[1]['single'],
            'search_items'  => 'Search ' . self::$taxonomy[1]['plural'],
            'edit_item'     => 'Edit ' . self::$taxonomy[1]['single'],
            'add_new_item'  => 'Add New ' . self::$taxonomy[1]['single'],
            'view_item' => 'View ' . self::$taxonomy[1]['single'],
            'not_found'          => __("No " . self::$taxonomy[1]['plural'] . " found.", LJSHERLOCK_TEXT_DOMAIN),
            'not_found_in_trash' => __("No " . self::$taxonomy[1]['plural'] . " found in Trash.", LJSHERLOCK_TEXT_DOMAIN),
            'all_items'          => __("All " . self::$taxonomy[1]['plural'], LJSHERLOCK_TEXT_DOMAIN),
            'search_items'       => __("Search " . self::$taxonomy[1]['plural'], LJSHERLOCK_TEXT_DOMAIN),
            'parent_item'       => __( "Parent " . self::$taxonomy[1]['single'], LJSHERLOCK_TEXT_DOMAIN ),
            'parent_item_colon'  => __("Parent " . self::$taxonomy[1]['single'] . ":", LJSHERLOCK_TEXT_DOMAIN),
          )
        ),
        array(
          'hierarchical' => true,
          'query_var'    => true,
          'label' => __('Portfolios', LJSHERLOCK_TEXT_DOMAIN),
          'public' => true,
          'rewrite' => array( 'slug' => self::$name . '/' . self::$taxonomy[2]['name'], 'with_front' => false ),
          'labels' => array(
            'name'          => 'Portfolios',
            'singular_name' => self::$taxonomy[2]['single'],
            'search_items'  => 'Search ' . self::$taxonomy[2]['plural'],
            'edit_item'     => 'Edit ' . self::$taxonomy[2]['single'],
            'add_new_item'  => 'Add New ' . self::$taxonomy[2]['single'],
            'view_item' => 'View ' . self::$taxonomy[2]['single'],
            'not_found'          => __("No " . self::$taxonomy[2]['plural'] . " found.", LJSHERLOCK_TEXT_DOMAIN),
            'not_found_in_trash' => __("No " . self::$taxonomy[2]['plural'] . " found in Trash.", LJSHERLOCK_TEXT_DOMAIN),
            'all_items'          => __("All " . self::$taxonomy[2]['plural'], LJSHERLOCK_TEXT_DOMAIN),
            'search_items'       => __("Search " . self::$taxonomy[2]['plural'], LJSHERLOCK_TEXT_DOMAIN),
            'parent_item'       => __( "Parent " . self::$taxonomy[2]['single'], LJSHERLOCK_TEXT_DOMAIN ),
            'parent_item_colon'  => __("Parent " . self::$taxonomy[2]['single'] . ":", LJSHERLOCK_TEXT_DOMAIN),
          )
        )
    );

    self::register();
  }

  /**
   * add_default_term
   *
   * @param  mixed $ID
   *
   * @return void
   */
  public static function add_default_term($ID) {
    $current_post = get_post( $ID );
    wp_set_object_terms( $ID, 'all', 'type', true );
    // This makes sure the taxonomy is only set when a new post is created
    // if ( $current_post->post_date == $current_post->post_modified ) {
    // }
  }
}
