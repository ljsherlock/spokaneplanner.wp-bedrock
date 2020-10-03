<?php

namespace ContentTypes\CustomPostTypes;

class Space extends CustomPost {

  /**
   * registerPostType
   *
   * @return void
   */
  public static function registerPostType() {
    self::$name = "spaces";

    self::$singular = "Space";

    self::$plural = "Spaces";
    
    self::$icon = 'dashicons-location';

    self::args_and_labels();

    self::$args['supports'] = array( 'title', 'thumbnail', 'editor', 'page-attributes');
    self::$args['menu_position'] = 6;

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
