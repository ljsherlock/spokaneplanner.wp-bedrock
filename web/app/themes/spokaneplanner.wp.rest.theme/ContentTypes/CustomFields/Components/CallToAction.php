<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class CallToAction extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $callToActionMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'CallToActionMetabox',
      'title'        => esc_html__( 'Call to Acion', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on' => $showOn
    ));

    $callToActionMetabox->add_field(array(
      'name'    => 'URL',
      'id'      => self::$prefix . 'CallToActionUrl',
      'type'    => 'text',
    ));  

    $callToActionMetabox->add_field(array(
      'name'    => 'Call to Action',
      'id'      => self::$prefix . 'CallToActionText',
      'type'    => 'text',
    ));  
  }
}