<?php

/**
 * Mercameat functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mercameat
 */


require_once get_template_directory() . '/inc/customizer/contact.php';
require_once get_template_directory() . '/inc/customizer/social.php';
require_once get_template_directory() . '/inc/customposttype/slider.php';

require_once get_template_directory() . '/inc/woocommerce/addtocart/addtocart.php';
require_once get_template_directory() . '/inc/woocommerce/order/newsletter.php';
//require_once get_template_directory() . '/inc/wc-widget.php';

/**
 * Enqueue scripts and styles.
 */
function mercameat_scripts()
{
  //Bootstrap owl carousel javascript and CSS files
  wp_enqueue_style('bootstrap-icon-css', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.2', 'all');
  wp_enqueue_style('fontawesome-css', "https://pro.fontawesome.com/releases/v5.10.0/css/all.css");



  // js
  wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '5.0.2', true);
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '5.0.2', true);
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true);

  // Theme's main stylesheet
  wp_enqueue_style('mercameat-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');

}

add_action('wp_enqueue_scripts', 'mercameat_scripts');

/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
add_theme_support('custom-logo', array());

/*****************Add custom logo class ****************/
add_filter('get_custom_logo', 'add_custom_logo_url');
function add_custom_logo_url()
{
  $custom_logo_id = get_theme_mod('custom_logo');
  $html = sprintf('<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
    esc_url(site_url()),
    wp_get_attachment_image($custom_logo_id, 'full', false, array(
      'class' => 'img-fluid',
    ))
  );
  return $html;
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mercameat_config()
{

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(
    array(
      'mercameat_main_menu' => 'Mercameat Main Menu',
      'mercameat_footer_menu' => 'Mercameat Footer Menu',
    )
  );

  // This theme is WooCommerce compatible, so we're adding support to WooCommerce
  add_theme_support('woocommerce', array(
    'thumbnail_image_width' => 512,
    'single_image_width' => 1024,
    'product_grid' => array(
      'default_rows' => 10,
      'min_rows' => 6,
      'max_rows' => 10,
      'default_columns' => 3,
      'min_columns' => 3,
      'max_columns' => 3,
    )
  ));
//  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');


}
function add_classes_on_li($classes, $item, $args) {
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class','add_classes_on_li',1,3);



add_action('after_setup_theme', 'mercameat_config', 0);

/**
 * If WooCommerce is active, we want to enqueue a file
 * with a couple of template overrides
 */
if (class_exists('WooCommerce')) {
//  require get_template_directory() . '/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'mercameat_woocommerce_header_add_to_cart_fragment');

function mercameat_woocommerce_header_add_to_cart_fragment($fragments)
{
  global $woocommerce;

  ob_start();

  ?>
  <span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
  <?php
  $fragments['span.items'] = ob_get_clean();
  return $fragments;
}

function mercameat_widgets()
{
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar1'
  ));
}

add_action('widgets_init', 'mercameat_widgets');

/**
 * Hide category product count in product archives
 */
add_filter('woocommerce_subcategory_count_html', '__return_false');


/*STEP 1 - REMOVE ADD TO CART BUTTON ON PRODUCT ARCHIVE (SHOP) */

function remove_loop_button()
{
  remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
}

//add_action('init', 'remove_loop_button');

/*STEP 2 -ADD NEW BUTTON THAT LINKS TO PRODUCT PAGE FOR EACH PRODUCT */
/*
add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');
function replace_add_to_cart() {
  global $product;
  $link = $product->get_permalink();
  echo do_shortcode('<a href="'.$link.'" class="button addtocartbutton"><i class="fa fa-shopping-bag"></i></a>');
}*/

add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text');
function woocommerce_custom_single_add_to_cart_text()
{
  return __('BUY NOW', 'woocommerce');
}

// To change add to cart text on product archives(Collection) page
add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text');
function woocommerce_custom_product_add_to_cart_text()
{
  return __('BUY NOW', 'woocommerce');
}




remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('woocommerce_after_main_content', 'woocommerce_output_related_products');

function new_excerpt_more($more)
{
  return '';
}

add_filter('excerpt_more', 'new_excerpt_more', 21);

function the_excerpt_more_link($excerpt)
{
  $post = get_post();
  $excerpt .= '<div class="notice-link"><a href="' . get_permalink($post->ID) . '">LER+</a></div>';
  return $excerpt;
}

add_filter('the_excerpt', 'the_excerpt_more_link', 21);
function tn_custom_excerpt_length($length)
{
  return 25;
}

add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);


