<?php

class Elementor_Questions_Widget extends \Elementor\Widget_Base {

    public function get_script_depends(){
		if(\Elementor\Plugin::$instance->preview->is_preview_mode()) {
			wp_register_script('questions-script.js', plugins_url('/js/questions-script.js', __FILE__), ['elementor-frontend'], '1.0', true);
			return ['questions-script.js'];
		}
		return [];
	}
    public function get_name() {
        return 'specialpile_questions';
    }

    public function get_title() {
        return esc_html__( 'Виджет FAQ', 'specialpile-core' );
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
			'questions_title',
			[
				'label' => esc_html__( 'Заголовок блока', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Часто задаваемые вопросы' , 'textdomain' ),
				'label_block' => true,
			]
		);


        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'questions_name',
			[
				'label' => esc_html__( 'Заголовок', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Заголовок карточки' , 'textdomain' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
            'questions_select',
            [
                'name' => 'questins_type',
                'label' => esc_html__('Изменить активность на фронте', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'mark',
                'options' => [
                    'no-active' => esc_html__('Неактивный', 'plugin-domain'),
                    'active' => esc_html__('Активный', 'plugin-domain'),
                ],
            ]
        );

		$repeater->add_control(
			'questions_descr',
			[
				'label' => esc_html__( 'Текст', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Текст отзыва' , 'textdomain' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'questions_repeater',
			[
				'label' => esc_html__( 'Лист вопросов', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ questions_name }}}',
			]
		);

        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display();

?>

<div id="questions" class="questions">
        <div class="container">
            <h2 class="title questions__title"><?php echo esc_html($settings['questions_title']); ?></h2>
            <div class="questions__accordion">
                <?php foreach ($settings['questions_repeater'] as $question) :
                    $questions_select = $question['questions_select'];
                    $questions_class = $questions_select === 'active' ? 'questions__accordion__item_active' : '';
                    ?>
                    <div class="questions__accordion__item <?php echo esc_html($questions_class)?>">
                        <div class="questions__accordion__title fz-32-bn"><?php echo esc_html($question['questions_name']); ?></div>
                        <div class="questions__accordion__descr"><?php echo esc_html($question['questions_descr']); ?></div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>

<?php }

}