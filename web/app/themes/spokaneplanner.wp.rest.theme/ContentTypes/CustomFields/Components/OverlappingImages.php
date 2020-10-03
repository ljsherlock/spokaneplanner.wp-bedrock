<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class OverlappingImages extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $testimoninalImagesMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'testimoninalImagesMetabox',
      'title'        => esc_html__( 'Overlapping Images', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on'      => $showOn, 
    ));

    $testimoninalImagesMetabox->add_field(array(
      'name'    => 'Testimonial Image 1',
      'id'      => self::$prefix . 'overlappingImages1',
      'type'    => 'file',
    ));  

    $testimoninalImagesMetabox->add_field(array(
      'name'    => 'testimonial Image 2',
      'id'      => self::$prefix . 'overlappingImages2',
      'type'    => 'file',
    ));  

    $testimoninalImagesMetabox->add_field(array(
      'name'    => 'Testimonial Image 3',
      'id'      => self::$prefix . 'overlappingImages3',
      'type'    => 'file',
    ));  

    $testimoninalImagesMetabox->add_field(array(
      'name'    => 'Testimonial Image 4',
      'id'      => self::$prefix . 'overlappingImages4',
      'type'    => 'file',
      'description' => "For use in the 'Portrait' template only."
    ));  
  }
}