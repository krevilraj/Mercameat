<?php

function dc_customize_social($wp_customize)
{

// No panels added!

// Create our sections

  $wp_customize->add_section('dc_social', array(
    'title' => __('Social', 'dc_'),
    'description' => __('Social Links', 'dc_'),
  ));

// Create our settings
//  $wp_customize->add_setting('dc_linkedin', array(
//    'type' => 'theme_mod',
//    'transport' => 'refresh',
//  ));
//  $wp_customize->add_control('dc_linkedin_control', array(
//    'label' => __('Linkedin Link', 'dc_'),
//    'section' => 'dc_social',
//    'settings' => 'dc_linkedin',
//    'type' => 'url',
//  ));
//  $wp_customize->selective_refresh->add_partial('dc_linkedin', array(
//    'selector' => 'span#c_linkedin',
//  ));

  $wp_customize->add_setting('dc_fb', array(
    'type' => 'theme_mod',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('dc_fb_control', array(
    'label' => __('Facebook Link', 'dc_'),
    'section' => 'dc_social',
    'settings' => 'dc_fb',
    'type' => 'url',
  ));
  $wp_customize->selective_refresh->add_partial('dc_fb', array(
    'selector' => 'span#c_fb',
  ));

//  $wp_customize->add_setting('dc_youtube', array(
//    'type' => 'theme_mod',
//    'transport' => 'refresh',
//  ));
//  $wp_customize->add_control('dc_youtube_control', array(
//    'label' => __('Youtube Link', 'dc_'),
//    'section' => 'dc_social',
//    'settings' => 'dc_youtube',
//    'type' => 'url',
//  ));
//  $wp_customize->selective_refresh->add_partial('dc_youtube', array(
//    'selector' => 'span#c_youtube',
//  ));
  $wp_customize->add_setting('dc_instagram', array(
    'type' => 'theme_mod',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('dc_instagram_control', array(
    'label' => __('Instagram Link', 'dc_'),
    'section' => 'dc_social',
    'settings' => 'dc_instagram',
    'type' => 'url',
  ));
  $wp_customize->selective_refresh->add_partial('dc_instagram', array(
    'selector' => 'span#c_instagram',
  ));
}

add_action('customize_register', 'dc_customize_social');