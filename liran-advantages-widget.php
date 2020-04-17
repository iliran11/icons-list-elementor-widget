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
    return ['alex-media'];
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
      'list_icon',
      [
        'label' => __('List Icon', 'text-domain'),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );
    $this->end_controls_section();
    $this->start_controls_section(
      'list_items',
      [
        'label' => __('List items', 'plugin-name'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
      'list_item_title',
      [
        'label' => __('Title', 'plugin-domain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('List Title', 'plugin-domain'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'list_item_content',
      [
        'label' => __('Content', 'plugin-domain'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => __('List Content', 'plugin-domain'),
        'show_label' => false,
      ]
    );
    $this->add_control(
      'list',
      [
        'label' => __('Repeater List', 'plugin-domain'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'list_item_title' => __('Title #1', 'plugin-domain'),
            'list_item_content' => __('Item content. Click the edit button to change this text.', 'plugin-domain'),
          ],
          [
            'list_item_title' => __('Title #2', 'plugin-domain'),
            'list_item_content' => __('Item content. Click the edit button to change this text.', 'plugin-domain'),
          ],
        ],        'title_field' => '{{{ list_item_title }}}',
      ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
?>
    <dl class="alexmedia icons-list">
      <?php foreach ($settings['list'] as $item) : ?>
        <div class="item">
          <div class="list-item-icon">
            <?php \Elementor\Icons_Manager::render_icon($settings['list_icon'], ['aria-hidden' => 'true']); ?>
          </div>
          <div class="content">
            <dt><?php echo $item['list_item_title'] ?></dd>
            <dd><?php echo $item['list_item_content'] ?></dd>
          </div>
        </div>
      <?php endforeach; ?>
    </dl>
<?php
  }
}
