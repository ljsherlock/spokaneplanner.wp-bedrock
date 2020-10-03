<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class ParalaxImage extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $paralaxImageMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'paralaxImageMetabox',
      'title'        => esc_html__( 'Paralax Image', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on' => $showOn,
    ));

    $paralaxImageMetabox->add_field(array(
      'name'    => 'Paralax Image',
      'id'      => self::$prefix . 'paralaxImage',
      'type'    => 'file',
    ));  
  }
}