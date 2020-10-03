<?php

define('PREFIX', 'LJSHERLOCK_');

// Wordpress Unique text domain
define(PREFIX.'TEXT_DOMAIN', 'ljsherlock');

define('PROJECT_VERSION', '0.0.0');

// Base locations
define(PREFIX .'ROOT', dirname(__FILE__));
define(PREFIX .'URL', esc_url( home_url( '/' ) ) );
define(PREFIX.'THEME_URL', get_stylesheet_directory_uri());
define(PREFIX.'THEME_DIRECTORY', get_stylesheet_directory());

//Client Side
define(PREFIX .'AJAXURL', admin_url('admin-ajax.php'));

if ( ! is_admin() ) {
  define(PREFIX .'CACHE', 600);
}
