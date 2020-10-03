<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class ContentEntryImage extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $contentImageMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'contentImageMetabox',
      'title'        => esc_html__( 'Content Entry Image', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on'      => $showOn
    ));

    $contentImageMetabox->add_field(array(
      'name'    => 'Content Image',
      'id'      => self::$prefix . 'contentImage',
      'type'    => 'file',
    ));
  }
}