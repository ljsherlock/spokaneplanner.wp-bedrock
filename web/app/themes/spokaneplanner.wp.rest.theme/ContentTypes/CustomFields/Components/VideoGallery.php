<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class VideoGallery extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {

    $videoGalleryMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'videoGalleryMetabox',
      'title'        => esc_html__( 'Video Gallery', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on' => $showOn
    ));

    $videoGalleryGroup = $videoGalleryMetabox->add_field(array(
      'name'    => 'Video Gallery',
      'id'      => self::$prefix . 'videoGallery',
      'type'    => 'group',
      'title' => 'Video Gallery',
      'description' => __( '', 'cmb2' ),
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'   => __( 'Video {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'remove_button' => __( 'Remove video', 'cmb2' ),
        'add_button' => __( 'Add video', 'cmb2' ),
        'sortable'      => true, // beta
        'closed'     => true, // true
      ),
    )); 
    
    $videoGalleryMetabox->add_group_field($videoGalleryGroup, array(
      'name'    => 'Video Iframe URL',
      'id'      => 'url',
      'type'    => 'text_url',
      'attributes'  => array(
        'required'    => 'required',
      ),
    ));

    $videoGalleryMetabox->add_group_field($videoGalleryGroup, array(
      'name'    => 'Video Gallery Thumbnail',
      'id'      => 'thumbnail',
      'type'    => 'file',
      'attributes'  => array(
        'required'    => 'required',
      ),
    ));

  }
}