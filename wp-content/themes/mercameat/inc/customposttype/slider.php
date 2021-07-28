<?php
function cptui_register_my_cpts_slider() {

  /**
   * Post Type: Sliders.
   */

  $labels = [
    "name" => __( "Sliders", "custom-post-type-ui" ),
    "singular_name" => __( "Slider", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Sliders", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "slider", "with_front" => true ],
    "query_var" => true,
    "menu_icon" => "dashicons-format-gallery",
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "slider", $args );
}

add_action( 'init', 'cptui_register_my_cpts_slider' );

/**
 * Custom Post type.
 */

if( function_exists('acf_add_local_field_group') ):
  $fields[0] =

  acf_add_local_field_group(array(
    'key' => 'group_609e2a4575289',
    'title' => 'Slider',
    'fields' => array(
      array(
        'key' => 'field_609e2a54d4f34',
        'label' => 'Link',
        'name' => 'link',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
//      array(
//        'key' => 'field_609e2a76d4f35',
//        'label' => 'Subtitle',
//        'name' => 'subtitle',
//        'type' => 'text',
//        'instructions' => '',
//        'required' => 0,
//        'conditional_logic' => 0,
//        'wrapper' => array(
//          'width' => '',
//          'class' => '',
//          'id' => '',
//        ),
//        'default_value' => '',
//        'placeholder' => '',
//        'prepend' => '',
//        'append' => '',
//        'maxlength' => '',
//      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'slider',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));

endif;
/*
<?php $loop = new WP_Query(array('post_type' => 'slider','posts_per_page' => -1)); ?>
  <?php while ($loop->have_posts()) : $loop->the_post(); ?>

<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
<?php echo get_field('link') ?>

<?php endwhile; wp_reset_query(); ?>
*/