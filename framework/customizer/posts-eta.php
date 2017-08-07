<?php 

function times_customize_eta( $wp_customize ) {	
	//Featured Posts 2 - Eta
	$wp_customize->add_section(
	    'times_eta_section',
	    array(
	        'title'     => __('Featured Posts 2','times'),
	        'priority'  => 10,
	        'panel'     => 'times_a_fcp_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'times_eta_enable',
		array( 'sanitize_callback' => 'times_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'times_eta_enable', array(
		    'settings' => 'times_eta_enable',
		    'label'    => __( 'Enable Featured Posts', 'times' ),
		    'section'  => 'times_eta_section',
		    'type'     => 'checkbox',
		)
	);
	
 
	$wp_customize->add_setting(
		'times_eta_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'times_eta_title', array(
		    'settings' => 'times_eta_title',
		    'label'    => __( 'Title','times' ),
		    'section'  => 'times_eta_section',
		    'type'     => 'text',
		)
	);
 
 	$wp_customize->add_setting(
	    'times_eta_cat',
	    array( 'sanitize_callback' => 'times_sanitize_category' )
	);
	
	$wp_customize->add_control(
	    new Times_WP_Customize_Category_Control(
	        $wp_customize,
	        'times_eta_cat',
	        array(
	            'label'    => __('Posts Category.','times'),
	            'settings' => 'times_eta_cat',
	            'section'  => 'times_eta_section'
	        )
	    )
	);	
}
add_action('customize_register', 'times_customize_eta');