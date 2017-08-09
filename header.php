<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package times
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<?php get_template_part('modules/header/jumbosearch'); ?>
	
	<header id="masthead" class="site-header" role="banner">	
		<div class="container masthead-container">
			<?php get_template_part('modules/header/masthead-inner'); ?>
		</div>	
		
		<div id="mobile-search">
			<?php get_search_form(); ?>
		</div>
		
	</header><!-- #masthead -->
	
		
	<div class="mega-container">
		<?php if (is_front_page() && has_header_image() ) : ?>
			<img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
		<?php endif; ?>	
		<?php if( class_exists('rt_slider') ) {
		 rt_slider::render('slider', 'swiper' ); 
	} ?>	
			
		<div id="content" class="site-content container">