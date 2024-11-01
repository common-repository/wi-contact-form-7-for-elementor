<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_ContactUs7 extends Widget_Base {
	
	public function get_name() {
		return 'wi-contact-us';
	}
	
	public function get_title() {
		return __( 'Contact Form 7', 'wi_cf7_elementor' );
	}
	
	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_categories() {
		return [ 'wi-elements' ];
	}
		
	protected function _register_controls() {

			$this->start_controls_section(
				'section_contact_us',
				[
					'label' => __( 'Contact Form 7', 'wi_cf7_elementor' )
				]
			);
			
		$this->add_control(
			'title',
			[
				'name' => 'title',
				'label' => __( 'Form Title', 'wi_cf7_elementor' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'cform', // id
			[
				'label' => __( 'Select Form', 'wi_cf7_elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => 
					wi_query_posts('wpcf7_contact_form', -1)
				
			]
		);
		$this->add_control(
			'form_redirect', // id
			[
				'label' => __( 'Thankyou Page', 'wi_cf7_elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 5,
				'options' => 
					wi_query_posts('page', -1)
				
			]
		);

			$this->end_controls_section();

//widget style 
//Title			
			$this->start_controls_section(
				'form_title',
				[
					'label' => __( 'Form Title', 'wi_cf7_elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control(
				'form_title_tag', // id
			[
				'label' => __( 'Title HTML Tag', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'elementor' ),
					'h2' => __( 'H2', 'elementor' ),
					'h3' => __( 'H3', 'elementor' ),
					'h4' => __( 'H4', 'elementor' ),
					'h5' => __( 'H5', 'elementor' ),
					'h6' => __( 'H6', 'elementor' ),
					'div' => __( 'div', 'elementor' ),
					'span' => __( 'span', 'elementor' ),
					'p' => __( 'p', 'elementor' ),
				],
				'default' => 'h2',
			]
			);
			$this->add_control(
				'form_title_color',
				[
					'label' => __( 'Title Color', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_2,
					],
					'selectors' => [
						'{{WRAPPER}} .title-widget' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'form_title_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .title-widget',
				]
			);


			
			$this->end_controls_section();
//Label Styles
			$this->start_controls_section(
				'field_label',
				[
					'label' => __( 'Label Style', 'wi_cf7_elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control(
				'form_labelColor',
				[
					'label' => __( 'Label Color', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_2,
					],
					'selectors' => [
						'{{WRAPPER}} form.wpcf7-form' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'form_labels_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} form.wpcf7-form',
				]
			);
		
			$this->end_controls_section();

//form inputs
			$this->start_controls_section(
				'form_inputs',
				[
					'label' => __( 'Field Style', 'wi_cf7_elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control(
				'form_inputs_padding',
				[
					'label' => __( 'Padding', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control-wrap input:not(.wpcf7-submit), .wpcf7-form-control-wrap textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'form_inputs_margin',
				[
					'label' => __( 'Margin', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control-wrap input:not(.wpcf7-submit), .wpcf7-form-control-wrap textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'form_inputs_size',
				[
					'label' => __( 'Fields Width', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 30,
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'size_units' => [ 'px', '%' ],
					'range' => [
						'%' => [
							'min' => 5,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control-wrap input:not(.wpcf7-submit), {{WRAPPER}} .wpcf7-form-control-wrap textarea' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'form_inputs_txt_color',
				[
					'label' => __( 'Text Color', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_2,
					],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control-wrap input:not(.wpcf7-submit), .wpcf7-form-control-wrap textarea, {{WRAPPER}} ::-webkit-input-placeholder' => 'color: {{VALUE}};',
						'{{WRAPPER}} :-ms-input-placeholder' => 'color: {{VALUE}};',
						'{{WRAPPER}} ::-moz-placeholder' => 'color: {{VALUE}};',
						'{{WRAPPER}} :-moz-placeholder' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'form_inputs_bg',
				[
					'label' => __( 'Background Color', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_3,
					],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control-wrap input:not(.wpcf7-submit), .wpcf7-form-control-wrap textarea' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'form_inputs_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .wpcf7-form-control-wrap input:not(.wpcf7-submit), .wpcf7-form-control-wrap textarea',
				]
			);
	        $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'form_inputs_border',
					'label' => __( 'Box Border', 'wi_cf7_elementor' ),
					'selector' => '{{WRAPPER}} .wpcf7-form-control-wrap input:not(.wpcf7-submit), .wpcf7-form-control-wrap textarea',
				]
			);
	
	
	
	        $this->add_control(
				'form_inputs_border_radius',
				[
					'label' => __( 'Border Radius', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control-wrap input:not(.wpcf7-submit), .wpcf7-form-control-wrap textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			
			$this->end_controls_section();

//form button
			$this->start_controls_section(
				'form_btn',
				[
					'label' => __( 'Button Style', 'wi_cf7_elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control(
				'form_btn_padding',
				[
					'label' => __( 'Padding', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'form_btn_margin',
				[
					'label' => __( 'Margin', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'form_btn_size',
				[
					'label' => __( 'Button Size', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 30,
						'unit' => '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'size_units' => [ 'px', '%' ],
					'range' => [
						'%' => [
							'min' => 5,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'form_btn_txt_color',
				[
					'label' => __( 'Text Color', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_2,
					],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'form_btn_hover_txt_color',
				[
					'label' => __( 'Hover Text Color', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_2,
					],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => '-webkit-transition:all 0.6s ease 0s;-moz-transition:all 0.6s ease 0s;-ms-transition:all 0.6s ease 0s;-o-transition:all 0.6s ease 0s;transition:all 0.6s ease 0s;',
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'form_btn_bg',
				[
					'label' => __( 'Background-color', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_4,
					],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'form_btn_hover_bg',
				[
					'label' => __( 'Hover Background color', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_4,
					],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => '-webkit-transition:all 0.6s ease 0s;-moz-transition:all 0.6s ease 0s;-ms-transition:all 0.6s ease 0s;-o-transition:all 0.6s ease 0s;transition:all 0.6s ease 0s;',
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit:hover' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'form_btn_box_shadow',
					'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit',
				]
			);
	
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'form_btn_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit',
				]
			);
	        $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'form_btn_border',
					'label' => __( 'Box Border', 'wi_cf7_elementor' ),
					'selector' => '{{WRAPPER}} .wpcf7-form-control.wpcf7-submit',
				]
			);
	
	
	
	        $this->add_control(
				'form_btn_border_radius',
				[
					'label' => __( 'Border Radius', 'wi_cf7_elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .wpcf7-form-control.wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			$this->end_controls_section();

	}
	
	protected function render(){
		$settings = $this->get_settings();
		?>
			<div id="Wi-cf7-<?php echo $this->get_id(); ?>">
				<<?php echo $this->get_settings( 'form_title_tag' ); ?> class="title-widget"><?php echo $this->get_settings( 'title' ); ?></<?php echo $this->get_settings( 'form_title_tag' ); ?>>
				<?php if ($this->get_settings( 'cform' ) != null) { echo do_shortcode( '[contact-form-7 id="'.$this->get_settings( 'cform' ).'"]' ); } ?> 
			</div>
        <?php
 		if(!empty($settings['form_redirect'])) {  ?>
 			<script>
 			        var currentForm = document.querySelector('#Wi-cf7-<?php echo $this->get_id(); ?>');
						currentForm.addEventListener( 'wpcf7mailsent', function( event ) {
					    location = '<?php echo get_permalink( $settings['form_redirect'] ); ?>';
					}, false );
			</script>

		<?php 
 		}


	}
	
	protected function content_template() {
		?>
		<#

        box_html = '';

		print( separator_html );
		#>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_ContactUs7() );
?>