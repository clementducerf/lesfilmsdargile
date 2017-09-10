<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


// Suppression du support des emojis qui enlaidissent le code

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

// custom function to get post meta in wp_query
// https://wordpress.stackexchange.com/questions/172041/can-wp-query-return-posts-meta-in-a-single-request

if(!function_exists('add_query_meta')) {
  function add_query_meta($wp_query = "") {

    //return In case if wp_query is empty or postmeta already exist
    if( (empty($wp_query)) || (!empty($wp_query) && !empty($wp_query->posts) && isset($wp_query->posts[0]->postmeta)) ) { return $wp_query; }

    $sql = $postmeta = '';
    $post_ids = array();
    $post_ids = wp_list_pluck( $wp_query->posts, 'ID' );
    if(!empty($post_ids)) {
      global $wpdb;
      $post_ids = implode(',', $post_ids);
      $sql = "SELECT meta_key, meta_value, post_id FROM $wpdb->postmeta WHERE post_id IN ($post_ids)";
      $postmeta = $wpdb->get_results($sql, OBJECT);
      if(!empty($postmeta)) {
        foreach($wp_query->posts as $pKey => $pVal) {
          $wp_query->posts[$pKey]->postmeta = new StdClass();
          foreach($postmeta as $mKey => $mVal) {
            if($postmeta[$mKey]->post_id == $wp_query->posts[$pKey]->ID) {
              $newmeta[$mKey] = new stdClass();
              $newmeta[$mKey]->meta_key = $postmeta[$mKey]->meta_key;
              $newmeta[$mKey]->meta_value = maybe_unserialize($postmeta[$mKey]->meta_value);
              $wp_query->posts[$pKey]->postmeta = (object) array_merge((array) $wp_query->posts[$pKey]->postmeta, (array) $newmeta);
              unset($newmeta);
            }
          }
        }
      }
      unset($post_ids); unset($sql); unset($postmeta);
    }
    return $wp_query;
  }
}


//get only text content from post

function get_content_without_tag( $html, $tag )
{
  // Return false if no html or tag is passed
  if ( !$html || !$tag )
    return false;

  $dom = new DOMDocument;
  //$dom->loadHTML( $html );
  $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

  $dom_x_path = new DOMXPath( $dom );
  while ($node = $dom_x_path->query( '//' . $tag )->item(0)) {
    $node->parentNode->removeChild( $node );
  }
  return $dom->saveHTML();
}


// add Modernizr

wp_register_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', null, null, true );
wp_enqueue_script('modernizr');
