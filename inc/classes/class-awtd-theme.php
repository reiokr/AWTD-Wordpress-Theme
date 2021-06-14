<?php

/**
 * Bootstraps the Theme.
 * 
 * @package Awtd
 */

// use namespace
namespace AWTD_THEME\Inc;
use AWTD_THEME\Inc\Traits\Singleton;

// create main class
class AWTD_THEME {
  use Singleton;

  protected function __construct() {
    /**
     * classes
     */
    Assets::get_instance();
    Menus::get_instance();
    $this->set_hooks();
  }

  protected function set_hooks() {
    /**
     * actions
     */
    add_action( 'after_setup_theme', [$this,'theme_setup']);
  }

  /**
   * Essential theme supports
   */
  public function theme_setup() {
    /** tag-title **/
    add_theme_support( 'title-tag');
    
    /** post thumbnail **/
    add_theme_support('post-thumbnails');
    
    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );
    
    /** post formats */
    $post_formats = array('aside','image','gallery','video','audio','link','quote','status','chat');
    add_theme_support( 'post-formats', $post_formats);
    
    /** HTML5 support **/
    add_theme_support('html5',['comment-list', 'comment-form', 'search-form','gallery','caption','script','style']);
    
    add_theme_support( 'editor-styles' );
    
    /** editor style for TinyMCE */
    add_editor_style('/css/editor-style.css');
    
    /** refresh widgest **/
    add_theme_support( 'customize-selective-refresh-widgets' );

    /** custom background **/
    $bg_defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-size'           => 'cover',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );

    /** custom header **/
    $header_defaults = array(
        'default-image'          => '',
        'width'                  => 1000,
        'height'                 => 250,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
    );
    add_theme_support( 'custom-header', $header_defaults );

    /** custom logo **/
    add_theme_support( 'custom-logo', array(
        'header-text' => array( 'site-title', 'site-description' ),
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );


    /** add block styles support */
    add_theme_support( 'wp-block-styles');

    /** add wide block support */
    add_theme_support( 'align-wide');

    /** setup max width for content */
    global $content_width;
    if(!isset($content_width)){
      $content_width = 1240;
    }
  
}
  
}