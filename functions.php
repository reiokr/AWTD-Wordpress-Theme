<?php
/** 
 * Theme functions
 * 
 * @package AWTD
*/

/* echo '<pre>';
print_r( filemtime(get_template_directory(). '/css/mystyle.css'));
echo '<br>';
print_r(filemtime(get_template_directory(). '/style.css'));
wp_die();
*/

if(!defined('AWTD_DIR_PATH')){
  define('AWTD_DIR_PATH', untrailingslashit(get_template_directory()));
}

if(!defined('AWTD_DIR_URI')){
  define('AWTD_DIR_URI', untrailingslashit(get_template_directory_uri()));

}

// load autoloader
require_once AWTD_DIR_PATH . '/inc/helpers/autoloader.php';

// instantsiate the class
function awtd_get_theme_instance() {
  \AWTD_THEME\Inc\AWTD_THEME::get_instance();
}
awtd_get_theme_instance();

// disable the admin bar
add_filter('show_admin_bar', '__return_false');