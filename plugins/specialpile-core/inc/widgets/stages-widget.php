<?php

class Elementor_Stages_Widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'specialpile_stages';
	}

	public function get_title() {
		return esc_html__( 'Блок Этапы Услуг', 'specialpile-core' );
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
				'label' => __( 'Контент', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'stages_block_title',
			[
				'label' => esc_html__('Заголовок блока', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
				'default' => 'Этапы оказания услуги',
			]
		);
		$this->add_control(
			'stages_block_title_end',
			[
				'label' => esc_html__('Заголовок внизу блока', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
				'default' => 'Самый надежный фундамент полностью готов!',
			]
		);
		$this->add_control(
			'stages_block_image',
			[
				'label' => __( 'Изображение блока', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);




			$this->start_controls_tabs( 'advantages_tabs' );
			
			for ($i = 1; $i <= 5; $i++ ){
				$this->start_controls_tab(
					'advantages_tab' . $i,
					[
						'label' => esc_html__( 'этап ' . $i, 'plugin-domain' ),
					]
				);
					$this->add_control(
						'stages_number' . $i,
						[
							'label' => esc_html__('Номер этапа' . $i, 'plugin-domain'),
							'type' => \Elementor\Controls_Manager::TEXT,
							'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
							'default' => '#',
						]
					);
					$this->add_control(
						'stages_title' . $i,
						[
							'label' => esc_html__('Заголовок этапа' . $i, 'plugin-domain'),
							'type' => \Elementor\Controls_Manager::TEXT,
							'placeholder' => __('Напишите номер здесь', 'plugin-domain'),
							'default' => 'Заголовок этапа',
						]
					);

					$this->add_control(
						'stages_descr' . $i,
						[
							'label' => esc_html__('Описание этапа' . $i, 'plugin-domain'),
							'type' => \Elementor\Controls_Manager::TEXTAREA,
							'maxlength' => 200,
							'placeholder' => __('Напишите описание здесь', 'plugin-domain'),
							'default' => 'описание этапа',
						]
					);
				$this->end_controls_tab();
			}
		
		$this->end_controls_tabs();
		
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

?>

<div id="stages" class="stages">
	<div class="container">
		
		<h2 class="title stages__title"><?php echo esc_html($settings['stages_block_title']); ?></h2>
		<div class="stages__wrapper">
			<div class="stages__item_pile">
				<img id="pile" src="<?php echo esc_url($settings['stages_block_image']['url']); ?>" alt="pile">
			</div>
			<div class="stages__item">
				<div class="stages__item_header fz-36-bn"><span><?php echo esc_html($settings['stages_number1']); ?></span><div><?php echo esc_html($settings['stages_title1']); ?></div></div>
				<div class="stages__item_description fz-16-os"><?php echo esc_html($settings['stages_descr1']); ?></div>
			</div>
			<div class="stages__item">
				<div class="stages__item_header fz-36-bn"><span><?php echo esc_html($settings['stages_number2']); ?></span><?php echo esc_html($settings['stages_title2']); ?></div>
				<div class="stages__item_description fz-16-os"><?php echo esc_html($settings['stages_descr2']); ?></div>
			</div>
			<div class="stages__item">
				<div class="stages__item_header fz-36-bn"><span><?php echo esc_html($settings['stages_number3']); ?></span><?php echo esc_html($settings['stages_title3']); ?></div>
				<div class="stages__item_description fz-16-os"><?php echo esc_html($settings['stages_descr3']); ?></div>
			</div>
			<div class="stages__item">
				<div class="stages__item_header fz-36-bn"><span><?php echo esc_html($settings['stages_number4']); ?></span><?php echo esc_html($settings['stages_title4']); ?> <br>
					и предоплата</div>
				<div class="stages__item_description fz-16-os"><?php echo esc_html($settings['stages_descr4']); ?></div>
			</div>
			<div class="stages__item">
				<div class="stages__item_header fz-36-bn"><span><?php echo esc_html($settings['stages_number5']); ?></span><?php echo esc_html($settings['stages_title5']); ?></div>
				<div class="stages__item_description fz-16-os"><?php echo esc_html($settings['stages_descr5']); ?></div>
			</div>
			
			<div class="stages__item_title-btn">
				<h2 class="title stages__title_end fz-64-bn"><?php echo esc_html($settings['stages_block_title_end']); ?></h2>
				<button class="button button_form modal-btn fz-16-bn">Оставить заявку</button>
			</div>
		</div>
		
		
	</div>
</div>           
<?php



	}

}