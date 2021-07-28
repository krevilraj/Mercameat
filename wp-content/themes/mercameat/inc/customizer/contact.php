<?php
/******************* Contact **********************/

function dc_footer_sec_register( $wp_customize ) {
  $textdomain = "mercameat";
// Create our sections

  $wp_customize->add_section( 'dc_footer_section' , array(
    'title'             => __('Footer', $textdomain),
    'description'       => __('Customize footer section', $textdomain),
  ) );

// Create our settings

  $wp_customize->add_setting( 'dc_phone' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'dc_phone_control', array(
    'label'      => __('Phone', $textdomain),
    'section'    => 'dc_footer_section',
    'settings'   => 'dc_phone',
    'type'       => 'text',
  ) );
  $wp_customize->selective_refresh->add_partial('dc_phone', array(
    'selector' => 'span#c_phone',
  ));

  $wp_customize->add_setting( 'dc_address' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'dc_address_control', array(
    'label'      => __('Address', $textdomain),
    'section'    => 'dc_footer_section',
    'settings'   => 'dc_address',
    'type'       => 'textarea',
  ) );
  $wp_customize->selective_refresh->add_partial('dc_address', array(
    'selector' => 'span#c_address',
  ));

  $wp_customize->add_setting( 'dc_email' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'dc_email_control', array(
    'label'      => __('Email', $textdomain),
    'section'    => 'dc_footer_section',
    'settings'   => 'dc_email',
    'type'       => 'text',
  ) );
  $wp_customize->selective_refresh->add_partial('dc_email', array(
    'selector' => 'span#c_email',
  ));

  $wp_customize->add_setting( 'dc_footer_text' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'dc_footer_text_control', array(
    'label'      => __('Footer Text', $textdomain),
    'section'    => 'dc_footer_section',
    'settings'   => 'dc_footer_text',
    'type'       => 'textarea',
  ) );
  $wp_customize->selective_refresh->add_partial('dc_footer_text', array(
    'selector' => 'span#c_footer_text',
  ));
}
add_action( 'customize_register', 'dc_footer_sec_register' );