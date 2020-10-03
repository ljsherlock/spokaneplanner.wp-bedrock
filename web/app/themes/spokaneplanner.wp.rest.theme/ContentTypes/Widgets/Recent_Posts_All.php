<?php

namespace ContentTypes\Widgets;

class Recent_Posts_All extends Widget {

  public $name = 'Recent Posts All';

  public $className = 'recent-posts-all';

  public $desc = "Recent Post and Custom Posts";

  public $type = '';

  public $template = 'base/posts/posts';

  /**
   * Registers the widget with the WordPress Widget API.
   *
   * @return void.
   */
  public static function register() {
    register_widget( __CLASS__ );
  }

  /**
   * Registers the widget with the WordPress Widget API.
   *
   * @return void.
   */
  public function __construct () {
    parent::__construct();
  }

  /**
   * Registers the widget with the WordPress Widget API.
   *
   * @return void.
   */
  public function widget ($args, $instance) {
    parent::widget( $args, $instance );

    if (!empty($instance)) {
      // widget values
      $this->title = ( !empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );  
      $this->posts_per_page = ( !empty( $instance['posts_per_page'] ) ) ? absint( $instance['posts_per_page'] ) : '';
      $this->selected_post_type = ( !empty( $instance['post_type'] ) ) ? $instance['post_type'] : 'post';
      $this->template = ( !empty( $instance['template'] ) ) ? $instance['template'] : $this->template;
      $this->type = 'widget';

      // // initiate Controller
      // $widget = new \Controllers\Widget__Recent_Posts_All(
      //   array( 'widget' => $this, )
      // );

      // // Show the Widget
      // $widget->show();
    }
  }

  public function update ($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title']);
    $instance['posts_per_page'] = (int) $new_instance['posts_per_page'];
    $instance['post_type'] = (!empty ($new_instance['post_type'])) ? strip_tags ($new_instance['post_type']) : '';
    $instance['template'] = (empty ($new_instance['template']) ? $this->template : sanitize_text_field ($new_instance['template']));

    return $instance;
  }

  public function form ($instance) {
    $this->instances->id = $this->newInstance($instance, 'title', 'Title');
    $this->instances->posts_per_page = $this->newInstance($instance, 'posts_per_page', 'Posts Per Page');
    $this->instances->post_type = $this->newInstance($instance, 'post_type', 'Post Type');

    $this->instances->post_type->type = 'select';
    foreach (get_post_types(array('public'  => true), 'name', 'and') as $key => $item ) {
      $options[$key]['value'] = $item->name;
      $options[$key]['text'] = $item->label;
      if (isset($instance['post_type'])) {
        $options[$key]['selected'] = ($item->name == $instance['post_type']) ? true : false;
      }
    }
    $this->instances->post_type->options = $options;

    $this->instances->template = $this->newInstance($instance, 'template', 'Custom Template');

    $this->type = 'form';

    //initiate Controller
    $widget = new \Controllers\Widget( array( 'widget' =>  $this ) );

    // Render the Form
    $widget->show();
  }
}
