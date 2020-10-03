<?php

/**
 * 
 * This class registers the metaboxes for the Staff Custom Post Type
 *
 * @category CMB2
 */

namespace ContentTypes\CustomFields;

class TeamMember extends \ContentTypes\CustomFields {

/**
 * roughhands_register_staff_meta
 *
 * @return void
 */
	public static function registerFields() {
		$teamMemberMetabox = new_cmb2_box( array(
			'id'           => self::$prefix . 'teamMemberMetabox',
			'title'        => esc_html__( 'Position', 'cmb2' ),
			'object_types' => array( 'team-member' ), // Post type
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true, // Show field names on the left
		));

		$teamMemberMetabox->add_field( array(
			'id'   => self::$prefix . 'teamMemberPosition',
			'type' => 'text',
		));


		$teamMemberEmailMetabox = new_cmb2_box( array(
			'id'           => self::$prefix . 'teamMemberEmailMetabox',
			'title'        => esc_html__( 'Email', 'cmb2' ),
			'object_types' => array( 'team-member' ), // Post type
			'context'      => 'normal',
			'priority'     => 'high',
			'show_names'   => true, // Show field names on the left
		));

		$teamMemberEmailMetabox->add_field( array(
			'id'   => self::$prefix . 'teamMemberEmail',
			'type' => 'text',
		));
	}
}