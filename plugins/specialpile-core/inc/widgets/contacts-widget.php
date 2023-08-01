<?php

class Elementor_Contacts_Widget extends \Elementor\Widget_Base {

    public function get_script_depends(){
		if(\Elementor\Plugin::$instance->preview->is_preview_mode()) {
			wp_register_script('contacts-script.js', plugins_url('/js/contacts-script.js', __FILE__), ['elementor-frontend'], '1.0', true);
			return ['contacts-script.js'];
		}
		return [];
	}
    public function get_name() {
        return 'specialpile_contacts';
    }

    public function get_title() {
        return esc_html__( 'Виджет Контакты', 'specialpile-core' );
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
			'contacts_title',
			[
				'label' => esc_html__( 'Заголовок блока', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Контакты:' , 'textdomain' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'contacts_address',
			[
				'label' => esc_html__( 'Адрес на карте/ Для геозапроса / Отображается на балуне', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Адрес: г. Иркутск, ул. Свердлова, 43а' , 'textdomain' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'contacts_address_descr',
			[
				'label' => esc_html__( 'Описание балуна', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '' , 'textdomain' ),
				'label_block' => true,
			]
		);

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'contacts_name',
			[
				'label' => esc_html__( 'Заголовок', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Заголовок блока' , 'textdomain' ),
				'label_block' => true,
			]
		);

        for($i=1; $i<=4; $i++) {
            $repeater->add_control(
                'contacts_link-' . $i,
                [
                    'label' => esc_html__( 'Название ссылки' . $i, 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Название ссылки' , 'textdomain' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'contacts_href-' . $i,
                [
                    'label' => esc_html__( 'Путь ссылки', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '' , 'textdomain' ),
                    'label_block' => true,
                ]
            );
        }

        

		$repeater->add_control(
			'contacts_descr',
			[
				'label' => esc_html__( 'описание', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'описание' , 'textdomain' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'contacts_repeater',
			[
				'label' => esc_html__( 'Контакты', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ contacts_name }}}',
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
            <div class="contacts__title fz-48-bn"><?php echo esc_html($settings['contacts_title']);?></div>
            <div id="address_map" class="address_map"><?php echo $settings['contacts_address']; ?></div>
            <?php if (esc_html($settings['contacts_address_descr'])) { ?>
            <div class="address_descr"><?php echo esc_html($settings['contacts_address_descr']); ?></div>
            <?php } ?>
            <div class="contacts__item_wrapper">
            <?php foreach ($settings['contacts_repeater'] as $contact) :?>
                <div class="contacts__item">
                    <div class="contacts__label fz-16-os"><?php echo esc_html($contact['contacts_name']); ?></div>
                    <?php if (esc_url($contact['contacts_href-1']) && (esc_html($contact['contacts_link-1']))){?>
                    <a href="<?php echo esc_url($contact['contacts_href-1'])?>" class="contacts__link fz-32-bn"><?php echo esc_html($contact['contacts_link-1']); ?></a>
                    <?php }; ?>
                    <?php if (esc_url($contact['contacts_href-2']) && (esc_html($contact['contacts_link-2']))){?>
                    <a href="<?php echo esc_url($contact['contacts_href-2'])?>" class="contacts__link fz-32-bn"><?php echo esc_html($contact['contacts_link-2']); ?></a>
                    <?php }; ?>
                    <?php if (esc_url($contact['contacts_href-3']) && (esc_html($contact['contacts_link-3']))){?>
                    <a href="<?php echo esc_url($contact['contacts_href-3'])?>" class="contacts__link fz-32-bn"><?php echo esc_html($contact['contacts_link-3']); ?></a>
                    <?php }; ?>
                    <?php if (esc_url($contact['contacts_href-4']) && (esc_html($contact['contacts_link-4']))){?>
                    <a href="<?php echo esc_url($contact['contacts_href-4'])?>" class="contacts__link fz-32-bn"><?php echo esc_html($contact['contacts_link-4']); ?></a>
                    <?php }; ?>
                    <?php if (esc_html($contact['contacts_descr'])) {?>
                    <div class="contacts__descr fz-14-os"><?php echo $contact['contacts_descr']; ?></div>
                    <?php }; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="map" class="contacts__map"></div>
    </div>
</div>


<?php }

}