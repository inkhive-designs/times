<?php
	function times_customize_register_social( $wp_customize ) {
		// Social Icons
	$wp_customize->add_section('times_social_section', array(
			'title' => __('Social Icons','times'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','times'),
					'facebook' => __('Facebook','times'),
					'twitter' => __('Twitter','times'),
					'google-plus' => __('Google Plus','times'),
					'instagram' => __('Instagram','times'),
					'rss' => __('RSS Feeds','times'),
					'vine' => __('Vine','times'),
					'vimeo-square' => __('Vimeo','times'),
					'youtube' => __('Youtube','times'),
					'flickr' => __('Flickr','times'),
					'pinterest-p'	=> __('Pinterest', 'times'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 4) ; $x++) :
			
		$wp_customize->add_setting(
			'times_social_'.$x, array(
				'sanitize_callback' => 'times_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'times_social_'.$x, array(
					'settings' => 'times_social_'.$x,
					'label' => __('Icon ','times').$x,
					'section' => 'times_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'times_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'times_social_url'.$x, array(
					'settings' => 'times_social_url'.$x,
					'description' => __('Icon ','times').$x.__(' Url','times'),
					'section' => 'times_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function times_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr',
					'pinterest-p'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}	
}
add_action('customize_register', 'times_customize_register_social');