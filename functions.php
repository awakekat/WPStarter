<?php
/*
@package awakekat

  ========================
  REMOVE GENERATOR VERSION
  ========================
*/

function sitename_remove_version( $src ) {
  global $wp_version;
  parse_str( parse_url($src, PHP_URL_QUERY), $query );
  if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
    $src = remove_query_arg( 'ver', $src );
  }
  return $src;
}

add_filter( 'script_loader_src', 'awakekat_remove_wp_version' );
add_filter( 'style_loader_src', 'awakekat_remove_wp_version' );


/* ===================================
 *  CSS and Javascript - Bower install
 * ===================================  */ 
function sitename_styles() {

  wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Mr+Bedfort|Alegreya:400,700', false);

  wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');

  wp_enqueue_style('awesome-style', get_template_directory_uri() . '/css/font-awesome.min.css');

  wp_enqueue_style('devicons-style', get_template_directory_uri() . '/css/devicons.min.css');

  wp_enqueue_script('mixitupjs', get_template_directory_uri() . '/js/jquery.mixitup.min.js',
         array('jquery'), '', false);

  wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js',
         array('jquery'), '', true);

  wp_enqueue_script('accjs', get_template_directory_uri() . '/js/scripts.js',
           array('jquery'), '', false);

  wp_enqueue_style('default-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'sitename_styles');


/* ============
 *  Navigation
 * ===========  */ 
function sitename_register_menu() {
  register_nav_menu( 'primary',__( 'Primary Menu', 'awakekat' ) );
}
add_action( 'init', 'sitename_register_menu' );


/* ===================
 * Limit Post Title 
 * ===================  */ 
function max_post_title_length($title) {
  global $post;
  $title = $post->post_title;
  if (str_word_count($title) >= 4)
    wp_die( __('Error: your post title is over the maximum 3 word count.'));
}
add_action('publish_post', 'max_post_title_length');


/* =======================
 * Change Footer in Admin
 * =====================*/ 
function sitename_footer_admin () {
  echo 'Theme designed and Developed by <a href="http://awakekat.com" "target=_blank">Awakekat</a> and powered by <a href="http://wordpress.org" "target=_blank">Wordpress</a>.';
}
add_filter('admin_footer_text', 'sitename_footer_admin');


/* ================= 
 * Add Featured Image
 * ================== */
add_theme_support( 'post-thumbnails' );

