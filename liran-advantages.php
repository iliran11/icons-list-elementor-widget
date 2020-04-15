<?php

/*
Plugin Name: liran advantages
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: The Plugin's Version Number, e.g.: 1.0
Author: liran advantages Author
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

final class Elementor_Test_Extension
{

  private static $_instance = null;
  public function __construct()
  {
    add_action('init', [$this, 'i18n']);
    add_action('plugins_loaded', [$this, 'init']);
  }

  public function i18n()
  {

    load_plugin_textdomain('liran-advantages');
  }

  public function init()
  {
    add_action('elementor/elements/categories_registered', [$this, 'add_category']);
    add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
    add_action('elementor/frontend/after_enqueue_styles', [$this, 'widget_styles']);
  }
  public function add_category($elements_manager)
  {
    $elements_manager->add_category(
      'alex-media',
      [
        'title' => __('Alex-Media', 'plugin-name'),
        'icon' => 'fa fa-plug',
      ]
    );
  }
  public function widget_styles()
  {

    wp_register_style('alexmedia-css', plugins_url('css/style.css', __FILE__));
    wp_enqueue_style('alexmedia-css');
  }
  public function init_widgets()
  {

    // Include Widget files
    require_once(__DIR__ . '/liran-advantages-widget.php');
    // Register widget
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_Test_Widget());
  }

  public static function instance()
  {

    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }
}
Elementor_Test_Extension::instance();
