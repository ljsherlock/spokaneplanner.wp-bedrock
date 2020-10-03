<?php
/**
 * 
 * This class registers the metaboxes for the Theme Options
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields;

class ThemeOptions extends \ContentTypes\CustomFields {

  /**
   * registerFields
   *
   * @return void
   */
  public static function registerFields () {
    self::companyDetails();
    self::mapDetails();
    self::socialMediaLinks();
    self::anomalous_VisualsContacts();
  }

  public static function companyDetails() {
    $companyDetailsMetabox = new_cmb2_box( array(
      'id'           =>  self::$prefix . 'companyDetails',
      'title'        => esc_html__( 'Company Info', 'myprefix' ),
      'object_types' => array( 'options-page' ),
      'option_key'      => 'company-info',
    ));

    $companyDetailsMetabox->add_field( array(
    'name'    => __( 'Email Address ', 'cmb2' ),
    'id'      => 'emailAddress',
    'type'    => 'text_email',
    ));

    $companyDetailsMetabox->add_field( array(
      'name'    => __( 'Telephone No. ', 'cmb2' ),
      'id'      => 'telephoneNo',
      'type'    => 'text',
    ));

    $companyDetailsMetabox->add_field( array(
      'name'    => __( 'Address ', 'cmb2' ),
      'id'      => 'address',
      'type'    => 'text',
    ));

    $companyDetailsMetabox->add_field( array(
      'name'    => __( 'Google Maps Link ', 'cmb2' ),
      'id'      => 'gg_maps_link',
      'type'    => 'text_url',
    ));

    $companyDetailsMetabox->add_field( array(
      'name'    => __( 'Legal ', 'cmb2' ),
      'id'      => 'legalWysiwyg',
      'type'    => 'wysiwyg',
    ));
  }

  public static function mapDetails() {
    $mapMetabox = new_cmb2_box( array(
      'id'           =>  self::$prefix . 'Map',
      'title'        => esc_html__( 'Map', 'myprefix' ),
      'object_types' => array( 'options-page' ),
      'option_key'      => 'map',
      'parent_slug'  => 'company-info',
    ));

    $mapMetabox->add_field( array(
      'name'    => __( 'Longitude. ', 'cmb2' ),
      'id'      => self::$prefix . 'longitude',
      'type'    => 'text',
      'desc' => __( 'Enter the longitude', 'cmb2' ),
    ));
    
    $mapMetabox->add_field( array(
      'name'    => __( 'Latitude. ', 'cmb2' ),
      'id'      => self::$prefix . 'latitude',
      'type'    => 'text',
      'desc' => __( 'Enter the latitude', 'cmb2' ),
    ));
  }

  public static function socialMediaLinks() {
    $socialMediaMetabox = new_cmb2_box( array(
      'id'           =>  self::$prefix . 'SocialMediaLinks',
      'title'        => esc_html__( 'Social Media Links', 'myprefix' ),
      'object_types' => array( 'options-page' ),
      'option_key'      => 'social-media',
      'parent_slug'  => 'company-info',
    ));

    $socialMediaLinksGroup = $socialMediaMetabox->add_field(array(
      'desc' => esc_html__( 'Captions to display on the side of the logo', 'cmb2' ),
      'id'   => self::$prefix . 'socialMediaLinks',
      'type' => 'group',
      'title' => 'Social Media Links',
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'   => __( 'Item {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'remove_button' => __( 'Remove item', 'cmb2' ),
        'add_button' => __( 'Add item', 'cmb2' ),
        'sortable'      => true, // beta
      ),
    ));

    $socialMediaMetabox->add_group_field($socialMediaLinksGroup, array(
      'name'    => 'Social Media Platform',
      'id'      => 'platform',
      'type'    => 'select',
      'options'          => array(
        'facebook' => __( 'Facebook', 'cmb2' ),
        'instagram'   => __( 'Instagram', 'cmb2' ),
        'linkedin' => __( 'Linkedin', 'cmb2' ),
        'soundcloud'     => __( 'Soundcloud', 'cmb2' ),
        'twitter'     => __( 'Twitter', 'cmb2' ),
        'vimeo'     => __( 'Vimeo', 'cmb2' ),
      ),
    ));
    
    $socialMediaMetabox->add_group_field($socialMediaLinksGroup, array(
      'name'    => 'Profile Link',
      'id'      => 'profileLink',
      'type'    => 'text_url',
    ));
  }

  public static function anomalous_VisualsContacts() {
    $AnomalousVisualsContactsMetbox = new_cmb2_box( array(
      'id'           =>  'AnomalousVisualsContacts',
      'title'        => esc_html__( 'Contacts', 'myprefix' ),
      'object_types' => array( 'options-page' ),
      'option_key'      => 'anomalous-visuals-contacts',
      'parent_slug'  => 'company-info',
    ));

    $AnomalousVisualsContactsGroup = $AnomalousVisualsContactsMetbox->add_field(array(
      'title' => 'Anomalous Contacts',
      'desc' => esc_html__( 'Contact details for Anomalous Visuals', 'cmb2' ),
      'id'   => 'contacts',
      'type' => 'group',
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'   => __( 'Contact Item', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
      ),
    ));
   
    $AnomalousVisualsContactsMetbox->add_group_field($AnomalousVisualsContactsGroup, array(
      'name'    => 'Point of Contact',
      'id'      => 'pointOfContact',
      'desc'      => __( 'The name of the person', 'cmb2' ),
      'type'    => 'text',
    ));

    $AnomalousVisualsContactsMetbox->add_group_field($AnomalousVisualsContactsGroup, array(
      'name'    => 'Service',
      'id'      => 'service',
      'desc'      => __( "Will appear as 'Anomalous [value]'", 'cmb2' ),
      'type'    => 'text',
    ));
    
    $AnomalousVisualsContactsMetbox->add_group_field($AnomalousVisualsContactsGroup, array(
      'name'    => 'Telephone Number',
      'id'      => 'telephoneNumber',
      'type'    => 'text',
    ));
    
    $AnomalousVisualsContactsMetbox->add_group_field($AnomalousVisualsContactsGroup, array(
      'name'    => 'Email Address',
      'id'      => 'emailAddress',
      'type'    => 'text',
    ));

    // $AnomalousEventsContactsGroup = $AnomalousVisualsContactsMetbox->add_field(array(
    //   'title' => 'Anomalous Events Contacts',
    //   'desc' => esc_html__( 'Contact details for Anomalous Events', 'cmb2' ),
    //   'id'   => 'events',
    //   'type' => 'group',
    //   'repeatable'  => false, // use false if you want non-repeatable group
    //   'options'     => array(
    //     'group_title'   => __( 'Events', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    //   ),
    // ));
   
    // $AnomalousVisualsContactsMetbox->add_group_field($AnomalousEventsContactsGroup, array(
    //   'name'    => 'Point of Contact',
    //   'id'      => 'pointOfContact',
    //   'desc'      => __( 'The name of the person', 'cmb2' ),
    //   'type'    => 'text',
    // ));
    
    // $AnomalousVisualsContactsMetbox->add_group_field($AnomalousEventsContactsGroup, array(
    //   'name'    => 'Telephone Number',
    //   'id'      => 'telephoneNumber',
    //   'type'    => 'text',
    // ));
    
    // $AnomalousVisualsContactsMetbox->add_group_field($AnomalousEventsContactsGroup, array(
    //   'name'    => 'Email Address',
    //   'id'      => 'emailAddress',
    //   'type'    => 'text',
    // ));

    // $AnomalousSpaceContactsGroup = $AnomalousVisualsContactsMetbox->add_field(array(
    //   'title' => 'Anomalous Space Contacts',
    //   'desc' => esc_html__( 'Contact details for Anomalous Space', 'cmb2' ),
    //   'id'   => 'space',
    //   'type' => 'group',
    //   'repeatable'  => false, // use false if you want non-repeatable group
    //   'options'     => array(
    //     'group_title'   => __( 'Space', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    //   ),
    // ));
   
    // $AnomalousVisualsContactsMetbox->add_group_field($AnomalousSpaceContactsGroup, array(
    //   'name'    => 'Point of Contact',
    //   'id'      => 'pointOfContact',
    //   'desc'      => __( 'The name of the person', 'cmb2' ),
    //   'type'    => 'text',
    // ));
    
    // $AnomalousVisualsContactsMetbox->add_group_field($AnomalousSpaceContactsGroup, array(
    //   'name'    => 'Telephone Number',
    //   'id'      => 'telephoneNumber',
    //   'type'    => 'text',
    // ));
    
    // $AnomalousVisualsContactsMetbox->add_group_field($AnomalousSpaceContactsGroup, array(
    //   'name'    => 'Email Address',
    //   'id'      => 'emailAddress',
    //   'type'    => 'text',
    // ));

    // $AnomalousSoundContactsGroup = $AnomalousVisualsContactsMetbox->add_field(array(
    //   'title' => 'Anomalous Sound Contacts',
    //   'desc' => esc_html__( 'Contact details for Anomalous Sound', 'cmb2' ),
    //   'id'   => 'sound',
    //   'type' => 'group',
    //   'repeatable'  => false, // use false if you want non-repeatable group
    //   'options'     => array(
    //     'group_title'   => __( 'Sound', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
    //   ),
    // ));
   
    // $AnomalousVisualsContactsMetbox->add_group_field($AnomalousSoundContactsGroup, array(
    //   'name'    => 'Point of Contact',
    //   'id'      => 'pointOfContact',
    //   'desc'      => __( 'The name of the person', 'cmb2' ),
    //   'type'    => 'text',
    // ));
    
    // $AnomalousVisualsContactsMetbox->add_group_field($AnomalousSoundContactsGroup, array(
    //   'name'    => 'Telephone Number',
    //   'id'      => 'telephoneNumber',
    //   'type'    => 'text',
    // ));
    
    // $AnomalousVisualsContactsMetbox->add_group_field($AnomalousSoundContactsGroup, array(
    //   'name'    => 'Email Address',
    //   'id'      => 'emailAddress',
    //   'type'    => 'text',
    // ));

    // $AnomalousVisualsContactsMetbox->add_field(array(
    //   'name'    => 'Add to footer',
    //   'id'      => 'contactsInFooter',
    //   'desc'      => __( 'Add the contacts to the footer?', 'cmb2' ),
    //   'type'    => 'checkbox',
    // ));
  }
}