function wpb_widgets_init()
{

  register_sidebar(array(
    'name' => __('Main Sidebar', 'wpb'),
    'id' => 'sidebar-1',
    'description' => __('The main sidebar appears on the right on each page except the front page template', 'wpb'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => __('Front page sidebar', 'wpb'),
    'id' => 'sidebar-2',
    'description' => __('Appears on the static front page template', 'wpb'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
}

add_action('widgets_init', 'wpb_widgets_init');


/************************** custom field for category of woocomerce ***********************/
//Product Cat creation page
function mercameat_taxonomy_add_new_meta_field()
{
  ?>

  <div class="form-field">
    <label for="term_meta[wh_meta_short_desc]"><?php _e('Short Description', 'mercameat'); ?></label>
    <textarea name="term_meta[wh_meta_short_desc]" id="term_meta[wh_meta_short_desc]"></textarea>
    <p class="description"><?php _e('Enter a Short description', 'mercameat'); ?></p>
  </div>
  <?php
}

add_action('product_cat_add_form_fields', 'mercameat_taxonomy_add_new_meta_field', 10, 2);

//Product Cat Edit page
function mercameat_taxonomy_edit_meta_field($term)
{

  //getting term ID
  $term_id = $term->term_id;

  // retrieve the existing value(s) for this meta field. This returns an array
  $term_meta = get_option("taxonomy_" . $term_id);
  ?>

  <tr class="form-field">
    <th scope="row" valign="top"><label
          for="term_meta[wh_meta_short_desc]"><?php _e('Short Description', 'mercameat'); ?></label></th>
    <td>
      <textarea name="term_meta[wh_meta_short_desc]"
                id="term_meta[wh_meta_short_desc]"><?php echo esc_attr($term_meta['wh_meta_short_desc']) ? esc_attr($term_meta['wh_meta_short_desc']) : ''; ?></textarea>
      <p class="description"><?php _e('Enter a Short description', 'mercameat'); ?></p>
    </td>
  </tr>
  <?php
}

add_action('product_cat_edit_form_fields', 'mercameat_taxonomy_edit_meta_field', 10, 2);

// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta($term_id)
{
  if (isset($_POST['term_meta'])) {
    $term_meta = get_option("taxonomy_" . $term_id);
    $cat_keys = array_keys($_POST['term_meta']);
    foreach ($cat_keys as $key) {
      if (isset($_POST['term_meta'][$key])) {
        $term_meta[$key] = $_POST['term_meta'][$key];
      }
    }
    // Save the option array.
    update_option("taxonomy_" . $term_id, $term_meta);
  }
}

add_action('edited_product_cat', 'save_taxonomy_custom_meta', 10, 2);
add_action('create_product_cat', 'save_taxonomy_custom_meta', 10, 2);


/************************custom field*******************/
// attach product category taxonomy to "service" post type
//add_action( 'init', function() {
//  register_taxonomy_for_object_type( 'product_cat', 'green-product-page' );
//}, 10, 99);

//add_action( 'init', 'add_product_cat_to_custom_post_type',11 );
//
//function add_product_cat_to_custom_post_type() {
//  register_taxonomy_for_object_type( 'product_cat', 'green-product-page' );
//}

register_taxonomy_for_object_type('product_cat', 'green-product-page');
add_filter('register_taxonomy_args', 'my_taxonomy_args', 10, 2);
function my_taxonomy_args($args, $taxonomy_name)
{

  if ('product_cat' === $taxonomy_name) {
    $args['show_in_rest'] = true;
  }

  return $args;
}

/**
 * Remove the breadcrumbs
 */
add_action('init', 'woo_remove_wc_breadcrumbs');
function woo_remove_wc_breadcrumbs()
{
  remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}

/**
 * Remove the SKU
 */
function gc_remove_product_page_skus($enabled)
{
  if (!is_admin() && is_product()) {
    return false;
  }

  return $enabled;
}

add_filter('wc_product_sku_enabled', 'gc_remove_product_page_skus');

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 1);

/**
 * Add custom tab
 */
function gc_my_simple_custom_product_tab($tabs)
{

  $tabs['my_custom_tab'] = array(
    'title' => __('MORE', 'mercameat'),
    'callback' => 'gc_my_simple_custom_tab_content',
    'priority' => 50,
  );

  return $tabs;

}

add_filter('woocommerce_product_tabs', 'gc_my_simple_custom_product_tab');

/**
 * Function that displays output for the shipping tab.
 */
function gc_my_simple_custom_tab_content($slug, $tab)
{

  ?>
  <div style="text-align:left">
    <p><?php echo get_post_meta(get_the_ID(), 'modo_de_uso', true); ?></p>
  </div>
  <?php

}


// Remove the additional information tab
function woo_remove_product_tabs($tabs)
{
  unset($tabs['reviews']);
  unset($tabs['additional_information']);
  return $tabs;
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
// Rename title woocommerce description
add_filter('woocommerce_product_description_heading', 'yikes_woo_customize_description_tab_title', 1000);

function yikes_woo_customize_description_tab_title()
{
  echo '';
}


// Rename a default WooCommerce tab
add_filter('woocommerce_product_tabs', 'yikes_rename_default_woocommerce_tabs', 98, 1);

function yikes_rename_default_woocommerce_tabs($tabs)
{

  if (isset($tabs['description'])) {
    $tabs['description']['title'] = 'NUTRITIONAL INFORMATION';
  }

  return $tabs;
}

/**
 * Change related product text
 */
function gc_add_category_name_top()
{
  global $product;

  $terms = get_the_terms($product->get_id(), 'product_cat');
  $cat_name = '';
  if (isset($terms[0]) && isset($terms[0]->name)) {
    $cat_name = $terms[0]->name;
  }
  echo '<p class="cat-title">' . $cat_name . '</p>';
}

add_action('woocommerce_shop_loop_item_title', 'gc_add_category_name_top', 9);

/**
 * Change related product text
 */
function gc_change_related_product_text($translated)
{
  $translated = str_replace('Related products', 'RELATED PRODUCTS', $translated);
  return $translated;
}

add_filter('gettext', 'gc_change_related_product_text');


//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );


remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);