<?php 

function times_customize_zeta( $wp_customize ) {	
	
	$wp_customize->add_section(
	    'times_zeta_section',
	    array(
	        'title'     => __('Featured Posts','times'),
	        'priority'  => 10,
	        'panel'     => 'times_a_fcp_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'times_zeta_enable',
		array( 'sanitize_callback' => 'times_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'times_zeta_enable', array(
		    'settings' => 'times_zeta_enable',
		    'label'    => __( 'Enable Featured Posts', 'times' ),
		    'section'  => 'times_zeta_section',
		    'type'     => 'checkbox',
		)
	);
	
 
	$wp_customize->add_setting(
		'times_zeta_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'times_zeta_title', array(
		    'settings' => 'times_zeta_title',
		    'label'    => __( 'Title','times' ),
		    'section'  => 'times_zeta_section',
		    'type'     => 'text',
		)
	);
 
 	$wp_customize->add_setting(
	    'times_zeta_cat',
	    array( 'sanitize_callback' => 'times_sanitize_category' )
	);
	
	$wp_customize->add_control(
	    new Times_WP_Customize_Category_Control(
	        $wp_customize,
	        'times_zeta_cat',
	        array(
	            'label'    => __('Posts Category.','times'),
	            'settings' => 'times_zeta_cat',
	            'section'  => 'times_zeta_section'
	        )
	    )
	);
}
add_action('customize_register', 'times_customize_zeta');	