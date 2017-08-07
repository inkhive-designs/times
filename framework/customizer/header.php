<?php
function times_customize_register_header( $wp_customize ) {	
	//Header Sections
	$wp_customize->add_panel(
	    'times_header_panel',
	    array(
	        'title'     => __('Header Settings','times'),
	        'priority'  => 30,
	    )
	);
	
	$wp_customize->add_section(
	    'times_header_options',
	    array(
	        'title'     => __('Header Image on Phones','times'),
	        'priority'  => 90,
	        'panel' => 'times_header_panel',
	    )
	);
	
	$wp_customize->add_setting(
		'times_header_image_style',
		array(
			'default'=> 'default',
			'sanitize_callback' => 'times_sanitize_hil' 
			)
	);
	
	$wp_customize->add_control(
		'times_header_image_style',array(
				'label' => __('Choose Image Layout','times'),
				'description' => __('By Default The Header Image Scales responsively on mobile phones and works as a background image. If you want your full header image to appear, choose full-image in the setting below. For More Control over header image, consider Times Pro Version.	','times'),
				'settings' => 'times_header_image_style',
				'section'  => 'times_header_options',
				'type' => 'select',
				'choices' => array(
					'default' => __('Default','times'),
					'full-image' => __('Full Image','times'),
				),
			)
	);
	
	$wp_customize->get_section('header_image')->panel = 'times_header_panel';
	
	function times_sanitize_hil($input) {
		if ( in_array($input, array('default','full-image') ) )
			return $input;
		else
			return '';	
	}
}
add_action('customize_register','times_customize_register_header');	