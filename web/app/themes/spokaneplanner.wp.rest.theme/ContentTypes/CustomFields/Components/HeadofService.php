<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class HeadofService extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $options = array();

    $work = new \Controllers\Archive(array('query' => array(
      'posts_per_page' => -1,
      'post_type' => array('team-member'),
    )));

    $posts = $work->returnData('archive')['posts'];

    foreach($posts as $post) {
      $options[$post->id] = __( $post->title, 'cmb2' );
    }

    $headOfMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'headOfMetabox',
      'title'        => esc_html__( 'Head of Service', 'cmb2' ),
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'object_types' => $objectTypes,
      'show_on'      => $showOn,
      'closed'       => true, // true to keep the metabox closed by default
    ));

    $headOfMetabox->add_field(array(
      'name'    => 'Team Member',
      'id'      => self::$prefix . 'meetTeamMember',
      'type'    => 'select',
      'default'          => 'custom',
      'show_option_none' => true,
      'select_all_button' => false,
      'options' => $options,
    ));  
  }
}