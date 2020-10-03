<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class Gallery extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $galleryMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'galleryMetabox',
      'title'        => esc_html__( 'Gallery', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on' => $showOn
    ));

    $galleryMetabox->add_field(array(
      'name'    => 'Gallery',
      'id'      => self::$prefix . 'gallery',
      'type'    => 'file_list',
    ));  
  }
}