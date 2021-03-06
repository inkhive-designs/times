<?php
	function times_customizer_register_layouts( $wp_customize ) {
	// Layout and Design
	$wp_customize->add_panel( 'times_design_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Design & Layout','times'),
	) );
	
	$wp_customize->add_section(
	    'times_design_options',
	    array(
	        'title'     => __('Blog Layout','times'),
	        'priority'  => 0,
	        'panel'     => 'times_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'times_blog_layout',
		array( 'sanitize_callback' => 'times_sanitize_blog_layout' )
	);
	
	function times_sanitize_blog_layout( $input ) {
		if ( in_array($input, array('grid','grid_2_column','times','times_3_column') ) )
			return $input;
		else 
			return '';	
	}
	
	$wp_customize->add_control(
		'times_blog_layout',array(
				'label' => __('Select Layout','times'),
				'description' => __('Use 3 Column Layouts, only after disabling sidebar for the page.','times'),
				'settings' => 'times_blog_layout',
				'section'  => 'times_design_options',
				'type' => 'select',
				'choices' => array(
						'grid' => __('Standard Blog Layout','times'),
						'times' => __('Times Theme Layout','times'),
						'times_3_column' => __('Times Theme Layout (3 Columns)','times'),
						'grid_2_column' => __('Grid - 2 Column','times'),
					)
			)
	);
	
	$wp_customize->add_section(
	    'times_sidebar_options',
	    array(
	        'title'     => __('Sidebar Layout','times'),
	        'priority'  => 0,
	        'panel'     => 'times_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'times_disable_sidebar',
		array( 'sanitize_callback' => 'times_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'times_disable_sidebar', array(
		    'settings' => 'times_disable_sidebar',
		    'label'    => __( 'Disable Sidebar Everywhere.','times' ),
		    'section'  => 'times_sidebar_options',
		    'type'     => 'checkbox',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'times_disable_sidebar_home',
		array( 'sanitize_callback' => 'times_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'times_disable_sidebar_home', array(
		    'settings' => 'times_disable_sidebar_home',
		    'label'    => __( 'Disable Sidebar on Home/Blog.','times' ),
		    'section'  => 'times_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'times_show_sidebar_options',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'times_disable_sidebar_front',
		array( 'sanitize_callback' => 'times_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'times_disable_sidebar_front', array(
		    'settings' => 'times_disable_sidebar_front',
		    'label'    => __( 'Disable Sidebar on Front Page.','times' ),
		    'section'  => 'times_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'times_show_sidebar_options',
		    'default'  => false
		)
	);
	
	
	$wp_customize->add_setting(
		'times_sidebar_width',
		array(
			'default' => 4,
		    'sanitize_callback' => 'times_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'times_sidebar_width', array(
		    'settings' => 'times_sidebar_width',
		    'label'    => __( 'Sidebar Width','times' ),
		    'description' => __('Min: 25%, Default: 33%, Max: 40%','times'),
		    'section'  => 'times_sidebar_options',
		    'type'     => 'range',
		    'active_callback' => 'times_show_sidebar_options',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 5,
		        'step'  => 1,
		        'class' => 'sidebar-width-range',
		        'style' => 'color: #0a0',
		    ),
		)
	);
	
	/* Active Callback Function */
	function times_show_sidebar_options($control) {
	   
	    $option = $control->manager->get_setting('times_disable_sidebar');
	    return $option->value() == false ;
	    
	}
	
	function times_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	$wp_customize-> add_section(
    'times_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','times'),
    	'description'	=> __('Enter your Own Copyright Text.','times'),
    	'priority'		=> 11,
    	'panel'			=> 'times_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'times_footer_text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'times_footer_text',
	        array(
	            'section' => 'times_custom_footer',
	            'settings' => 'times_footer_text',
	            'type' => 'text'
	        )
	);	
	
}
add_action('customize_register', 'times_customizer_register_layouts');
 