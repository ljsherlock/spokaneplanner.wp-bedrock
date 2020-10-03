<?php

namespace ContentTypes;

class Widgets {
  /**
   * Widget Instances
   * @var array
   */
  public $widgets = array();

  /**
   * default_widgets
   *
   * @return void
   */
  public static function default_widgets () {
    return array(
      'Recent_Posts_All'
    );
  }

  /**
   * rough_hands_widgets
   *
   * @return void
   */
  public static function rough_hands_widgets() {
    return null;
  }

  /**
   * remove_default_widgets
   *
   * @return void
   */
  public static function remove_default_widgets() {
    // unregister all widgets
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('Twenty_Eleven_Ephemera_Widget');
    unregister_widget('WP_Widget_Media_Audio');
    unregister_widget('WP_Widget_Custom_HTML');
    unregister_widget('WP_Widget_Media_Gallery');
    unregister_widget('WP_Widget_Media_Video');
    unregister_widget('WP_Widget_Media_Image');
  }

  /**
   * __construct
   *
   * @param  mixed $widgets
   *
   * @return void
   */
  public static function register() {
    self::remove_default_widgets(); 

    add_action( 'widgets_init', array( 'ContentTypes\Widgets', 'remove_default_widgets' ) );

    self::register_widgets(self::default_widgets());

    $widgets = self::rough_hands_widgets();
    
    if (isset($widgets)) {
      self::register_widgets($widgets);
    }
  }

  /**
   * register_widgets
   *
   * @return void
   */
  public static function register_widgets ($widgets) {
    foreach ($widgets as $key => $widget) {
      # code...
      add_action( 'widgets_init', array( 'ContentTypes\Widgets\\' . $widget , 'register' ) );
    }
  }
}
