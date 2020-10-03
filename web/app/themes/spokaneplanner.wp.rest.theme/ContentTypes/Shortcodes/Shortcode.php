<?php

namespace ContentTypes\Shortcodes;

class Shortcode {
  public static function initialize ($class) {
    // Create the dynamic model name
    $controllerName = "\\Models\\{$class}";

    // Initialize Model
    $controller = new $controllerName();

    // render
    $controller->show();
  }
}
