<?php

class Elementor_Advantages_Widget extends \Elementor\Widget_Base {

	
	public function get_name() {
		return 'specialpile_advantages';
	}

	public function get_title() {
		return esc_html__( 'Блок Преимущества', 'specialpile-core' );
	}

	public function get_icon() {
		return 'eicon-container';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'advantages_title_section',
			[
				'label' => __( 'Шапка блока', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'advantages_title',
			[
				'label' => esc_html__('Заголовок блока', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
				'default' => 'Преимущества забивного свайного фундамента',
			]
		);
		for ( $i = 1; $i <= 4; $i++ ) {
			$this->add_control(
				'advantages_block_image' . $i,
				[
					'label' => esc_html__('Выберете изображение колонки ' . $i, 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
			$this->add_control(
				'advantages_block_title' . $i,
				[
					'label' => esc_html__('Заголовок колонки' . $i, 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '',
					'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
					'default' => 'Преимущества забивного свайного фундамента',
				]
			);
		}
		$this->end_controls_section();

		$this->start_controls_section(
			'advantages_blocks_section',
			[
				'label' => __( 'Наполнение колонок/иконки', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->start_controls_tabs( 'advantages_tabs' );

		for ( $i = 1; $i <= 4; $i++ ) {
			$this->start_controls_tab(
				'advantages_tab_' . $i,
				[
					'label' => esc_html__( 'Колонка ' . $i, 'plugin-domain' ),
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'advantage_text',
				[
					'label' => esc_html__( 'Добавить текст', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Добавить текст' , 'textdomain' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'advantage_select',
				[
					'name' => 'advantage_type',
					'label' => esc_html__('Тип преимущества', 'plugin-domain'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'mark',
					'options' => [
						'mark' => esc_html__('Полоска/Чёрточка', 'plugin-domain'),
						'check-mark' => esc_html__('Галочка', 'plugin-domain'),
					],
				]
			);

			$this->add_control(
				'advantages_list-' . $i,
				[
					'label' => esc_html__( 'Список слайдов', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'title_field' => '{{{ advantage_text }}}',
				]
			);

   			$this->end_controls_tab();
		}

		$this->start_controls_tab( ////////////////// ICONS
			'advantages_icons',
			[
				'label' => esc_html__( 'Иконки', 'plugin-domain' ),
			]
		);
		$this->add_control(
			'icon_advantages_check-mark',
			[
				'label' => esc_html__('Добавьте иконку для элементов с галочкой', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'icon_advantages_mark',
			[
				'label' => esc_html__('Добавьте иконку для элементов без галочки', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_tab();
		

		$this->end_controls_tabs();

		

		$this->end_controls_section();
		
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

?>

<div id="advantages" class="container__overflow_hidden">
		<div class="advantages container">
			<h2 class="title advantages__title"><?php echo esc_html( $settings['advantages_title'] ); ?></h2>

			<div class="advantages__wrapper">
				<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
					<div class="advantages__card">
						<div class="advantages__card_header">
							<img src="<?php echo esc_url( $settings[ 'advantages_block_image' . $i ]['url'] ); ?>" alt="">
						</div>
						<div class="advantages__card_body">
							<h3 class="advantages__card_body_title fz-36-bn"><?php echo esc_html( $settings[ 'advantages_block_title' . $i ] ); ?></h3>
							<div class="fz-16-os">
								<?php foreach ( $settings['advantages_list-' . $i] as $advantage ) :
									$advantage_text = $advantage['advantage_text'];
									$advantage_select = $advantage['advantage_select'];
									$advantage_class = $advantage_select === 'check-mark' ? 'advantages_check-mark' : 'advantages_mark';
								?>
									<div class="<?php echo esc_attr( $advantage_class ); ?>">
										<img class="icon_advantages_mark" src="<?php echo esc_url( $settings['icon_' . $advantage_class]['url'] ); ?>" alt="">
										<?php echo esc_html( $advantage_text ); ?>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php endfor; ?>
			</div>
			<!-- advantages slider start -->
			<div class="advantages__slider">
				<div class="advantages__inner">
					<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
						<div class="advantages__slide">
							<div class="advantages__card">
								<div class="advantages__card_header">
									<img src="<?php echo esc_url( $settings[ 'advantages_block_image' . $i ]['url'] ); ?>" alt="">
								</div>
								<div class="advantages__card_body">
									<h3 class="advantages__card_body_title fz-36-bn"><?php echo esc_html( $settings[ 'advantages_block_title' . $i ] ); ?></h3>
									<div class="fz-16-os">
										<?php foreach ( $settings['advantages_list-' . $i] as $advantage ) :
											$advantage_text = $advantage['advantage_text'];
											$advantage_select = $advantage['advantage_select'];
											$advantage_class = $advantage_select === 'check-mark' ? 'advantages_check-mark' : 'advantages_mark';
										?>
											<div class="<?php echo esc_attr( $advantage_class ); ?>">
												<img class="icon_advantages_mark" src="<?php echo esc_url( $settings['icon_' . $advantage_class]['url'] ); ?>" alt="">
												<?php echo esc_html( $advantage_text ); ?>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endfor; ?>
				</div>
				<div class="container advantages__navigation">
					<div class="advantages__navigation navigation_prev">
						<button class="button_black fz-16-bn"><div class="arrow-left"></div></button>
					</div>
					<div class="advantages__navigation navigation_next">
						<button class="button_black fz-16-bn"><div class="arrow-right"></div></button>
					</div>
				</div>
			</div>
			<!-- advantages slider end -->
		</div>
	</div>
<?php



	}

}