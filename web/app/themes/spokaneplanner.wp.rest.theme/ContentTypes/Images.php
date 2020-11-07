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
  | mobile-tiny  | 20     | 13     | hard | 20:13    |
  | portrait-desktop | 1140 | 1520 | hard | 3:4     |
  | portrait-mobile  | 570  | 760  | hard | 3:4     |

  570 798
  +--------------+-------+--------+------+----------*/

  private static $fullWidthImageSizes = null;
  private static $contentImageSizes = null;

  public static function setup() {
    add_action('after_setup_theme', array(__CLASS__, 'add_image_sizes'));
    add_action('after_setup_theme', array(__CLASS__, 'custom_image_size'));

    add_filter( 'image_size_names_choose', array(__CLASS__, 'my_custom_sizes') );
  }

  public static function custom_image_size() {
    // Set default values for the upload media box
    // update_option('image_default_align', 'center' );
    update_option('image_default_size', 'large' );
  } 

    // Make custom sizes selectable from WordPress admin.
  function my_custom_sizes( $size_names ) {
    $new_sizes = array(
      'fullWidthLarge' => __('full Width Large'),
      'fullWidthMedium' => __('fullWidthMedium'),
      'fullWidthSmall' => __('fullWidthSmall'),

      'fullWidthLargeRetina' => __('fullWidthLargeRetina'),
      'fullWidthMediumRetina' => __('fullWidthMediumRetina'),

      'contentMedium' => __('contentMedium'),
      'contentSmall' => __('contentSmall'),
      'contentMediumRetina' => __('contentMediumRetina'),

      'tiny' => __('Loading image'),
    );
    return array_merge( $size_names, $new_sizes );
  }

  /**
  *  Add Image Sizes
  */
  public static function add_image_sizes() {
    add_theme_support('post-thumbnails');

    self::$fullWidthImageSizes = array(
      array(
        'name' => 'tiny',
        'width' => 32,
        'height' => 21,
      ),
      array(
        'name' => 'fullWidthLarge',
        'width' => 1920,
        'height' => 1080,
      ),
      array(
        'name' => 'fullWidthMedium',
        'width' => 1280,
        'height' => 720,
      ),
      array(
        'name' => 'fullWidthSmall',
        'width' => 640,
        'height' => 360,
      ),
      array(
        'name' => 'fullWidthLargeRetina',
        'width' => 3840,
        'height' => 2160,
      ),
      array(
        'name' => 'fullWidthMediumRetina',
        'width' => 2560,
        'height' => 1440,
      ),
    );
    self::fullWidthImageSizes();

    self::$contentImageSizes = array(
      array(
        'name' => 'contentMedium',
        'width' => 1165,
        'height' => 720,
      ),
      array(
        'name' => 'contentSmall',
        'width' => 582,
        'height' => 360,
      ),
      array(
        'name' => 'contentMediumRetina',
        'width' => 2330,
        'height' => 1440,
      ),
    );
    self::contentImageSizes();
  }

  private static function fullWidthImageSizes() {
    self::loopImageSizes(self::$fullWidthImageSizes);
  }

  private static function contentImageSizes() {
    self::loopImageSizes(self::$contentImageSizes);
  }

  public static function loopImageSizes ($sizes) {
    foreach ($sizes as $key => $value) {
      \add_image_size($value['name'], $value['width'], $value['height'], true);
    }
  }
}
