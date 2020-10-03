<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class ShowreelVideoLightbox extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $showreelVideoLightbox = new_cmb2_box( array(
      'id'           => self::$prefix . 'showreelVideoLightbox',
      'title'        => esc_html__( 'Showreel', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on' => $showOn,
      'closed'       => true, // true to keep the metabox closed by default
    ));

    $showreelVideoLightbox->add_field(array(
      'name'    => 'Video URL',
      'id'      => self::$prefix . 'showreelVideoLightboxURL',
      'type'    => 'text_url',
    ));  
  }
}