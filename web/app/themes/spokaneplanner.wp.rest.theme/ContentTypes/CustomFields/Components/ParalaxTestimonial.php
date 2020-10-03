<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class ParalaxTestimonial extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $testimonialMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'paralaxTestimonialMetabox',
      'title'        => esc_html__( 'Paralax Testimonial', 'cmb2' ),
      'object_types' => $objectTypes, // Post type
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on'      => $showOn,
    ));

    $testimonialMetabox->add_field(array(
      'name'    => 'Paralax Image',
      'id'      => self::$prefix . 'testimonialParalaxImage',
      'type'    => 'file',
    ));

    $testimonialMetabox->add_field(array(
      'name'    => 'Show Quote Icon',
      'id'      => 'testimonialParalaxQuoteicon',
      'type'    => 'checkbox',
    ));

    $testimonialMetabox->add_field(array(
      'name'    => 'Paragraph',
      'id'      => self::$prefix . 'paralaxTestimonialContent',
      'type'    => 'wysiwyg',
    ));
    
    $testimonialMetabox->add_field(array(
      'name'    => 'Author',
      'id'      => self::$prefix . 'paralaxTestimonialAuthor',
      'type'    => 'text',
    ));
  }
}