<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class ServicesMainContent extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $mainContentMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'mainContentMetabox',
      'title'        => esc_html__( 'Main Content', 'cmb2' ),
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'object_types' => $objectTypes,
      'show_on'      => $showOn,
      'closed'       => true, // true to keep the metabox closed by default
    ));

    $mainContentMetabox->add_field(array(
      'name'    => 'Text Block 1',
      'id'      => self::$prefix . 'textBlock1',
      'type'    => 'wysiwyg',
    ));

    $mainContentMetabox->add_field(array(
      'name'    => 'Text Block Image 1',
      'id'      => self::$prefix . 'textBlockImage1',
      'type'    => 'file',
    ));

    $mainContentMetabox->add_field(array(
      'name'    => 'Paralax Image',
      'id'      => self::$prefix . 'servicesParalaxImage',
      'type'    => 'file',
    ));

    $mainContentMetabox->add_field(array(
      'name'    => 'Text Block 2',
      'id'      => self::$prefix . 'textBlock2',
      'type'    => 'wysiwyg',
    ));

    $mainContentMetabox->add_field(array(
      'name'    => 'Text Block Image 2',
      'id'      => self::$prefix . 'textBlockImage2',
      'type'    => 'file',
    ));
  }
}
