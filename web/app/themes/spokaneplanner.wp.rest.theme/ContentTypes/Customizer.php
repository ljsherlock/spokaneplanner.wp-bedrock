<?php

namespace ContentTypes;

/**
 * Twenty Seventeen: Theme Customizer
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

class Customizer {

  public static function setup() {
    add_action( 'customize_register', array(__CLASS__, 'roughhands_customize_register') );
  }

  /**
   * Add postMessage support for site title and description for the Theme Customizer.
   *
   * @param WP_Customize_Manager $wp_customize Theme Customizer object.
   */
  public static function roughhands_customize_register( $wp_customize ) {
  	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

  	/**
  	 * Add the Theme Options section.
  	 */
  	$wp_customize->add_panel( 'options_panel', array(
  		'title'       => __( 'Theme Options', 'roughhands' ),
  		'description' => __( 'Configure your theme settings', 'roughhands' ),
  	) );

  	// Panel 1.
  	$wp_customize->add_section( 'panel_1', array(
  		'title'           => __( 'Panel 1', 'roughhands' ),
  		'active_callback' => 'is_front_page',
  		'panel'           => 'options_panel',
  		'description'     => __( 'Add an image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'roughhands' ),
  	) );

  	$wp_customize->add_setting( 'panel_1', array(
  		'default'           => false,
  		'sanitize_callback' => 'absint',
  	) );

  	$wp_customize->add_control( 'panel_1', array(
  		'label'   => __( 'Panel Content', 'roughhands' ),
  		'section' => 'panel_1',
  		'type'    => 'dropdown-pages',
  	) );

  	// Panel 2.
  	$wp_customize->add_section( 'panel_2', array(
  		'title'           => __( 'Panel 2', 'roughhands' ),
  		'active_callback' => 'is_front_page',
  		'panel'           => 'options_panel',
  		'description'     => __( 'Add an image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'roughhands' ),
  	) );

  	$wp_customize->add_setting( 'panel_2', array(
  		'default'           => false,
  		'sanitize_callback' => 'absint',
  	) );

  	$wp_customize->add_control( 'panel_2', array(
  		'label'   => __( 'Panel Content', 'roughhands' ),
  		'section' => 'panel_2',
  		'type'    => 'dropdown-pages',
  	) );

  	// Panel 3.
  	$wp_customize->add_section( 'panel_3', array(
  		'title'           => __( 'Panel 3', 'roughhands' ),
  		'active_callback' => 'is_front_page',
  		'panel'           => 'options_panel',
  		'description'     => __( 'Add an image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'roughhands' ),
  	) );

  	$wp_customize->add_setting( 'panel_3', array(
  		'default'           => false,
  		'sanitize_callback' => 'absint',
  	) );

  	$wp_customize->add_control( 'panel_3', array(
  		'label'   => __( 'Panel Content', 'roughhands' ),
  		'section' => 'panel_3',
  		'type'    => 'dropdown-pages',
  	) );

  	// Panel 4.
  	$wp_customize->add_section( 'panel_4', array(
  		'title'           => __( 'Panel 4', 'roughhands' ),
  		'active_callback' => 'is_front_page',
  		'panel'           => 'options_panel',
  		'description'     => __( 'Add an image to your panel by setting a featured image in the page editor. If you don&rsquo;t select a page, this panel will not be displayed.', 'roughhands' ),
  	) );

  	$wp_customize->add_setting( 'panel_4', array(
  		'default'           => false,
  		'sanitize_callback' => 'absint',
  	) );

  	$wp_customize->add_control( 'panel_4', array(
  		'label'   => __( 'Panel Content', 'roughhands' ),
  		'section' => 'panel_4',
  		'type'    => 'dropdown-pages',
  	) );
  }
}
