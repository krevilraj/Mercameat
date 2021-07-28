<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mercameat
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="profile" href="https://gmpg.org/xfn/11"/>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- ============ Logo Cart Menu Section Open ==============  -->
<section class="TopBar">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xxl-12">
        <div class="TopBar__container fixed-top menu-logo scroll-nav">
          <div class="TopBar__Left">
            <?php if (has_custom_logo()): ?>
              <?php the_custom_logo(); ?>
            <?php else: ?>
              <p class="site-title"><?php bloginfo('title'); ?></p>
              <span><?php bloginfo('description'); ?></span>
            <?php endif; ?>
          </div>

          <div class="TopBar__right">
            <div class="TopBar__user"><a href="#"><i class="far fa-user"></i></a></div>
            <div class="TopBar__checkout cart-mini">
              <a href="#">
                <i class="bi bi-cart"></i>
                <span class="badge checkout_items" id="mini-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<!--                <span id="checkout_items" class="checkout_items">39</span>-->

              </a>
              <div class="mini-wrapper">
                <div class="widget_shopping_cart_content">

                  <?php woocommerce_mini_cart(); ?>
                </div>
              </div>
            </div>
            <div class="TopBar__search"><a href="#"><i class="bi bi-search"></i></a></div>
            <div class="TopBar__nav">
              <div class="navbar">
                <a  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-bars"></i></a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                  <div class="offcanvas-header d-flex align-items-center">
                    <a class=" text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fas fa-times"></i></a>
                    <p data-bs-dismiss="offcanvas" aria-label="Close"> Menu</p>
                  </div>
                  <div class="offcanvas-body">
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'mainmenu',
                        'container' => 'ul',
                        'container_class' => 'navbar-nav',
                        'menu_class' => 'navbar-nav',
                        'theme_location' => 'mercameat_main_menu')
                    );
                    ?>
<!--                    <ul class="navbar-nav ">-->
<!---->
<!--                      <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>-->
<!--                      <li class="nav-item"><a class="nav-link" href="page2.html">About Us</a></li>-->
<!--                      <li class="nav-item"><a class="nav-link" href="page-3.html">Services</a></li>-->
<!--                      <li class="nav-item"><a class="nav-link" href="#">Blog </a></li>-->
<!--                      <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>-->
<!--                    </ul>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ============ Logo Cart Menu Section Close ==============  -->