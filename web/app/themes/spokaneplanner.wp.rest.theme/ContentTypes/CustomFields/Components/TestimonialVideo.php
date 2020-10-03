<?php
/**
 * 
 * This class registers the metaboxes for the FrontPage
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields\Components;

class TestimonialVideo extends \ContentTypes\CustomFields {
  /**
   * registerFields
   *
   * @param  mixed $objectTypes
   * @param  mixed $showOn
   *
   * @return void
   */
  public static function registerFields($objectTypes = array(), $showOn = array()) {
    $testimonialVideoMetabox = new_cmb2_box( array(
      'id'           => self::$prefix . 'testimonialVideoMetabox',
      'title'        => esc_html__( 'Testimonial Video', 'cmb2' ),
      'object_types' => $objectTypes, // Post type
      'show_on'      => $showOn,
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true, // Show field names on the left
    ));
    
    $testimonialVideoMetabox->add_field( array(
      'name' => 'Adding Video',
      'desc' => "Below there are two options for video: '<strong>Direct Link</strong>' and '<strong>Embeded Video</strong>'.
      <br /><br />
      A '<strong>Direct Link</strong>' will always be prefered over an '<strong>Embeded Link</strong>' because it is more performant.",
      'type' => 'title',
      'id'   => 'wiki_test_title'
    ));

    $testimonialVideoDirectGroup = $testimonialVideoMetabox->add_field( array(
      'id'      => 'testimonialVideoDirect',
      'type'        => 'group',
      'desc' => 'Populates a native, styled video element with a direct link from providers such as Viemo 
      <br /><br />
      <a href="https://vimeo.zendesk.com/hc/en-us/articles/224823567-Direct-links-to-video-files">Here\'s how to find your direct Vimeo links</a>.',
      'repeatable'  => false, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'       => __( 'Direct Link', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'        => __( 'Add Another Entry', 'cmb2' ),
        // 'remove_button'     => __( 'Remove Entry', 'cmb2' ),
        'sortable'          => false,
        'closed'         => true, // true to have the groups closed by default
        // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
      ),
    ) );

    // if there is no video, the featured image will be used.
    $testimonialVideoMetabox->add_group_field( $testimonialVideoDirectGroup, array(
      'name'    => 'Video URL',
      'desc'    => "<strong>Vimeo direct URL</strong>: https://player.vimeo.com/video/[your-video-id-here]",
      'id'      => 'url',
      'type'    => 'text_url',
    ));  

    $testimonialVideoMetabox->add_group_field( $testimonialVideoDirectGroup, array(
      'name'         => 'Video Cover Image',
      'description'  => 'Required if using video.',
      'id'           => 'poster',
      'type'         => 'file',
      'preview_size' => array( 100, 100 ),
    ));

    $testimonialVideoIframeGroup = $testimonialVideoMetabox->add_field( array(
      'id'      => 'testimonialVideoIframe',
      'type'        => 'group',
      'description' =>  'Obtains an external video (unstyled) (vimeo/youtube) from another host and creates a sub-window (iframe) inside the page.'
      ,
      'repeatable'  => false, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'       => __( 'Embeded Video', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        // 'add_button'        => __( 'Add Another Entry', 'cmb2' ),
        // 'remove_button'     => __( 'Remove Entry', 'cmb2' ),
        // 'sortable'          => false,
        'closed'         => true, // true to have the groups closed by default
        // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
      ),
    ) );

    $testimonialVideoMetabox->add_group_field( $testimonialVideoIframeGroup, array(
      'name'    => 'Iframe URL',
      'id'      => 'url',
      'type'    => 'text_url',
      'desc'    => "<strong>Vimeo URL</strong>: https://player.vimeo.com/video/[your-video-id-here]
      <br /><br />
      <strong>Youtube URL</strong>: https://www.youtube.com/embed/[your-video-id-here]'"
    ));

    $testimonialVideoMetabox->add_group_field( $testimonialVideoIframeGroup, array(
      'name' => 'Embeded Ratio',
      'desc' => "The below fields are required. They are needed to properly set the aspect ratio of the embeded element responsively.
                <br /><br />
                The ratio is calculated. You need only provide an accurate width and height of the video. ",
      'type' => 'title',
      'id'   => 'wiki_test_title'
    ));

    $testimonialVideoMetabox->add_group_field( $testimonialVideoIframeGroup, array(
      'name'    => 'Iframe Minimum Width',
      'id'      => 'minWidth',
      'type'    => 'text',
      'attributes'  => array(
        'placeholder' => "Enter width in 'px'",
      ),
    ));
    
    $testimonialVideoMetabox->add_group_field( $testimonialVideoIframeGroup, array(
      'name'    => 'Iframe Minimum Height',
      'id'      => 'minHeight',
      'type'    => 'text',
      'attributes'  => array(
        'placeholder' => "Enter height in 'px'",
      ),
    ));

    $testimonialVideoMetabox->add_field( array(
      'name' => 'Image',
      'desc' => "",
      'type' => 'file',
      'id'   => 'testimonialVideoImage'
    ));
  }
}