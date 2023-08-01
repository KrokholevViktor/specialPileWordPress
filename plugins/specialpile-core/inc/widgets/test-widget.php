<?php

class Elementor_Test_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'specialpile_test';
    }

    public function get_title() {
        return esc_html__( 'Тестовый виджет', 'specialpile-core' );
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Контент', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => esc_html__( 'Slides', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'slide_title',
                        'label' => esc_html__( 'Заголовок слайда', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                    ],
                    [
                        'name' => 'images_and_descriptions_' . uniqid(),
                        'label' => esc_html__( 'Картинки и описания', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::REPEATER,
                        'fields' => [
                            [
                                'name' => 'image',
                                'label' => esc_html__( 'Изображение', 'textdomain' ),
                                'type' => \Elementor\Controls_Manager::MEDIA,
                                'default' => [
                                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                                ],
                            ],
                            [
                                'name' => 'description',
                                'label' => esc_html__( 'Описание', 'textdomain' ),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'default' => '',
                            ],
                        ],
                        'title_field' => '{{{ description }}}',
                    ],
                ],
                'title_field' => '{{{ slide_title }}}',
                'prevent_empty' => true, // Запрещаем создание пустого слайда
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display();

?>

<div id="contacts" class="container contacts">
    <div class="contacts__wrapper">
        <div class="contacts__block">
            <div class="contacts__title fz-48-bn">Контакты:</div>
        </div>
    </div>
</div>
          
<?php }

}