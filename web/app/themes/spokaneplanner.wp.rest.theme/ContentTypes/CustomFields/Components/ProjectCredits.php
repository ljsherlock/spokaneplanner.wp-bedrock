<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class ProjectCredits extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    
    $projectCredits = new_cmb2_box( array(
      'id'           => self::$prefix . 'projectCredits',
      'title'        => esc_html__( 'Project Credits', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on' => $showOn,
    ));

    $projectCredits->add_field(array(
      'name'    => 'Credits',
      'id'      => self::$prefix . 'project_credits',
      'type'    => 'wysiwyg',
    ));  
  }
}