<?php

  namespace Includes;

  class Utils {

     // create breadcrumbs from post or from taxonomy term.
     // list of terms ready to go (objects)
     // ids to convert to terms (12, 23)

    public static function build_terms_from_str ($taxonomy_str, $term_str) {
      // get the term of the :term variable
      $term = get_term_by('slug', $term_str, $taxonomy_str);
      // get the ancesters (id) of the above term
      $ancestors = get_ancestors( $term->term_id, $taxonomy_str );
      // reverse the array so it outputs correctly
      $ancestors = array_reverse( $ancestors );

      $terms = array();

      foreach($ancestors as $ancestor) {
        $ancestor_term = get_term_by('id', $ancestor, 'category');
        array_push( $terms, $ancestor_term );
      }
      array_push($terms, $term);

      return $terms;
    }

    public static function create_breadcrumbs ($taxonomy, $terms) {
      $breadcrumbs = array();
      foreach($terms as $term) {
        if($term->name !== 'Year') {
          array_push($breadcrumbs, array('anchor_link' => '/'.$taxonomy->rewrite['slug'] .'/'. $term->slug, 'anchor_text' => $term->name ));
        }
      }
      return $breadcrumbs;
    }

    public static function wp_get_post_terms_hierarchy ($post_id, $taxonomy) {
      $terms = wp_get_post_terms( $post_id, $taxonomy, array('parent' => 0) );
      $sorted_terms = [];

      foreach( $terms as $term ) {
        $children = wp_get_post_terms($post_id, $taxonomy, array( 'parent' => $term->term_id) );
        if( count($children) > 0 ) {
          $term->children = $children;
        }
        $sorted_terms[] = $term;
      }
      return $sorted_terms;
    }

    public static function wp_get_terms_hierarchy ($tax) {
      $terms = get_terms( array('taxonomy' => $tax, 'parent' => 0, 'hide_empty' => true) );
      $sorted_terms = [];

      $sorted_terms = self::wp_get_terms_hierarchy_loop($tax, $terms, $sorted_terms);

      return $sorted_terms;
    }

    public static function wp_get_terms_hierarchy_loop($tax, $terms, $sorted_terms = array()) {
      foreach ($terms as $key => &$term) {
        // get children at current level.
        $children = get_terms($tax, array( 'parent' => $term->term_id, 'hide_empty' => true) );

        if (count($children) > 0) {
          // loop through indefinite children (scary).
          $loop = self::wp_get_terms_hierarchy_loop($tax, $children, $sorted_terms);

          // add returned children to current term.
          $term->children = $loop['children'];
        }
        // Add the current term to final array.
        $sorted_terms[] = $term;
      }
      return array('children' => $terms, 'sorted_terms' => $sorted_terms);
    }

    public static function wp_get_terms_hierarchy_show_empty($tax) {
      $terms = get_terms (array('taxonomy' => $tax, 'parent' => 0, 'hide_empty' => false));
      $sorted_terms = [];

      $sorted_terms = self::wp_get_terms_hierarchy_loop_show_empty ($tax, $terms, $sorted_terms);

      return $sorted_terms;
    }

    public static function wp_get_terms_hierarchy_loop_show_empty ($tax, $terms, $sorted_terms = array()) {
      foreach ($terms as $key => &$term) {
        // get children at current level.
        $children = get_terms($tax, array( 'parent' => $term->term_id, 'hide_empty' => false) );

        if (count ($children) > 0) {
          // loop through indefinite children (scary).
          $loop = self::wp_get_terms_hierarchy_loop ($tax, $children, $sorted_terms);

          // add returned children to current term.
          $term->children = $loop['children'];
        }
        // Add the current term to final array.
        $sorted_terms[] = $term;
      }

      return array('children' => $terms, 'sorted_terms' => $sorted_terms);
    }

    public static function wp_get_posts_from_terms ($terms, $sorted_terms = array()) {
      foreach ($terms as $key => &$term) {
        // get children at current level.
        $children = get_terms ($tax, array('parent' => $term->term_id, 'hide_empty' => true));

        if (count ($children) > 0) {
          // loop through indefinite children (scary).
          $loop = self::wp_get_terms_hierarchy_loop ($tax, $children, $sorted_terms);

          // add returned children to current term.
          $term->children = $loop['children'];
        }
        // Add the current term to final array.
        $sorted_terms[] = $term;
      }
      return array('children' => $terms, 'sorted_terms' => $sorted_terms);
    }

    public static function posts_orderby_lastname ($orderby_statement)  {
      $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
      return $orderby_statement;
    }
  }
