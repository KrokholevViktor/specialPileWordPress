<?php

class Elementor_Examples_Widget extends \Elementor\Widget_Base {
    
    public function get_script_depends(){
		if(\Elementor\Plugin::$instance->preview->is_preview_mode()) {
			wp_register_script('examples-script.js', plugins_url('/js/examples-script.js', __FILE__), ['elementor-frontend'], '1.0', true);
			return ['examples-script.js'];
		}
		return [];
	}
	public function get_name() {
		return 'specialpile_examples';
	}

	public function get_title() {
		return esc_html__( 'Блок Примеры Работ', 'specialpile-core' );
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
			'example_title',
			[
				'label' => esc_html__( 'Заголовок блока', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Примеры работ',
				'placeholder' => __( 'Напишите заголовок здесь', 'plugin-domain' ),
			]
		);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'slide_title',
			[
				'label' => esc_html__( 'Новый слайд', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Новый слайд' , 'textdomain' ),
				'label_block' => true,
			]
		);

        for($i = 1; $i <= 8; $i++) {
            $repeater->add_control(
                'examples_image_' . $i,
                [
                    'label' => __( 'Изображение' . $i, 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater->add_control(
                'examples_descr_' . $i,
                [
                    'label' => esc_html__( 'описание' . $i, 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'описание' , 'textdomain' ),
                    'label_block' => true,
                ]
            );
        }

		$this->add_control(
			'slide_repeater',
			[
				'label' => esc_html__( 'Список слайдов', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ slide_title }}}',
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
        
?>

<div id="examples" class="examples">
        <h2 class="title examples__title container"><?php echo esc_html($settings['example_title']); ?></h2>
        <div class="examples__slide-container">
            <div class="examples__wrapper">
                <div class="examples__inner">
                <?php foreach ($settings['slide_repeater'] as $slide) :?>
                    
                    <div class="examples__slide">
                        <div class="examples__item examples__item">
                            <img src="<?php echo esc_url($slide['examples_image_1']['url']); ?>" alt="<?php echo esc_html($slide['examples_image_1']['alt']); ?>">
                            <div class="examples__item_descr fz-24-bn"><p><?php echo esc_html($slide['examples_descr_1'])?></p></div>
                        </div>
                        <div class="examples__item examples__item">
                            <img src="<?php echo esc_url($slide['examples_image_2']['url'])?>" alt="<?php echo esc_html($slide['examples_image_2']['alt']); ?>">
                            <div class="examples__item_descr fz-24-bn"><p><?php echo esc_html($slide['examples_descr_2'])?></p></div>
                        </div>
                        <div class="examples__item examples__item">
                            <img src="<?php echo esc_url($slide['examples_image_3']['url'])?>" alt="<?php echo esc_html($slide['examples_image_3']['alt']); ?>">
                            <div class="examples__item_descr fz-24-bn"><p><?php echo esc_html($slide['examples_descr_3'])?></p></div>
                        </div>
                        <div class="examples__item examples__item">
                            <img src="<?php echo esc_url($slide['examples_image_4']['url'])?>" alt="<?php echo esc_html($slide['examples_image_4']['alt']); ?>">
                            <div class="examples__item_descr fz-24-bn"><p><?php echo esc_html($slide['examples_descr_4'])?></p></div>
                        </div>
                        <div class="examples__item examples__item">
                            <img src="<?php echo esc_url($slide['examples_image_5']['url'])?>" alt="<?php echo esc_html($slide['examples_image_5']['alt']); ?>">
                            <div class="examples__item_descr fz-24-bn"><p><?php echo esc_html($slide['examples_descr_5'])?></p></div>
                        </div>
                        <div class="examples__item examples__item">
                            <img src="<?php echo esc_url($slide['examples_image_6']['url'])?>" alt="<?php echo esc_html($slide['examples_image_6']['alt']); ?>">
                            <div class="examples__item_descr fz-24-bn"><p><?php echo esc_html($slide['examples_descr_6'])?></p></div>
                        </div>
                        <div class="examples__item examples__item">
                            <img src="<?php echo esc_url($slide['examples_image_7']['url'])?>" alt="<?php echo esc_html($slide['examples_image_7']['alt']); ?>">
                            <div class="examples__item_descr fz-24-bn"><p><?php echo esc_html($slide['examples_descr_7'])?></p></div>
                        </div>
                        <div class="examples__item examples__item">
                            <img src="<?php echo esc_url($slide['examples_image_8']['url'])?>" alt="<?php echo esc_html($slide['examples_image_8']['alt']); ?>">
                            <div class="examples__item_descr fz-24-bn"><p><?php echo esc_html($slide['examples_descr_8'])?></p></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
        </div>
        <div class="container examples__navigation">
            <div class="examples__navigation navigation_prev">
                <button class="button_black fz-16-bn"><div class="arrow-left"></div></button>
            </div>
            <div class="examples__navigation navigation_next">
                <button class="button_black fz-16-bn"><div class="arrow-right"></div></button>
            </div>
        </div>
    </div>
    

<?php



	}
    
}