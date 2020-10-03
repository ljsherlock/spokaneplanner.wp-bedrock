<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'roughhands_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category Theme
 */

namespace ContentTypes;

class CustomFields {

    public static $prefix = '_anomalous_meta_';

    /**
     * init
     *
     * @return void
     */
    public static function register() {
      // add_action( 'cmb2_admin_init', array( 'ContentTypes\CustomFields\TeamMember', 'registerFields') );
      // add_action( 'cmb2_admin_init', array( 'ContentTypes\CustomFields\ThemeOptions', 'registerFields') );
      add_action( 'cmb2_admin_init', array( __CLASS__, 'registerAllFields') );
    }

    public static function registerAllFields() {
      // CustomFields\Components\FrontpageSquares::registerFields(
      //   array('frontpage')
      // );
      CustomFields\Components\Hero::registerFields(
        array('page'), 
        array('page-template' => array(
          'page-style-guide.php',
          'page-events.php',
          'page-sound.php', 
          'page-visual.php',
          'page-space.php',
        ))
      );
      // CustomFields\Components\HeroSimple::registerFields(
      //   array('page', 'spaces'),
      //   array('page-template' => array(
      //     'single-spaces.php',
      //     'page-style-guide.php',
      //   ))
      // );
      // CustomFields\Components\Testimonial::registerFields(
      //   array('spaces', 'work', 'page'),
      //   array('page-template' => array(
      //     'work-template-1.php',
      //     'work-template-video-gallery.php',
      //     'work-template-2.php',
      //     'work-template-4.php',
      //     'page-style-guide.php',
      //   ))
      // );
      // CustomFields\Components\ParalaxTestimonial::registerFields(
      //   array('page', 'work', ),
      //   array('page-template' => array(
      //     'work-template-3.php',
      //     'page-events.php',
      //     'page-sound.php',
      //     'page-visual.php',
      //     'page-space.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\PostVideo::registerFields(array('work'));

      // CustomFields\Components\ProjectCredits::registerFields(array('work'));

      // CustomFields\Components\ShowreelVideoLightbox::registerFields(
      //   array('page'),
      //   array('page-template' => array(
      //     'page-events.php',
      //     'page-sound.php',
      //     'page-visual.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\ContentVideo::registerFields(
      //   array('work', 'page'),
      //   array('page-template' => array(
      //     'work-template-1.php',
      //     'work-template-video-gallery.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\TestimonialVideo::registerFields(
      //   array('work', 'page'),
      //   array('page-template' => array(
      //     'work-template-1.php',
      //     'work-template-video-gallery.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\Gallery::registerFields(
      //   array('spaces', 'work', 'page'),
      //   array('page-template' => array(
      //     'work-template-3.php',
      //     'work-template-2.php',
      //     'work-template-4.php',
      //     'work-template-1.php',
      //     'single-spaces.php',
      //     'page-style-guide.php',
      //   ))
      // );


      // CustomFields\Components\VideoGallery::registerFields(
      //   array('work'),
      //   array('page-template' => array(
      //     'work-template-video-gallery.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\ParalaxImage::registerFields(
      //   array('work', 'page'),
      //   array('page-template' => array(
      //     'work-template-2.php',
      //     'work-template-4.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\SpaceFacilities::registerFields(
      //   array('spaces', 'page'),
      //   array('page-template' => array(
      //     'page-style-guide.php',
      //     'single-spaces.php',
      //   ))
      // );

      // CustomFields\Components\ContentEntryImage::registerFields(
      //   array('work', 'page'),
      //   array('page-template' => array(
      //     'work-template-3.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\OverlappingImages::registerFields(
      //   array('work', 'page'),
      //   array('page-template' => array(
      //     'work-template-2.php',
      //     'work-template-4.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\ClientsCarousel::registerFields(
      //   array('page'),
      //   array('page-template' => array(
      //     'page-events.php',
      //     'page-sound.php',
      //     'page-visual.php',
      //     'page-space.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\ServicesMainContent::registerFields(
      //   array('page'),
      //   array('page-template' => array(
      //     'page-events.php',
      //     'page-sound.php',
      //     'page-visual.php',
      //     'page-style-guide.php',
      //   ))
      // );

      // CustomFields\Components\HeadofService::registerFields(
      //   array('page'),
      //   array('page-template' => array(
      //     'page-events.php',
      //     'page-sound.php',
      //     'page-visual.php',
      //     'page-style-guide.php',
      //     'page-space.php',
      //   ))
      // );

      // CustomFields\Components\CallToAction::registerFields(
      //   array('spaces'),
      //   array('page-template' => array(
      //     'single-spaces.php',
      //   ))
      // );

      // CustomFields\Components\FeaturedPosts::registerFields(
      //   array('page'),
      //   array('page-template' => array(
      //     'page-events.php',
      //     'page-sound.php',
      //     'page-visual.php',
      //     'page-style-guide.php',
      //     'page-space.php',
      //   ))
      // );

      // CustomFields\Components\Wysiwyg::registerFields(
      //   array('page'),
      //   array('id' => array(
      //     48,
      //   )),
      //   'Collective Content',
      //   'collectiveContent'
      // );

    }

