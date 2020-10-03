<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class FeaturedPosts extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {

    $featuredPostsMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'featuredPostsMeta',
      'title'        => esc_html__( 'Featured Posts', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true,
      'show_on'      => $showOn,
      'closed'       => true, // true to keep the metabox closed by default
    ));

    $featuredPostsGroup = $featuredPostsMetabox->add_field(array(
      'desc' => esc_html__( 'Feature Posts to appear at the bototm of the page', 'cmb2' ),
      'id'   => 'featuredPosts',
      'type' => 'group',
      'title' => 'Featured Posts',
      'description' => __( '', 'cmb2' ),
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'   => __( 'Item {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'remove_button' => __( 'Remove post', 'cmb2' ),
        'add_button' => __( 'Add post', 'cmb2' ),
        'sortable'      => true, // beta
        'limit'         => 4
      ),
    ));

    $allPostsAndPages = self::returnPosts(array('work'));
    $featuredPostsMetabox->add_group_field($featuredPostsGroup, array(
      'name' => esc_html__( 'Post', 'cmb2' ),
      'desc' => '<p class="cmb2-metabox-description">Select a post or page to link to.</p>',
      'id'   =>  'post',
      'type' => 'select',
      'default'          => 'custom',
      'show_option_none' => true,
      'select_all_button' => false,
      'options' => $allPostsAndPages,
    ));
  }
}