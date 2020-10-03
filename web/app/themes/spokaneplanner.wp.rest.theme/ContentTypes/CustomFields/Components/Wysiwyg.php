<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class Wysiwyg extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array(), $title, $id) {
    $wysiwygmetabox = new_cmb2_box( array(
      'id'           => 'wysiwygmetabox',
      'title'        => esc_html__( $title, 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on' => $showOn
    ));

    $wysiwygmetabox->add_field(array(
      'name'    => $title,
      'id'      => $id,
      'type'    => 'wysiwyg',
    ));  
  }
}