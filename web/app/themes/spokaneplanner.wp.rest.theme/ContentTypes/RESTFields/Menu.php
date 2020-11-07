<?php

namespace ContentTypes\RESTFIelds;

class Menu extends \ContentTypes\CustomFields {
/**
 *
 * @return void
 */
	public static function registerFields() {

    add_action( 'rest_api_init', function () {
      register_rest_route( 'wp/v2', 'menu', array(
        'methods' => 'GET',
        'callback' => array(__CLASS__, 'getMenu'),
      ));
    });
  }

  public static function getMenu($request) {
    $name = $request['name'];

    // Replace your menu name, slug or sID carefully
    $menu_items = wp_get_nav_menu_items($name);

    foreach($menu_items as $menu_item) {
      // ALTERNATIVE: $slug = get_post_field( 'post_name', $menu_item->object_id );
      $slug = basename( get_permalink($menu_item->object_id) );
      $menu_item->slug = $slug;
    }

    return $menu_items;
  }
}