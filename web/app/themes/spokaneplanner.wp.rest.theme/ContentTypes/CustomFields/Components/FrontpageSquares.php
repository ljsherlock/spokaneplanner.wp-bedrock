<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class FrontpageSquares extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {

    $frontpageMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'frontpageMetabox',
      'title'        => esc_html__( 'Front Page Squares', 'cmb2' ),
      'object_types' => array( 'page' ), // Post type
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true,
      'show_on'      => array(
        'id' => array( 5 ),
      ), 
    ));

    $frontpageSquaresGroup = $frontpageMetabox->add_field(array(
      'desc' => esc_html__( 'Captions to display on the side of the logo', 'cmb2' ),
      'id'   => self::$prefix . 'frontpageSquares',
      'type' => 'group',
      'title' => 'Frontpage Squares',
      'description' => __( '', 'cmb2' ),
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'   => __( 'Item {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'remove_button' => __( 'Remove square', 'cmb2' ),
        'add_button' => __( 'Add square', 'cmb2' ),
        'sortable'      => true, // beta
      ),
    ));

    $allPostsAndPages = self::getAllPostsAndPages();
    $frontpageMetabox->add_group_field($frontpageSquaresGroup, array(
      'name' => esc_html__( 'Link to page or post', 'cmb2' ),
      'desc' => '<p class="cmb2-metabox-description">Select a post or page to link to.</p>',
      'id'   =>  'post',
      'type' => 'select',
      'default'          => 'custom',
      'show_option_none' => true,
      'select_all_button' => false,
      'options' => $allPostsAndPages,
    ));

    $frontpageMetabox->add_group_field($frontpageSquaresGroup, array(
      'name'    => 'Small Copy',
      'desc'    => 'Small copy that will show on hover (Be mindful of the length of text you add).',
      'id'      => 'smallCopy',
      'type'    => 'textarea',
    ));

    $frontpageMetabox->add_group_field($frontpageSquaresGroup, array(
      'name' => 'Background Video',
      'desc' =>  "<br /><strong>GIF</strong> must be used. 
      <br /><br />
      <strong>Frames Per Second:</strong> 15 - 30<br />
      <strong>Max Size:</strong> 300 x 200 px<br />
      <strong>Duration:</strong> 15 - 30 seconds maxVimeo links<br />",
      'type' => 'title',
      'id'   => 'squaresInfo'
    ));


    $frontpageMetabox->add_group_field($frontpageSquaresGroup, array(
      'name'    => 'Background Video',
      'id'      => 'backgroundVideo',
      'type'    => 'file',
      'query_args' => array(
        'type' => array(
          'image/gif',
        ),
      ),
    ));

    $frontpageMetabox->add_group_field($frontpageSquaresGroup, array(
      'name'    => 'Background Image',
      'id'      => 'backgroundImage',
      'desc'    => 'Used for mobile devices.',
      'type'    => 'file',
      'query_args' => array(
        'type' => array(
          'image/jpeg',
        ),
      ),
    ));

    $frontpageMetabox->add_group_field($frontpageSquaresGroup, array(
      'name'    => 'Square fill',
      'desc'    => 'Fill colour of the square.',
      'id'      => 'backgroundColour',
      'type'    => 'colorpicker',
    ));

    $frontpageMetabox->add_group_field($frontpageSquaresGroup, array(
      'name'    => 'Custom Link',
      'desc'    => 'A custom or external (not on this site) link.',
      'id'      => 'customLink',
      'type'    => 'text',
    ));
  }
}