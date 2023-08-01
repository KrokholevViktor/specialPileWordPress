<?php


class Elementor_Slider_Widget extends \Elementor\Widget_Base {
	
	public function get_script_depends(){
		if(\Elementor\Plugin::$instance->preview->is_preview_mode()) {
			wp_register_script('formslider-script.js', plugins_url('/js/formslider-script.js', __FILE__), ['elementor-frontend'], '1.0', true);
			return ['formslider-script.js'];
		}
		return [];
	}

	
	public function get_name() {
		return 'specialpile_slider';
	}

	public function get_title() {
		return esc_html__( 'Блок Онлайн-Калькулятор', 'specialpile-core' );
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

		$this->start_controls_tabs( 'slider_tabs' );
		
		$this->start_controls_tab(
			'slider_title-tab',
			[
				'label' => esc_html__( 'Заголовки слайдов', 'plugin-domain' ),
			]
		);
		for ($i = 1; $i <= 6; $i++) {
			$this->add_control(
			'specialpile_title' . $i,
			[
				'label' => esc_html__('Заголовок слайда ' . $i, 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
				'default' => 'Заголовок' . $i,
			]
			);
		}
		$this->end_controls_tab();

		$this->start_controls_tab(
			'slider_slide1-tab',
			[
				'label' => esc_html__( 'Слайд 1', 'plugin-domain' ),
			]
		);

		for ($i = 1; $i <= 6; $i++) { /// SLIDE-1
			$this->add_control(
				'slider1-image' . $i,
				[
					'label' => esc_html__('Выберете ' . $i . ' изображение слайда 1', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
		
			$this->add_control(
				'specialpile_slider1-image' . $i . '-title',
				[
					'label' => esc_html__('Заголовок ' . $i . ' изображения слайда 1', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '',
					'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
					'default' => 'Заголовок изображения ' . $i,
				]
			);
		}
		$this->end_controls_tab();

		$this->start_controls_tab(
			'slider_slide2-tab',
			[
				'label' => esc_html__( 'Слайд 2', 'plugin-domain' ),
			]
		);

		for ($i = 1; $i <= 3; $i++) { /// SLIDE-2
			$this->add_control(
				'slider2-image' . $i,
				[
					'label' => esc_html__('Выберете ' . $i . ' изображение слайда 2', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
		
			$this->add_control(
				'specialpile_slider2-image' . $i . '-title',
				[
					'label' => esc_html__('Заголовок ' . $i . ' изображения слайда 2', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '',
					'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
					'default' => 'Заголовок изображения ' . $i,
				]
			);
		}
		$this->end_controls_tab();


		$this->start_controls_tab( /// SLIDE-3
			'slider_slide3-tab',
			[
				'label' => esc_html__( 'Слайд 3', 'plugin-domain' ),
			]
		);


		for ($i = 1; $i <= 6; $i++) { 
			$this->add_control(
				'slider3-image' . $i,
				[
					'label' => esc_html__('Выберете ' . $i . ' изображение слайда 3', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
		
			$this->add_control(
				'specialpile_slider3-image' . $i . '-title',
				[
					'label' => esc_html__('Заголовок ' . $i . ' изображения слайда 3', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '',
					'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
					'default' => 'Заголовок изображения ' . $i,
				]
			);
		}

		$this->end_controls_tab();

		$this->start_controls_tab( /// SLIDE-4
			'slider_slide4-tab',
			[
				'label' => esc_html__( 'Слайд 4', 'plugin-domain' ),
			]
		);

		for ($i = 1; $i <= 6; $i++) { 
			$this->add_control(
				'slider4-image' . $i,
				[
					'label' => esc_html__('Выберете ' . $i . ' изображение слайда 4', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
		
			$this->add_control(
				'specialpile_slider4-image' . $i . '-title',
				[
					'label' => esc_html__('Заголовок ' . $i . ' изображения слайда 4', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '',
					'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
					'default' => 'Заголовок изображения ' . $i,
				]
			);
		}
		$this->end_controls_tab();

		$this->start_controls_tab( /// SLIDE-5
			'slider_slide5-tab',
			[
				'label' => esc_html__( 'Слайд 5', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'slider5-image' . $i,
			[
				'label' => esc_html__('Выберете изображение слайда 5', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		for ($i = 1; $i <= 2; $i++) { 
		
			$this->add_control(
				'specialpile_slider5-title' . $i,
				[
					'label' => esc_html__('Текст карточки ' . $i . ' слайда 5', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '',
					'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
					'default' => 'Карточка ' . $i,
				]
			);
		}
		$this->end_controls_tab();

		$this->start_controls_tab( //////////////////////////// SLIDE-6
			'slider_slide6-tab',
			[
				'label' => esc_html__( 'Слайд 6', 'plugin-domain' ),
			]
		);
		$this->add_control(
			'slider6-image1',
			[
				'label' => __( 'Выберете изображение слайда 6', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'slider6-icon-upload',
			[
				'label' => __( 'Выберете изображение иконки', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'specialpile_policy_link',
			[
				'label' => esc_html__( 'Ссылка политики конфиденциальности', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Напишите заголвок здесь', 'plugin-domain' ),
				'default' => '#',
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

?>


<div id="form-slider" class="form-slider">
	<div class="container">
		<div class="form-slider__head">
		<?php for ($i = 1; $i <= 6; $i++) : ?>
			<?php if (isset($settings['specialpile_title' . $i])) : ?>
				<h3 class="title form-slider__title">
					<?php echo esc_html($settings['specialpile_title' . $i]); ?>
				</h3>
			<?php endif; ?>
		<?php endfor; ?>
			<div class="form-slider__counter fz-48-bn">
				<span id="current">1</span>
				<span class="form-slider__counter_divider">/</span>
				<span id="total">5</span>
			</div>
		</div>
		<div class="form-slider__wrapper">
			<div class="form-slider__inner">
			<div class="form-slider__item item-1 fz-32-bn">
				<?php for ($i = 1; $i <= 6; $i++) : ?>
					<?php
					$title_key = 'specialpile_slider1-image' . $i . '-title';
					$image_key = 'slider1-image' . $i;
					?>

					<div class="form-slider__item__card">
						<div class="form-slider__img">
							<div class="form-slider__item__card__title"><?php echo esc_html($settings[$title_key]); ?></div>
							<img src="<?php echo esc_url($settings[$image_key]['url']); ?>" alt="#">
						</div>
					</div>

				<?php endfor; ?>
			</div>
				<div class="form-slider__item item-2 fz-32-bn">
					<?php for ($i = 1; $i <= 3; $i++) : ?>
						<?php
						$title_key = 'specialpile_slider2-image' . $i . '-title';
						$image_key = 'slider2-image' . $i;
						?>

						<div class="form-slider__item__card">
							<div class="form-slider__img">
								<div class="form-slider__item__card__title"><?php echo esc_html($settings[$title_key]); ?></div>
								<img src="<?php echo esc_url($settings[$image_key]['url']); ?>" alt="#">
							</div>
						</div>

					<?php endfor; ?>
				</div>
				<div class="form-slider__item item-3 fz-32-bn">
					<?php for ($i = 1; $i <= 6; $i++) : ?>
						<?php
						$title_key = 'specialpile_slider3-image' . $i . '-title';
						$image_key = 'slider3-image' . $i;
						?>

						<div class="form-slider__item__card">
							<div class="form-slider__img">
								<div class="form-slider__item__card__title"><?php echo esc_html($settings[$title_key]); ?></div>
								<img src="<?php echo esc_url($settings[$image_key]['url']); ?>" alt="#">
							</div>
						</div>

					<?php endfor; ?>
				</div>
				<div class="form-slider__item item-4 fz-32-bn">
					<?php for ($i = 1; $i <= 6; $i++) : ?>
						<?php
						$title_key = 'specialpile_slider4-image' . $i . '-title';
						$image_key = 'slider4-image' . $i;
						?>

						<div class="form-slider__item__card">
							<div class="form-slider__img">
								<div class="form-slider__item__card__title"><?php echo esc_html($settings[$title_key]); ?></div>
								<img src="<?php echo esc_url($settings[$image_key]['url']); ?>" alt="#">
							</div>
						</div>

					<?php endfor; ?>
				</div>
				<div class="form-slider__item item-5 fz-32-bn">
					<?php for ($i = 1; $i <= 2; $i++) : ?>
						<?php
						$title_key = 'specialpile_slider5-title' . $i;
						?>
						<div class="form-slider__item__card-form">
							<div class="form-slider__item__card-form_select"><?php echo esc_html($settings[$title_key]);?></div>
						</div>
					<?php endfor; ?>
					<div class="form-slider__item__card-form">
						<img src="<?php echo esc_url($settings['slider5-image1']['url']); ?>" alt="#">
					</div>
				</div>
				<div class="form-slider__item item-6 fz-32-bn">
					<div class="form-slider__item__card-form">
						<form data-calc="end" id="pileForm" action="#" class="form">
							<div class="form-main fz-16-bn">
								<div class="form-main__item">
									<label for="name">Имя</label>
									<input class="fz-16-os" name="name" id="name" type="text" placeholder="Иван">
								</div>
								<div class="form-main__item">
									<div><label for="phone">Номер телефона</label><span class="tooltip">*</span></div> 
									<input class="input--required fz-16-os" name="phone" re id="phone" type="text"  placeholder="+7 (999) 999-99-99">
									
								</div>
								<div class="form-main__item">
									<div><label for="email">Электронная почта</label><span class="tooltip">*</span></div>
									<input class="input--required fz-16-os" name="email" id="email" type="email"   placeholder="mail@mail.ru">
								</div>
								<div class="form-main__item">
									<div>Прикрепить файл проекта</div>
									<label class="label-upload fz-16-os" for="file"><img src="<?php echo esc_url($settings['slider6-icon-upload']['url']); ?>" alt="#" class="icon-label-upload">Прикрепить файл</label>
									<input class="input-upload" name="file" id="file" type="file" value="Прикрепить файл">
								</div>
								<div class="form-main__item form-main__item_policy">
									<input id="checkbox" name="checkbox" class="input--required checkbox" type="checkbox">
									<label for="checkbox" class="fz-14-os"><a class="fz-14-os" href="<?php echo esc_url($settings['specialpile_policy_link']);?>">Я соглашаюсь с условиями политики конфиденциальности</a></label>
								</div>
							</div>
						</form>
					</div>
					<div class="form-slider__item__card">
						<img src="<?php echo esc_url($settings['slider6-image1']['url']); ?>" alt="#">
					</div>
				</div>
			</div>
		</div>
		<div class="form-slider__navigation">
			<div class="form-slider__navigation_prev">
				<button id="prev" class="button_black fz-16-bn"><div class="arrow-left"></div><div>Назад</div></button>
			</div>
			<div class="form-slider__navigation_next">
				<button class="button_black fz-16-bn"><div>Вперед</div><div class="arrow-right"></div></button>
			</div>
			<div class="form-slider__navigation_btn-form">
				<button type="submit" form="pileForm" class="button button_form fz-16-bn"><div>Оставить заявку</div></div></button>
			</div>
		</div>
	</div>
</div>

<?php



	}

}