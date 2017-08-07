<?php

function times_customize_register_misc( $wp_customize ) {
		//help and support section
	$wp_customize->add_section(
	    'times_sec_h',
	    array(
	        'title'     => __('-> Times Help & Support!!','times'),
	        'priority'  => 10,
	    )
	);
	
	$wp_customize->add_setting(
			'times_h',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new Times_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'times_h',
	        array(
	            'label' => __('Free Help & Support','times'),
	            'description' => __('<a href="https://inkhive.com/contact-us/" target="_blank">Contact Us</a> and help us make Times a better theme with Feature Requests, Bug Reports or for any other help you need. <br /> <br />. We Generally Respond to Free theme support emails in 24 to 48 hours. <br/> <br/> We would Recommend to <a href="https://inkhive.com/product/times/" target="_blank">Read the FAQs</a> as well.','times'),
	            'section' => 'times_sec_h',
	            'settings' => 'times_h',			       
	        )
		)
	);
	
	//Upgrade to Pro
	$wp_customize->add_section(
	    'times_sec_pro',
	    array(
	        'title'     => __('-> Upgrade to Times Pro Version','times'),
	        'priority'  => 10,
	    )
	);
	
	$wp_customize->add_setting(
			'times_pro',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new Times_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'times_pro',
	        array(
	            'label' => __('Unlock More Features','times'),
	            'description' => __('
	            			Times Plus comes with so many features that you will fall in love with the theme. We have added everything everyone requested for and so much more. Here is a small list of what Times Plus includes<br/><br/>
	            			<ul>
	            			<li> - Improved Mobile Friendliness</li>
	            			<li> - Custom Header Images for Posts & Pages</li>
	            			<li> - Advanced Slider</li>
	            			<li> - More Featured Areas</li>
	            			<li> - <strong>Unlimited Colors & Skins</strong></li>
	            			<li> - Improved SEO Friendliness</li>
							<li> - Custom Options for Pages</li>
							<li> - Multiple Blog Layouts</li>
							<li> - 30+ Social Icons</li>
							<li> - 650+ Google Fonts</li>
							<li> - and much more</li></ul><br/>
	            			To know more or to purchase, visit <a href="https://inkhive.com/product/times-plus/">Times Plus.</a> 
							','times'),
	            'section' => 'times_sec_pro',
	            'settings' => 'times_pro',			       
	        )
		)
	);
}
add_action('customize_register', 'times_customize_register_misc');