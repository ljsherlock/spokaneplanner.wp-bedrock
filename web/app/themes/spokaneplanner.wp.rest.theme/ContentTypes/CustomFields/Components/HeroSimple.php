<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class HeroSimple extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $heroMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'spacePostHeroMetabox',
      'title'        => esc_html__( 'Hero', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on' => $showOn,
    ));

    $heroMetabox->add_field(array(
      'name'    => 'Background Image',
      'id'      => self::$prefix . 'backgroundImage',
      'type'    => 'file',
      'description'  => 'Simply fill out the media you want to be the background (image, video, or carousel). If 2 or more are selected, 
      the will be prefered in the following order: Carousel, Video, Image.'
    ));

    $heroMetabox->add_field(array(
      'name'    => 'Background Video',
      'id'      => self::$prefix . 'heroBackgroundVideo',
      'type'    => 'text_url',
      'description'  => 'An external Vimeo link must be used for performance and browser support.',
    ));

    $heroMetabox->add_field(array(
      'name'    => 'Carousel Images',
      'id'      => self::$prefix . 'heroBackgroundCarousel',
      'type'    => 'file_list',
    ));  
  }
}