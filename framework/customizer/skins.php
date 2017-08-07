<?php	
function times_customize_register_skins( $wp_customize ) {
	
	$wp_customize->get_section('colors')->title = __('Theme Skin & Colors','times');
	$wp_customize->get_control('header_textcolor')->label = __('Site Title Color','times');
	
	$wp_customize->add_setting('times_header_desccolor', array(
	    'default'     => '#FFFFFF',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'times_header_desccolor', array(
			'label' => __('Site Tagline Color','times'),
			'section' => 'colors',
			'settings' => 'times_header_desccolor',
			'type' => 'color'
		) ) 
	);
	
	$wp_customize->add_setting(
		'times_skin',
		array(
			'default'=> 'default',
			'sanitize_callback' => 'times_sanitize_skin' 
			)
	);
	
	$skins = array( 'default' => __('Default(Times)','times'),
					'orange' =>  __('Orange','times'),
					'green' => __('Green','times'),
					);
	
	$wp_customize->add_control(
		'times_skin',array(
				'settings' => 'times_skin',
				'section'  => 'colors',
				'label' => __('Choose Skin','times'),
				'description' => __('Free Version of Times Supports 3 Different Skin Colors.','times'),
				'type' => 'select',
				'choices' => $skins,
			)
	);
	
	function times_sanitize_skin( $input ) {
		if ( in_array($input, array('default','orange','green') ) )
			return $input;
		else
			return '';
	}
}
add_action('customize_register', 'times_customize_register_skins');
 