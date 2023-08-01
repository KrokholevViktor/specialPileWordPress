<?php

class Elementor_Characteristic_Widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'specialpile_characteristic';
	}

	public function get_title() {
		return esc_html__( 'Блок Характеристики', 'specialpile-core' );
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
			'specialpile_title',
			[
				'label' => esc_html__( 'Заголовок блока', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Характеристики железобетонных свай',
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

		$this->add_control(
			'specialpile_descr1',
			[
				'label' => esc_html__( 'Блок характеристик 1', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'placeholder' => __( 'Напишите текст здесь', 'plugin-domain' ),
				'default' => 'Длина свай 3, 4 и 5 метров',
			]
			
		);
		$this->add_control(
			'specialpile_icon1',
			[
				'label' => __( 'Иконка блока характеристик 1', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'specialpile_descr2',
			[
				'label' => esc_html__( 'Блок характеристик 2', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'placeholder' => __( 'Напишите текст здесь', 'plugin-domain' ),
				'default' => 'Размер свай (Сечение) 150х150 мм и 200х200 мм',
			]
			
		);
		$this->add_control(
			'specialpile_icon2',
			[
				'label' => __( 'Иконка блока характеристик 2', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'specialpile_descr3',
			[
				'label' => esc_html__( 'Блок характеристик 3', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'placeholder' => __( 'Напишите текст здесь', 'plugin-domain' ),
				'default' => 'Стержень квадратного сечения',
			]
			
		);
		$this->add_control(
			'specialpile_icon3',
			[
				'label' => __( 'Иконка блока характеристик 3', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'specialpile_descr4',
			[
				'label' => esc_html__( 'Блок характеристик 4', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'placeholder' => __( 'Напишите текст здесь', 'plugin-domain' ),
				'default' => 'Сваи выпускаются на ЖБИ-заводе по ГОСТ 19804-2012',
			]
			
		);
		$this->add_control(
			'specialpile_icon4',
			[
				'label' => __( 'Иконка блока характеристик 4', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'specialpile_descr5',
			[
				'label' => esc_html__( 'Блок характеристик 5', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'placeholder' => __( 'Напишите текст здесь', 'plugin-domain' ),
				'default' => 'Сваи выпускаются на ЖБИ-заводе по ГОСТ 19804-2012',
			]
			
		);
		$this->add_control(
			'specialpile_icon5',
			[
				'label' => __( 'Иконка блока характеристик 5', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

?>

<div class="container__overflow_hidden">
	<div id="characteristics" class="container characteristics">
		<h2 class="title"><?php echo esc_html($settings['specialpile_title']); ?></h2>
		<div class="characteristics__wrapper">
			<div class="characteristics_item fz-32-bn ">
				<div class="icon__wrapper">
					<picture>
						<source media="(max-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon1']['url']); ?>">
						<source media="(min-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon1']['url']); ?>">
						<img src="<?php echo esc_url($settings['specialpile_icon2']['url']); ?>" alt="diameter" class="characteristics_icon">
					</picture>
				</div>
				<div class="characteristics_item_descr"><?php echo esc_html($settings['specialpile_descr1']); ?></div>
			</div>
			<div class="characteristics_item fz-32-bn ">
				<div class="icon__wrapper">
					<picture>
						<source media="(max-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon2']['url']); ?>">
						<source media="(min-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon2']['url']); ?>">
						<img src="<?php echo esc_url($settings['specialpile_icon2']['url']); ?>" alt="diameter" class="characteristics_icon">
					</picture>
				</div>
				<div class="characteristics_item_descr"><?php echo esc_html($settings['specialpile_descr2']); ?></div>
			</div>
			<div class="characteristics_item fz-32-bn">
			<div class="icon__wrapper">
				<picture>
					<source media="(max-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon3']['url']); ?>">
					<source media="(min-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon3']['url']); ?>">
					<img src="<?php echo esc_url($settings['specialpile_icon2']['url']); ?>" alt="diameter" class="characteristics_icon">
				</picture>
			</div>
				
				<div class="characteristics_item_descr"><?php echo esc_html($settings['specialpile_descr3']); ?></div>
			</div>
			<div class="characteristics_item fz-32-bn">

			<div class="icon__wrapper">
				<picture>
					<source media="(max-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon4']['url']); ?>">
					<source media="(min-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon4']['url']); ?>">
					<img src="<?php echo esc_url($settings['specialpile_icon2']['url']); ?>" alt="diameter" class="characteristics_icon">
				</picture>
			</div>
				
				<div class="characteristics_item_descr"><?php echo esc_html($settings['specialpile_descr4']); ?></div>
			</div>
			<div class="characteristics_item fz-32-bn">

			<div class="icon__wrapper">
				<picture>
					<source media="(max-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon5']['url']); ?>">
					<source media="(min-width: 576px)" srcset="<?php echo esc_url($settings['specialpile_icon5']['url']); ?>">
					<img src="<?php echo esc_url($settings['specialpile_icon2']['url']); ?>" alt="diameter" class="characteristics_icon">
				</picture>
			</div>

				<div class="characteristics_item_descr"><?php echo esc_html($settings['specialpile_descr5']); ?></div>
				<?php if (esc_url($settings['main_image']['url'])){?>
					<img src="<?php echo esc_url($settings['main_image']['url']); ?>" alt="characteristics_bg" class="characteristics__bg" >
				<?php }?>
			</div>
		</div>
		
	</div>
</div>

<?php



	}

}