    /**
   * Wrapper function around cmb2_get_option
   * @since  0.1.0
   * @param  string $key     Options array key
   * @param  mixed  $default Optional default value
   * @return mixed           Option value
   */
  // public static function roughhands_get_option($options_prefix, $key = '', $default = false ) {
  // 	if ( function_exists( 'cmb2_get_option' ) ) {
  // 		// Use cmb2_get_option as it passes through some key filters.
  // 		return cmb2_get_option( $options_prefix, $key, $default );
  // 	}
  // 	// Fallback to get_option if CMB2 is not loaded yet.
  // 	$opts = get_option( $options_prefix, $default );
  // 	$val = $default;
  // 	if ( 'all' == $key ) {
  // 		$val = $opts;
  // 	} elseif (is_array ($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
  // 		$val = $opts[ $key ];
  // 	}
  // 	return $val;
  // }

  // // get project posts with archive
  // public static function get_project_options() {
  //   $options = array();

  //   $work = new \Controllers\Archive(array('query' => array(
  //     'post_type' => 'work'
  //   )));
  //   $posts = $work->returnData('posts');
  //   // foreach($posts['postsArray'] as $post) {
  //   //   $options[$post->slug] = __( $post->title, 'cmb2' );
  //   // }
  //   return $options;
  // }

  // // get project posts with archive
  // public static function getAllPostsAndPages() {
  //   $options = array();

  //   $work = new \Controllers\Archive(array('query' => array(
  //     'posts_per_page' => -1,
  //     'post_type' => array('any'),

  //   )));
  //   $posts = $work->returnData('archive')['posts'];
  //   foreach($posts as $post) {
  //     $options[$post->ID] = __( ucfirst($post->post_type) .":   " . $post->title, 'cmb2' );
  //   }
  //   // die(var_dump($options));
  //   // sort($options);
  //   return $options;
  // }

  // public static function returnPosts($postType) {
  //   $options = array();

  //   $work = new \Controllers\Archive(array('query' => array(
  //     'posts_per_page' => -1,
  //     'post_type' => $postType,

  //   )));
  //   $posts = $work->returnData('archive')['posts'];
  //   foreach($posts as $post) {
  //     $options[$post->ID] = __( ucfirst($post->post_type) .":   " . $post->title, 'cmb2' );
  //   }
  //   // die(var_dump($options));
  //   // sort($options);
  //   return $options;
  // }

  // // get project posts with archive
  // public static function get_frontpage_options () {
  //   $options = array();

  //   $work = new \Controllers\Archive(array(
	// 		'extra_data' => false,
	// 		'query' => array(
	//       'post_type' => array('post', 'work', 'page'),
	//       'posts_per_page' => 100,
	//       'orderby' => 'post_type',
  //       'order' => 'descending'
  //     )
  //   ));
  //   $posts = $work->returnData ('posts');

  //   // foreach($posts['postsArray'] as $post) {
  //   //   $options[$post->ID] = __( get_post_type_object ($post->post_type)->labels->singular_name .' - ' . $post->title, 'cmb2');
  //   // }
  //   return $options;
  // }

  // public static function getFrontPageLinks($args) {
  //   $workTypeTerms = get_terms($args);
  //   $array = [];

  //   foreach ($workTypeTerms as $key => $term) {
  //     $array[$term->term_id] = __( $term->taxonomy .' - '. $term->name, 'cmb2');
  //   }

  //   return $array;
  // }

  // /**
  // * Sample template tag function for outputting a cmb2 file_list
  // *
  // * @param  string  $file_list_meta_key The field meta key. ('wiki_test_file_list')
  // * @param  string  $img_size           Size of image to show
  // */
  // public static function cmb2_output_file_list($file_list, $img_size = 'thumbnail') {
  //   array_walk($file_list, function(&$attachment_url, $attachment_id, $img_size) {
  //     // Loop through them and output an image
  //     $attachment_url = wp_get_attachment_image( $attachment_id, $img_size );
  //   }, $img_size);

  //   return $file_list;
  // }

  // /**
  // *	@method returnAllProducts
  // *	@return Array of Product posts
  // */
  // public static function returnPostOptions ($args) {
  //   $query = new \WP_Query($args);
  //   $posts = $query->posts;

  //   if (count($posts) > 0) {
  //     $postIDs = [];
  //     foreach ($posts as $key => $post) {
  //       $postIDs[$post->ID] = $post->post_title;
  //     }
  //     return $postIDs;
  //   } else {
  //     return null;
  //   }
  // }
}
