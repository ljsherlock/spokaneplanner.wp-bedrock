<?php

namespace ContentTypes\CustomPostTypes;

abstract class CustomPost {
  /**
  * @var String $name Post type name
  */
  public static $name = '';

  /**
  * @var String $singular Nice Singular name
  */
  public static $singular = '';

  /**
  * @var String $plural Nice plural name
  */
  public static $plural = '';

  /**
  * @var String $icon Dash icon
  */
  public static $icon = '';

  /**
  * @var String $taxonomy Taxonomy type name
  */
  public static $taxonomy = '';

  /**
  * @var String $taxonomy Taxonomy type name
  */
  public static $taxonomy_args = '';

  /**
  *   @var Array $args Query arguments
  */
  public static $args = '';

  /**
  *   @var Array $args Query arguments
  */
  public static $labels = '';

  /**
   * args_and_labels
   *
   * @return void
   */
  public static function args_and_labels() {

    // add_filter('use_block_editor_for_post_type', '__return_false', 10);

    add_theme_support('post-thumbnails');

    self::$labels = array(
      'name'               => _x(self::$plural, 'post type general name', LJSHERLOCK_TEXT_DOMAIN),
      'singular_name'      => _x(self::$singular, 'post type singular name', LJSHERLOCK_TEXT_DOMAIN),
      'menu_name'          => _x(self::$plural, 'admin menu', LJSHERLOCK_TEXT_DOMAIN),
      'name_admin_bar'     => _x(self::$singular, 'add new on admin bar', LJSHERLOCK_TEXT_DOMAIN),
      'add_new_item'       => __("Add New " . self::$singular . ' Post', LJSHERLOCK_TEXT_DOMAIN),
      'new_item'           => __("New " . self::$singular, LJSHERLOCK_TEXT_DOMAIN),
      'edit_item'          => __("Edit " . self::$singular, LJSHERLOCK_TEXT_DOMAIN),
      'view_item'          => __("View " . self::$singular, LJSHERLOCK_TEXT_DOMAIN),
      'all_items'          => __("All " . self::$plural, LJSHERLOCK_TEXT_DOMAIN),
      'search_items'       => __("Search " . self::$plural, LJSHERLOCK_TEXT_DOMAIN),
      'parent_item_colon'  => __("Parent " . self::$plural, LJSHERLOCK_TEXT_DOMAIN),
      'not_found'          => __("No " . self::$plural . " found.", LJSHERLOCK_TEXT_DOMAIN),
      'not_found_in_trash' => __("No " . self::$plural . " found in Trash.", LJSHERLOCK_TEXT_DOMAIN)
    );

    self::$args = array(
      'labels'             => self::$labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_rest'       => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => self::$name ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon'          => self::$icon,
    );
  }

  /**
   * register
   *
   * @return void
   */
  public static function register() {
    if(!empty(self::$taxonomy)){
      foreach(self::$taxonomy as $key => &$taxonomy) {
        $taxonomy['args'] = self::$taxonomy_args[$key];
      }
      self::register_taxonomy();
    }
    self::register_post_type();
  }

  /**
   * register_post_type
   *
   * @return void
   */
  public static function register_post_type(){
    register_post_type( self::$name , self::$args );
  }

  /**
   * register_taxonomy
   *
   * @return void
   */
  public static function register_taxonomy () {
    foreach( self::$taxonomy as $taxonomy ) {
      register_taxonomy($taxonomy['name'], self::$name, $taxonomy['args']);
    }
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
  }
}