<?php

class Elementor_Info_Widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'specialpile_info';
	}

	public function get_title() {
		return esc_html__( 'Блок Информации', 'specialpile-core' );
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
			'info_title',
			[
				'label' => esc_html__('Заголовок блока', 'plugin-domain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __('Напишите заголвок здесь', 'plugin-domain'),
				'default' => 'Почему именно мы?',
			]
		);


			$this->start_controls_tabs( 'info_block_tabs' );
			
			for ($i = 1; $i <= 4; $i++ ){
				$this->start_controls_tab(
					'info_tab' . $i,
					[
						'label' => esc_html__( 'Блок информации ' . $i, 'plugin-domain' ),
					]
				);
					$this->add_control(
						'info_block_title' . $i,
						[
							'label' => esc_html__('Заголовок блока информации' . $i, 'plugin-domain'),
							'type' => \Elementor\Controls_Manager::TEXT,
							'placeholder' => __('Напишите заголовок здесь', 'plugin-domain'),
							'default' => 'Заголовок',
						]
					);

					$this->add_control(
						'info_descr' . $i,
						[
							'label' => esc_html__('Описание блока информации' . $i, 'plugin-domain'),
							'type' => \Elementor\Controls_Manager::TEXTAREA,
							'maxlength' => 200,
							'placeholder' => __('Напишите заголовок здесь', 'plugin-domain'),
							'default' => 'Описание блока информации',
						]
					);
				$this->end_controls_tab();
			}
		$this->end_controls_tabs();

		$this->start_controls_tabs( 'info_block_pas_tabs' );
            for ($i = 1; $i <= 2; $i++ ){
                $this->start_controls_tab(
                    'info_pas_tab' . $i,
                    [
                        'label' => esc_html__( 'Блок паспорта ' . $i, 'plugin-domain' ),
                    ]
                );
                    $this->add_control(
                        'info_block_pas_title' . $i,
                        [
                            'label' => esc_html__('Заголовок блока информации паспорта' . $i, 'plugin-domain'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => __('Напишите заголовок здесь', 'plugin-domain'),
                            'default' => 'Заголовок',
                        ]
                    );
                    $this->add_control(
                        'info_block_pas_link' . $i,
                        [
                            'label' => esc_html__('Ссылка паспорта качества ' . $i, 'plugin-domain'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => __('Напишите ссылка паспорта качества здесь', 'plugin-domain'),
                            'default' => 'Заголовок',
                        ]
                    );

                    $this->add_control(
                        'info_block_pas_image' . $i,
                        [
                            'label' => __( 'Изображение блока', 'plugin-domain' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'default' => [
                                'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
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

<div id="info" class="container info">
    <h2 class="title info__title"><?php echo esc_html($settings['info_title']);?></h2>
    <div class="info__wrapper">
        <div class="info__wrapper_item">
            <div class="info__wrapper_item_header fz-64-bn"><?php echo esc_html($settings['info_block_title1']);?></div>
            <div class="info__wrapper_item_descr fz-36-bn"><?php echo esc_html($settings['info_descr1']);?></div>
        </div>
        <div class="info__wrapper_item">
            <div class="info__wrapper_item_header fz-64-bn"><?php echo esc_html($settings['info_block_title2']);?></div>
            <div class="info__wrapper_item_descr fz-36-bn"><?php echo esc_html($settings['info_descr2']);?></div>
        </div>
        <div class="info__wrapper_item">
            <div class="info__wrapper_item_img">
                <img src="<?php echo esc_url($settings['info_block_pas_image1']['url']);?>" alt="pasport">
            </div>
            <div class="info__wrapper_item_header-pass fz-32-bn"><?php echo esc_html($settings['info_block_pas_title1']);?></div>
            <a class="info__wrapper_item_link fz-16-bn" href="<?php echo esc_url($settings['info_block_pas_link1']);?>">Просмотреть</a>
            
            
        </div>
        <div class="info__wrapper_item">
            <div class="info__wrapper_item_header fz-64-bn"><?php echo esc_html($settings['info_block_title3']);?></div>
            <div class="info__wrapper_item_descr fz-36-bn"><?php echo esc_html($settings['info_descr3']);?></div>
        </div>
        <div class="info__wrapper_item">
            <div class="info__wrapper_item_header fz-64-bn"><?php echo esc_html($settings['info_block_title4']);?></div>
            <div class="info__wrapper_item_descr fz-36-bn"><?php echo esc_html($settings['info_descr4']);?></div>
        </div>
        <div class="info__wrapper_item">
            <div class="info__wrapper_item_img">
                <img src="<?php echo esc_url($settings['info_block_pas_image2']['url']);?>" alt="pasport">
            </div>
            <div class="info__wrapper_item_header-pass fz-32-bn"><?php echo esc_html($settings['info_block_pas_title2']);?></div>
            <a class="info__wrapper_item_link fz-16-bn" href="<?php echo esc_url($settings['info_block_pas_link2']);?>">Просмотреть</a>
            
        </div>
    </div>
</div>
<?php



	}

}