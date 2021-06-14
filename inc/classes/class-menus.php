<?php

/**
 * Register menus
 * 
 * @package Awtd
 */

namespace AWTD_THEME\Inc;

use AWTD_THEME\Inc\Traits\Singleton;

class Menus {
  use Singleton;

  protected function __construct() {
  // load classes
  $this->set_hooks();
  }

  protected function set_hooks() {
    // actions and filters
    add_action( 'init', [$this,'register_awtd_menus'] );
  }
  
  public function register_awtd_menus() {
  register_nav_menus(
    array(
      'awtd-header-menu' => esc_html__( 'Header Menu', 'awtd' ),
      'awtd-extra-menu' => esc_html__( 'Extra Menu', 'awtd' ),
      'awtd-footer-menu' => esc_html__( 'Footer Menu', 'awtd' )
      )
    );
  }

  public function get_menu_id($location) {
    // get all the locations
    $locations = get_nav_menu_locations();
    
    // get object id by location
    $menu_id = $locations[$location];
    
    return !empty( $menu_id ) ? $menu_id : '';
  }

}