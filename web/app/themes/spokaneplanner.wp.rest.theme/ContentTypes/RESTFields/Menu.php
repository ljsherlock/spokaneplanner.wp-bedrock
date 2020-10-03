<?php

namespace ContentTypes\RESTFIelds;

class Menu extends \ContentTypes\CustomFields {
/**
 *
 * @return void
 */
	public static function registerFields() {
    add_action( 'rest_api_init', function () {
      register_rest_route( 'wp/v2', 'menu/primary', array(
          'methods' => 'GET',
          'callback' => array(__CLASS__, 'getPrimaryMenu'),
      ));
    });
  }

  public static function getPrimaryMenu() {
    // Replace your menu name, slug or sID carefully
    return wp_get_nav_menu_items('Primary');
  }
}