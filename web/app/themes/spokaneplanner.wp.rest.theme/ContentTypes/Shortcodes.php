<?php

namespace ContentTypes;

class Shortcodes {
  /**
   * Widget Instances
   * @var array
   */
  public $shortcodes = array();


  /**
   * default_shortcodes
   *
   * @return void
   */
  private static function default_shortcodes () {
    return array(
        // array('class' =>'Shortcode__Button', 'name' => 'button'),
    );
  }

  /**
   * shortcodes_shortcodes
   *
   * @return void
   */
  private static function rough_hands_shortcodes () {
    return null;
  }

  /**
   * setup
   *
   * @param  mixed $shortcodes
   *
   * @return void
   */
  public static function setup () {
    self::register_shortcodes(self::default_shortcodes());

    $shortcodes = self::rough_hands_shortcodes();
    
    if (isset($shortcodes)) {
      self::register_shortcodes($shortcodes);
    }
  }

  /**
   * register_shortcodes
   *
   * @param  mixed $s
   *
   * @return void
   */
  private static function register_shortcodes ($s) {
    foreach ($s as $key => $shortcode) {
      # code...
      add_shortcode($shortcode['name'], array( 'ContentTypes\Shortcodes\\' . $shortcode['class'], 'shortcode'));
    }
  }
}
