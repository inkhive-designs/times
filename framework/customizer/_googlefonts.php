<?php
	function times_customize_register_fonts( $wp_customize ) {
	//Fonts
	$wp_customize->add_section(
	    'times_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','times'),
	        'priority'  => 41,
	        'description' => __('Defaults: Droid Serif, Ubuntu.','times')
	    )
	);
	
	$font_array = array('Arvo','Source Sans Pro','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'times_title_font',
		array(
			'default'=> 'Arvo',
			'sanitize_callback' => 'times_sanitize_gfont' 
			)
	);
	
	function times_sanitize_gfont( $input ) {
		if ( in_array($input, array('Arvo','Source Sans Pro','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora',) ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
		'times_title_font',array(
				'label' => __('Title','times'),
				'settings' => 'times_title_font',
				'section'  => 'times_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'times_body_font',
			array(	'default'=> 'Source Sans Pro',
					'sanitize_callback' => 'times_sanitize_gfont' )
	);
	
	$wp_customize->add_control(
		'times_body_font',array(
				'label' => __('Body','times'),
				'settings' => 'times_body_font',
				'section'  => 'times_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);
}
add_action('customize_register', 'times_customize_register_fonts');