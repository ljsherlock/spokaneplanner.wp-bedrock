<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'roughhands_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category Theme
 */

namespace Includes;

class CMB2 {
  /**
   * init
   *
   * @return void
   */
  public static function init () {
    if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    	require_once dirname( __FILE__ ) . '/cmb2/init.php';
    } elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
    	require_once dirname( __FILE__ ) . '/CMB2/init.php';
    }
  }
}
