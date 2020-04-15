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
      'section_icon',
      [
        'label' => __('Icon', 'text-domain'),
      ]
    );

    $this->add_control(
      'icon',
      [
        'label' => __('Icon', 'text-domain'),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
?>
    <div class="my-icon-wrapper">
      <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
    </div>
  <?php
  }

  protected function _content_template()
  {
  ?>

    <div class="my-icon-wrapper">
      liran
    </div>
<?php
  }
}
