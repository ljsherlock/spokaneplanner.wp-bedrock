<?php

namespace ContentTypes;

class Sidebar {
  /**
   * __construct
   *
   * @return void
   */
  public static function register() {
    add_action('widgets_init', array( __CLASS__, 'register_sidebars'));
  }

    /**
   * default_sidebars
   *
   * @return void
   */
  public static function default_sidebars () {
    register_sidebar( array(
      'name'          => __( 'Sidebar', LJSHERLOCK_TEXT_DOMAIN ),
      'id'            => 'sidebar',
      'description'   => 'This sidebar will appear in the side of the page.',
      'before_widget' => '',
      'after_widget'  => '',
    ));

    register_sidebar( array(
      'name'          => __( 'Footer Sidebar', LJSHERLOCK_TEXT_DOMAIN ),
      'id'            => 'sidebar__footer',
      'description'   => 'This sidebar will appear in the footer of the page.',
      'before_widget' => '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 nested-list-reset mv5 mv0-ns f4 center">',
      'after_widget'  => '</div>',
        'before_title'  => '<p class="f5 o-60 mt0">',
        'after_title'  => ':</p>',
    ));
  }

  /**
   * theme_sidebars
   *
   * @return void
   */
  public static function rough_hands_sidebars () {

  }

  /**
   * register_sidebars
   *
   * @return void
   */
  public static function register_sidebars() {
    self::default_sidebars();
    self::rough_hands_sidebars();
  }
}
