<?php

namespace ContentTypes;

class Images {

  /*--------------+-------+--------+------+----------+
  | name         | width | height | crop | ratio    |
  +--------------+-------+--------+------+----------+
  | 1:1                                             |
  | desktop      | 1280  | 1280   | hard | 1:1      |
  | tablet       | 853   | 853    | hard | 1:1      |
  | mobile       | 533   | 533    | hard | 1:1      |
  | 3:2                                             |
  | full         |       |        | N/A  | N/A      |
  | desktop-x2   | 3840  | 2560   | hard | 3:2      |
  | desktop      | 1920  | 1280   | hard | 3:2      |
  | desktop-tiny | 48    | 32     | hard | 3:2      |
  | desktop-x2   | 3840  | 2560   | hard | 3:2      |
  | desktop      | 1920  | 1280   | hard | 3:2      |
  | desktop-tiny | 48    | 32     | hard | 3:2      |
  | tablet-x2    | 2560  | 1706   | hard | 1280:853 |
  | tablet       | 1280  | 853    | hard | 1280:853 |
  | tablet-tiny  | 32    | 21     | hard | 32:21    |
  | mobile-x2    | 1600  | 1066   | hard | 800:533  |
  | mobile       | 800   | 533    | hard | 800:533  |
  | mobile-tiny  | 20    | 13     | hard | 20:13    |
  | portrait-desktop | 1140 | 1520 | hard | 3:4     |
  | portrait-mobile  | 570  | 760  | hard | 3:4     |

  570 798
  +--------------+-------+--------+------+----------*/

  private static $mobileImageSizes = null;
  private static $tabletImageSizes = null;
  private static $desktopImageSizes = null;

  public static function setup() {
    add_action('after_setup_theme', array(__CLASS__, 'add_image_sizes'));
    add_action('after_setup_theme', array(__CLASS__, 'custom_image_size'));
  }

  public static function custom_image_size() {
    // Set default values for the upload media box
    // update_option('image_default_align', 'center' );
    update_option('image_default_size', 'large' );

}

  /**
  *  Add Image Sizes
  */
  public static function add_image_sizes() {
    add_theme_support('post-thumbnails');

    self::$mobileImageSizes = array(
      array(
        'name' => 'mobile-x2',
        'width' => 1600,
        'height' => 1066,
      ),
      array(
        'name' => 'mobile',
        'width' => 800,
        'height' => 533,
      ),
      array(
        'name' => 'mobile-1x1',
        'width' => 533,
        'height' => 533,
      ),
      array(
        'name' => 'mobile-3x4',
        'width' => 570,
        'height' => 760,
      ),
    );
    self::mobileImageSizes();

    self::$tabletImageSizes = array(
      array(
        'name' => 'tablet-x2',
        'width' => 2560,
        'height' => 1706,
      ),
      array(
        'name' => 'tablet',
        'width' => 1280,
        'height' => 853,
      ),
      array(
        'name' => 'tablet-1x1',
        'width' => 853,
        'height' => 853,
      )
    );
    self::tabletImageSizes();
    
    self::$desktopImageSizes = array(
      array(
        'name' => 'desktop-x2',
        'width' => 3840,
        'height' => 2560,
      ),
      array(
        'name' => 'desktop',
        'width' => 1920,
        'height' => 1280,
      ),
      array(
        'name' => 'desktop-1x1',
        'width' => 1280,
        'height' => 1280,
      ),
      array(
        'name' => 'tiny-1x1',
        'width' => 21, 
        'height' => 21,
      ),
      array(
        'name' => 'tiny',
        'width' => 32,
        'height' => 21,
      ),
      array(
        'name' => 'desktop-3x4',
        'width' => 1140,
        'height' => 1520,
      ),
    );
    self::desktopImageSizes();
  }

  private static function mobileImageSizes() {
    self::loopImageSizes(self::$mobileImageSizes);
  }

  private static function tabletImageSizes() {
    self::loopImageSizes(self::$tabletImageSizes);
  }

  private static function desktopImageSizes() {
    self::loopImageSizes(self::$desktopImageSizes);
  }

  public static function loopImageSizes ($sizes) {
    foreach ($sizes as $key => $value) {
      \add_image_size($value['name'], $value['width'], $value['height'], true);
    }
  }
}
