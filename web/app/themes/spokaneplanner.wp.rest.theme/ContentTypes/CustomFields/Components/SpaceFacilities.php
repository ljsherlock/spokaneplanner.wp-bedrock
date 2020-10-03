<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class SpaceFacilities extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $facilitiesMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'facilitiesMetabox',
      'title'        => esc_html__( 'Facilities', 'cmb2' ),
      'object_types' => $objectTypes,
      'show_on'      => $showOn,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
    ));

    $facilitiesMetabox->add_field(array(
      'name'    => 'Content',
      'id'      => self::$prefix . 'facilitiesContent',
      'type'    => 'wysiwyg',
    ));
    
    // $facilitiesMetabox->add_field(array(
    //   'name'    => 'Image',
    //   'id'      => self::$prefix . 'facilitiesImage',
    //   'type'    => 'file',
    // ));

    $facilitiesMetabox->add_field(array(
      'name'    => '3D Experience',
      'id'      => self::$prefix . 'facilities3dUrl',
      'type'    => 'text_url',
    ));

    $facilitiesMetabox->add_field(array(
      'name'    => 'Image if not 3D experience',
      'id'      => self::$prefix . 'facilities3dUrlImage',
      'type'    => 'file',
    ));
  }
}