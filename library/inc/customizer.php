<?php
/**
 * digistarter Theme Customizer
 *
 * @package digistarter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function digistarter_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'digistarter_customize_register' );


/**
 * Customizer Some Like it Neat Additions
 */

function neat_add_customizer_theme_options($wp_customize) {
	// Add Footer Section and Settings
	$wp_customize->add_section(
		'neat_footer_section_settings',
		array(
			'title'     => 'Footer Settings',
			'priority'  => 200
		)
	);
	$wp_customize->add_setting(
		'neat_footer_left',
		array(
			'default'            => '&copy; All Rights Reserved'
		)
	);
	$wp_customize->add_control(
		'neat_footer_left',
		array(
			'section'  => 'neat_footer_section_settings',
			'label'    => 'Left Footer',
			'type'     => 'text'
		)
	);

	$wp_customize->add_setting(
		'neat_footer_right',
		array(
			'default'            => 'Footer Content Right'
		)
	);
	$wp_customize->add_control(
		'neat_footer_right',
		array(
			'section'  => 'neat_footer_section_settings',
			'label'    => 'Right Footer',
			'type'     => 'text'
		)
	);
}
add_action( 'customize_register', 'neat_add_customizer_theme_options' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function digistarter_customize_preview_js() {
	wp_enqueue_script( 'digistarter_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'digistarter_customize_preview_js' );
