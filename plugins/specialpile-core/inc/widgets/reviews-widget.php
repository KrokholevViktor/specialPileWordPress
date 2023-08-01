<?php

class Elementor_Reviews_Widget extends \Elementor\Widget_Base {

    public function get_script_depends(){
		if(\Elementor\Plugin::$instance->preview->is_preview_mode()) {
			wp_register_script('reviews-script.js', plugins_url('/js/reviews-script.js', __FILE__), ['elementor-frontend'], '1.0', true);
			return ['reviews-script.js'];
		}
		return [];
	}
    public function get_name() {
        return 'specialpile_reviews';
    }

    public function get_title() {
        return esc_html__( 'Виджет отзывов', 'specialpile-core' );
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
			'reviews_title',
			[
				'label' => esc_html__( 'Заголовок блока', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Отзывы' , 'textdomain' ),
				'label_block' => true,
			]
		);


        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'reviews_name',
			[
				'label' => esc_html__( 'Заголовок', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Заголовок карточки' , 'textdomain' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'reviews_date',
			[
				'label' => esc_html__( 'Дата', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Дата 01.01.2023' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'reviews_descr',
			[
				'label' => esc_html__( 'Текст', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Текст отзыва' , 'textdomain' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'reviews_repeater',
			[
				'label' => esc_html__( 'Лист отзывов', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ reviews_name }}}',
			]
		);

        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display();

?>
    

 

<div id="reviews" class="reviews">
        <h2 class="container title reviews__title"><?php echo esc_html($settings['reviews_title']); ?></h2>
        <div class="container reviews__slide-container">
            <div class="reviews__wrapper">
                <div class="reviews__inner">
                <?php foreach ($settings['reviews_repeater'] as $review) :?>
                    <div class="reviews__slide">
                        <div class="reviews__slide_title fz-32-bn"><?php echo esc_html($review['reviews_name']); ?></div>
                        <div class="reviews__slide_date fz-14-os"><?php echo esc_html($review['reviews_date']); ?></div>
                        <div class="reviews__slide_descr fz-16-os"><?php echo $review['reviews_descr']; ?></div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="container reviews__navigation">
            <div class="reviews__navigation navigation_prev">
                <button class="button_black fz-16-bn"><div class="arrow-left"></div></button>
            </div>
            <div class="reviews__navigation navigation_next">
                <button class="button_black fz-16-bn"><div class="arrow-right"></div></button>
            </div>
        </div>
    </div>

    <?php }

}