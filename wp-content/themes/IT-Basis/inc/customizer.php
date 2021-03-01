<?php
/**
 * DevIT-Basis Theme Customizer
 *
 * @package DevIT-Basis
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function devit_basis_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'devit_basis_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'devit_basis_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'devit_basis_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function devit_basis_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function devit_basis_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function devit_basis_customize_preview_js() {
	wp_enqueue_script( 'devit-basis-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'devit_basis_customize_preview_js' );

function devit_basis_customize_social_networks( $wp_customize ) {

    $wp_customize->add_section( 'social_networks' , array(
        'title'      => __( 'Social networks', 'devit-basis' ),
        'priority'   => 30,
    ) );
    $wp_customize->add_setting( 'get_social_networks' , array(
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'logo',
        array(
            'label'      => __( 'Выбирите Логотип', 'devit-basis' ),
            'section'    => 'social_networks',
            'settings'   => 'get_social_networks',
            'width' => '40',
            'height' => '42',
        )
    ) );
}
add_action( 'customize_register', 'devit_basis_customize_social_networks' );