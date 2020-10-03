<?php

$loader = require __DIR__ . '/vendor/autoload.php';
 
require_once 'Includes/constants.php';

Includes\CMB2::init();
ContentTypes\Menus::register();
ContentTypes\Customizer::setup();
ContentTypes\Images::setup();
ContentTypes\Ajax::setup();
ContentTypes\RESTFields\Block::registerFields();
ContentTypes\RESTFields\Menu::registerFields();

// There is a strange bug where my custom image sizes will only 
// appear if the a file field is created.
ContentTypes\CustomFields::register();

// ContentTypes\CustomPostTypes\Space::registerPostType();
// add_action( 'init', array('ContentTypes\CustomPostTypes\TeamMembers', 'registerPostType'));
// add_action( 'init', array('ContentTypes\CustomPostTypes\Work', 'registerPostType'));

/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support ('title-tag');

	// Add theme support for Custom Logo.
	add_theme_support ('custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	));

	add_filter('show_admin_bar', '__return_false');

	// This removes the persistent CSS that overrides my CSS due to specificity.
	// https://stackoverflow.com/questions/54203925/remove-embedded-stylesheet-for-gutenberg-editor-on-the-back-end
	add_filter( 'block_editor_settings' , 'remove_guten_wrapper_styles' );
	function remove_guten_wrapper_styles( $settings ) {
		unset($settings['styles'][0]);

		return $settings;
	}