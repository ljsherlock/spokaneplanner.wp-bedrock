<?php

namespace ContentTypes;

class Scripts {
  public static function register () {

    add_editor_style( 'dist/css/wp-admin.css' );

    add_action('wp_enqueue_scripts', array(__CLASS__, 'registerScripts'));
  }

  /**
  *  Register & Load CSS & Scripts
  */
  public static function registerScripts () {
    wp_enqueue_script('anomalous_maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAMhpBMrnA8vGvYFCe5BID6kDMVrzg_w20', array(), date("H:i:s"), true );
    
    wp_register_script('anomalous_main', get_template_directory_uri() . '/dist/bundle.main.js', array(), date("H:i:s"), true );
    wp_enqueue_script('anomalous_main');

    wp_enqueue_style( 'anomalous_main_style', get_template_directory_uri() . '/dist/css/main.css', array(), date("H:i:s"));

    if(is_front_page()){
      wp_enqueue_style( 'anomalous_home_style', get_template_directory_uri() . '/dist/css/home.css', array(), date("H:i:s"));
      
      wp_register_script('anomalous_home', get_template_directory_uri() . '/dist/bundle.home.js', array(), date("H:i:s"), true );
      wp_enqueue_script('anomalous_home');
    }

    // if (get_post_type() === 'post') {
    //   if(is_single()) {
    //     wp_enqueue_style( 'anomalous_news_single_style', get_template_directory_uri() . '/dist/css/news-single.css', array(), date("H:i:s"));
    //     wp_enqueue_script('anomalous_news_single', get_template_directory_uri() . '/dist/bundle.news-single.js', array(), date("H:i:s"), true );
    //   } else {
    //     wp_enqueue_style( 'anomalous_news_archive_style', get_template_directory_uri() . '/dist/css/news-archive.css', array(), date("H:i:s"));
    //     wp_enqueue_script('anomalous_news_archive', get_template_directory_uri() . '/dist/bundle.news-archive.js', array(), date("H:i:s"), true );
    //   }
    // }

    if (get_post_type() === 'work') {
      if(is_single()) {
        // if(is_page_template( 'work-template-1.php' )) {
        //   wp_enqueue_style( 'anomalous_work_template_1_style', get_template_directory_uri() . '/dist/css/work-template-1.css', array(), date("H:i:s"));
        //   wp_enqueue_script('anomalous_work_template_1', get_template_directory_uri() . '/dist/bundle.work-template-1.js', array(), date("H:i:s"), true );
        // }
        // if(is_page_template( 'work-template-2.php' )) {
        //   wp_enqueue_style( 'anomalous_work_template_2_style', get_template_directory_uri() . '/dist/css/work-template-2.css', array(), date("H:i:s"));
        //   wp_enqueue_script('anomalous_work_template_2', get_template_directory_uri() . '/dist/bundle.work-template-2.js', array(), date("H:i:s"), true );
        // }
        // if(is_page_template( 'work-template-3.php' )) {
        //   wp_enqueue_style( 'anomalous_work_template_3_style', get_template_directory_uri() . '/dist/css/work-template-3.css', array(), date("H:i:s"));
        //   wp_enqueue_script('anomalous_work_template_3', get_template_directory_uri() . '/dist/bundle.work-template-3.js', array(), date("H:i:s"), true );
        // }
      } else {
        wp_enqueue_style( 'anomalous_work_style', get_template_directory_uri() . '/dist/css/archive-work.css', array(), date("H:i:s"));
        wp_enqueue_script('anomalous_work', get_template_directory_uri() . '/dist/bundle.archive-work.js', array(), date("H:i:s"), true );
      }
    }

    // if (is_page(array('visual', 'events', 'sound'))) {
    //   wp_enqueue_style( 'anomalous_services_style', get_template_directory_uri() . '/dist/css/services.css', array(), date("H:i:s"));
    //   wp_enqueue_script('anomalous_services', get_template_directory_uri() . '/dist/bundle.services.js', array(), date("H:i:s"), true );
    // }

    if (is_page('style-guide')) {
      wp_enqueue_script('anomalous_style-guide', get_template_directory_uri() . '/dist/bundle.style-guide.js', array(), date("H:i:s"), true );
      wp_enqueue_style( 'anomalous_style-guide_style', get_template_directory_uri() . '/dist/css/style-guide.css', array(), date("H:i:s"));
    }
    // if (is_page('space')) {
    //   wp_enqueue_script('anomalous_space-page', get_template_directory_uri() . '/dist/bundle.space-page.js', array(), date("H:i:s"), true );
    //   wp_enqueue_style( 'anomalous_space-page_style', get_template_directory_uri() . '/dist/css/space-page.css', array(), date("H:i:s"));
    // }
  }
}
