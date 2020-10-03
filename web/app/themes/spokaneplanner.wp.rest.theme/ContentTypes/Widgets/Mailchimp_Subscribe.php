<?php

namespace ContentTypes\Widgets;

class Mailchimp_Subscribe extends Widget {

  public $name = 'Mailchimp Subscribe';

  public $className = 'mailchimp-subscribe';

  public $desc = "Mailchimp subscribe form";

  public $type = '';

  public $template = 'parts/subscribe-form/subscribe-form';

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

  public function widget ($args, $instance) {
    parent::widget ($args, $instance);

    if (!empty($instance)) {
      // widget values
      $this->title = (!empty($instance['title'])) ? $instance['title'] : __('Sign Up');
      $this->actionAttr = (!empty($instance['actionAttr'])) ? $instance['actionAttr'] : __('');
      $this->buttonText = (!empty($instance['buttonText'])) ? $instance['buttonText'] : __('Subscribe');
      $this->legal = (!empty($instance['legal'])) ? $instance['legal'] : __('legal');
      $this->type = 'widget';

      // initiate Controller
      $widget = new \Controllers\Widget__Mailchimp_Subscribe(
        array('widget' => $this)
      );

      // Show the Widget
      $widget->show();
    }
  }

  public function update ($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = sanitize_text_field( $new_instance['title'] );
    $instance['actionAttr'] = sanitize_text_field( $new_instance['actionAttr'] );
    $instance['buttonText'] = sanitize_text_field( $new_instance['buttonText'] );
    $instance['legal'] = sanitize_text_field( $new_instance['legal'] );

    return $instance;
  }

  public function form ($instance) {
    $this->instances->title = $this->newInstance($instance, 'title', 'TItle:');
    $this->instances->id = $this->newInstance($instance, 'actionAttr', 'Form Action (HTML attribute):');
    $this->instances->buttonText = $this->newInstance($instance, 'buttonText', 'Button Text:');
    $this->instances->legal = $this->newInstance($instance, 'legal', 'Legal');

    $this->type = 'form';

    //initiate Controller
    $widget = new \Controllers\Widget( array( 'widget' =>  $this ) );

    // Render the Form
    $widget->show();
  }
}
