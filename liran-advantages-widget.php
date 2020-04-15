<?php
class Elementor_Test_Widget extends \Elementor\Widget_Base
{

  public function get_name()
  {
    return 'liran-advantages';
  }

  public function get_title()
  {
    return 'liran-advantages-title';
  }

  public function get_icon()
  {
    return 'fas fa-air-freshener';
  }

  public function get_categories()
  {
    return ['liran-custom'];
  }

  protected function _register_controls()
  {
    $this->start_controls_section(
      'content_section',
      [
        'label' => __('Content', 'plugin-name'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'url',
      [
        'label' => __('URL to embed', 'plugin-name'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'url',
        'placeholder' => __('https://your-link.com', 'plugin-name'),
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();

    $html = wp_oembed_get($settings['url']);

    echo '<div class="oembed-elementor-widget">';

    echo ($html) ? $html : $settings['url'];

    echo '</div>';
  }

  protected function _content_template()
  {
    echo '<div> hello world</div>';
  }
}
