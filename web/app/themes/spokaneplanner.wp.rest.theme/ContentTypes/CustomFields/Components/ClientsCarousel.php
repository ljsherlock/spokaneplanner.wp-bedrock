<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class ClientsCarousel extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $clientsMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'spaceClientsMetabox',
      'title'        => esc_html__( 'Clients', 'cmb2' ),
      'object_types' => $objectTypes,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
      'show_on'      => $showOn,
    ));

    $clientGroupField = $clientsMetabox->add_field(array(
      'id'   => 'clientsCarousel',
      'type' => 'group',
      'title' => 'Clients Carousel',
      'description' => __( '', 'cmb2' ),
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'   => __( 'Client {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'remove_button' => __( 'Remove client', 'cmb2' ),
        'add_button' => __( 'Add client', 'cmb2' ),
        'sortable'      => true, // beta
      ),
    ));

    $clientsMetabox->add_group_field($clientGroupField, array(
      'name'    => 'Client Logo',
      // 'desc'    => "The background video (Must use 'WebM' format)",
      'id'      => 'logo',
      'type'    => 'file',
    ));

    $clientsMetabox->add_group_field($clientGroupField, array(
      'name'    => 'Client Logo (hover)',
      // 'desc'    => "The background video (Must use 'WebM' format)",
      'id'      => 'logoHover',
      'type'    => 'file',
    ));

    $clientsMetabox->add_group_field($clientGroupField, array(
      'name'    => 'Client Link',
      'desc'    => "The background video (Must use 'WebM' format)",
      'id'      => 'link',
      'type'    => 'text_url',
    ));

  }
}