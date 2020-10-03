<?php

namespace ContentTypes;

class Blocks {
  public function __construct () {
    wp_enqueue_script(
        'gdt-plugin-blacklist-blocks',
        get_stylesheet_directory_uri() . '/dist/guten-addons.js',
        array( 'wp-blocks' )
    );
  }

  // add_action( 'enqueue_block_editor_assets', 'gdt_blocks_class_rename' );
}
