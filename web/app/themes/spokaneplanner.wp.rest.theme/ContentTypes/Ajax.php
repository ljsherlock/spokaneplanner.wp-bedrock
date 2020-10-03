<?php

namespace ContentTypes;

/*
* @note this function will be refactored
*/

class Ajax {
  public static function setup () {
    add_action( 'wp_ajax_nopriv_load_more', array(__CLASS__, 'load_more' ));
    add_action( 'wp_ajax_load_more', array(__CLASS__, 'load_more' ));

    add_action( 'wp_ajax_nopriv_get_component', array(__CLASS__, 'get_component' ));
    add_action( 'wp_ajax_get_component', array(__CLASS__, 'get_component' ));
  }

  public static function load_more() {
    $archiveData = $_GET;

    // die(var_dump($archiveData));

    // build a query with data
    $query = array();
    if(!empty( $archiveData['post_type'] )) {
      $query['post_type'] = $archiveData['post_type'];
    }
    if(!empty( $archiveData['taxonomy'] )) {
      $query['tax_query'][0]['taxonomy'] = $archiveData['taxonomy'];
      if(!empty( $archiveData['term'] )) {
        $query['tax_query'][0]['field'] = 'slug';
        $query['tax_query'][0]['terms'] = $archiveData['term'];
      }
    }
    if(!empty( $archiveData['posts_per_page'] )) {
      $query['posts_per_page'] = (int)$archiveData['posts_per_page'];
    }
    if(!empty( $archiveData['category'] )) {
      $query['category_name'] = $archiveData['category'];
    }
    if(!empty( $archiveData['offset'] )) {
      $query['offset'] = (int)$archiveData['offset'];
    }

    $args = array (
      'query' => $query,
      'standalone' => true,
    );
    /*
    *  What I should always be doing below is calling the _specific_ controller
    *  for this particular page/component (since that is how MVC operates).
    */
    if($query['post_type'] == 'post') {
      $archive = new \Controllers\Archive($args);
      $archive->template = 'templates/archive-work-loop/archive-work-loop';
    } else if($query['post_type'] == 'work') {
      $archive = new \Controllers\ArchiveWork($args);
      $archive->template = 'templates/archive-work-loop/archive-work-loop';
    }

    echo $archive->compile();

    die();
  }


  /**
   * get_data
   *
   * @return void
   */
  public static function get_component() {

    if (isset(
      $_GET['id'], 
      // parts/credits-modal/credits-modal.twig
      // template/page-team/page-team.twig
      $_GET['template'],
      $_GET['state'],
      $_GET['modelName']
    )) {
      $postID = $_GET['id'];
      $template = $_GET['template'];
      $state = $_GET['state'];
      $modelName = $_GET['modelName'];

      $controllerName = "\\Controllers\\{$modelName}";
      $controller = new $controllerName(array( 'id' => $postID ));
      $controller->template = $template;
      $controller->model->timber->addContext(array(
        'state' => $state
      ));
      
      echo $controller->compile();
    } else {
      echo 'nata';
    }
    die();
  }
}
