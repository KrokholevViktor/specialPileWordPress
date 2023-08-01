<?php

class Elementor_Promo_Widget extends \Elementor\Widget_Base {

	
	public function get_name() {
		return 'specialpile_about';
	}

	public function get_title() {
		return esc_html__( 'Блок Promo', 'specialpile-core' );
	}

	public function get_icon() {
		return 'eicon-container';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Контент', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'specialpile_title',
			[
				'label' => esc_html__( 'Заголовок блока', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Шаблон заголовка',
				'placeholder' => __( 'Напишите заголовок здесь', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'main_image',
			[
				'label' => __( 'Изображение блока', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		for ($i = 1; $i <= 3; $i++) {
			$this->add_control(
				'promo_item_description_' . $i,
				[
					'label' => esc_html__( 'Текст блока' . $i, 'textdomain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Текст блока', 'textdomain' ),
					'placeholder' => esc_html__( 'Добавьте текст здесь', 'textdomain' ),
				]
			);
		}

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

?>


<div class="container promo">
    <div class="promo__title">
    
        <h1 class="title_promo"><?php echo esc_html($settings['specialpile_title']); ?></h1>

    </div>
    <a href="#form-slider"><button id="promo-btn" class="button_black fz-16-bn" >Рассчитать стоимость</button></a>
    <div class="promo__img">
		<?php if (esc_url($settings['main_image']['url'])){?>
        <img src="<?php echo esc_url($settings['main_image']['url']); ?>" alt="promo_bg" >
		<?php }?>
    </div>
    <div class="promo__services fz-24-bn">
        <div class="promo__services_item"><?php echo $settings['promo_item_description_1']; ?></div>
        <div class="promo__services_item"><?php echo $settings['promo_item_description_2']; ?></div>
        <div class="promo__services_item"><?php echo $settings['promo_item_description_3']; ?></div>
    </div> 
</div>
	
<?php }

}