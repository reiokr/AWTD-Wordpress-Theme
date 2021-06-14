<?php

/**
 * Enqueue them assets
 * 
 * @package Awtd
 */

namespace AWTD_THEME\Inc;

use AWTD_THEME\Inc\Traits\Singleton;

class Assets {
  use Singleton;

  protected function __construct() {
  // load classes
  $this->set_hooks();
}

protected function set_hooks() {
  // actions and filters
  add_action('wp_enqueue_scripts', [$this, 'register_styles']);
  add_action('wp_enqueue_scripts', [$this, 'register_scripts']);

}
public function register_styles() {
// register bootstrap css
wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css',[], false, 'all');

//register css files
wp_register_style('mystyle', AWTD_DIR_URI . '/css/mystyle.css',['style'], filemtime(AWTD_DIR_PATH . '/css/mystyle.css'), 'all');

wp_register_style( 'style', AWTD_DIR_URI,[], filemtime(get_stylesheet_directory(). '/style.css'));

  // registering conditional css files
wp_register_style('archive-style',  AWTD_DIR_URI . '/css/archive.css',['mystyle'], filemtime( AWTD_DIR_PATH . '/css/archive.css'), 'all');

// enqueue if is archive page
if(is_archive()){
  wp_enqueue_style('archive-style');
}

// enqueue styles
wp_enqueue_style('bootstrap');
wp_enqueue_style('mystyle');
wp_enqueue_style('style');
}

public function register_scripts() {
  //register bootstrap script
  wp_register_script('bootstrap-script-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js',['jquery'],false,false);
  // register script files
  wp_register_script('main',  AWTD_DIR_URI . '/js/main.js',[], filemtime( AWTD_DIR_PATH . '/js/main.js'), true);

  // enqueue scripts
  wp_enqueue_script('bootstrap-script-bundle');
  wp_enqueue_script('main');

}

}