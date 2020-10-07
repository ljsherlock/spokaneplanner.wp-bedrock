<?php

namespace ContentTypes;

class Editor {
  /**
   *
   * @return void
   */
	public static function setup() {
    add_filter( 'preview_post_link', array(__CLASS__, 'react_consumer_preview_post_link') );

    // add_filter( 'rest_prepare_post', array(__CLASS__, 'my_include_preview_link_in_rest_response'), 10, 2 );
    // add_filter( 'rest_prepare_page', array(__CLASS__, 'my_include_preview_link_in_rest_response'), 10, 2 );

    add_action('admin_footer', array(__CLASS__, 'fix_preview_link_on_draft'));
    add_action( 'admin_footer-edit.php', array(__CLASS__, 'fix_preview_link_on_draft') ); 
    add_action( 'admin_footer-post.php', array(__CLASS__, 'fix_preview_link_on_draft') ); 
    add_action( 'admin_footer-post-new.php', array(__CLASS__, 'fix_preview_link_on_draft') );

    add_filter( 'new', array(__CLASS__, 'new') );
  }

  /**
   * @description this function overwrites the headless WordPress permalink
   * with the link to the React application instead.
   * It will not not take into account autosaves because the Gutenberge editor
   * is a representation of the preview in itself (albiet without the header and footer).
   */
  public static function react_consumer_preview_post_link() {
    $slug = basename(get_the_ID());
    $mydomain = 'http://spokaneplanner.com';
    $mydir = '/faq/'; 
    $mynewpurl = "$mydomain$mydir$slug&amp;preview=true";
    return "$mynewpurl";
  }

  // workaround script until there's an official solution for https://github.com/WordPress/gutenberg/issues/13998
	public static function fix_preview_link_on_draft() {
		echo '<script type="text/javascript">
			jQuery(document).ready(function () {
				const checkPreviewInterval = setInterval(checkPreview, 1000);
				function checkPreview() {
					const editorPreviewButton = jQuery(".editor-post-preview");
					const editorPostSaveDraft = jQuery(".editor-post-save-draft");
					if (editorPostSaveDraft.length && editorPreviewButton.length && editorPreviewButton.attr("href") !== "' . get_preview_post_link() . '" ) {
						editorPreviewButton.attr("href", "' . get_preview_post_link() . '");
						editorPreviewButton.off();
						editorPreviewButton.click(false);
						editorPreviewButton.on("click", function() {
							editorPostSaveDraft.click();
							setTimeout(function() {
								const win = window.open("' . get_preview_post_link() . '", editorPreviewButton.attr("target"));
								if (typeof win.name === "undefined") win.name = editorPreviewButton.attr("target");
								if (win) {
										win.focus();
								}
						}, 1500);
						});
					}
				}
			});
		</script>';
  }
  
  /**
   * Add preview link to REST response.
   * 
   * Not working in the way I want. I need to get autosave data, not a URL
   */
  public static function my_include_preview_link_in_rest_response( $response, $post ) {
    // if ( 'draft' === $post->post_status ) {
      $response->data['preview_link'] = get_preview_post_link( $post );
    // }s
  
    return $response;
  }
}
