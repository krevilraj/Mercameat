<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mercameat
 */

get_header();
?>
  <div class="content-area">
    <main class=" default-page">

      <?php
      // If there are any posts
      if (have_posts()):

        // Load posts loop
        while (have_posts()): the_post();
          ?>
          <?php
          if (!is_page('cart') && !is_cart() && !is_checkout()) {
            ?>
            <h1>
              <div class="sec-1"></div>
              <div class="sec-2"></div> <?php the_title(); ?></h1>
          <?php } ?>
          <div class="container">
            <div class="row">
              <article class="col">

                <div><?php the_content(); ?></div>
              </article>
            </div>
          </div>
        <?php
        endwhile;
      else:
        ?>
        <p>Nothing to display.</p>
      <?php endif; ?>

    </main>
  </div>
<?php
if(is_checkout()){?>
  <style>
    .woocommerce{
        padding:60px 0;
    }
  </style>
<?php }
?>
<?php get_footer(); ?>