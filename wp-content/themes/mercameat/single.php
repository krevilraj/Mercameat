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
 * @package Primeform
 */

get_header();
?>
  <div class="content-area">
    <main class=" single-post-page">


      <div class="container">
        <div class="row">
          <?php
          // If there are any posts
          if (have_posts()):

            // Load posts loop
            while (have_posts()): the_post();
              ?>
              <article class="post-detail col-md-8 col-sm-12 col-12">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                <h1><?php the_title(); ?></h1>
                <div><?php the_content(); ?></div>
              </article>
            <?php
            endwhile;
          else:
            ?>
            <p>Nothing to display.</p>
          <?php endif; ?>
          <section class="sidebar col-md-4">
            <div class="recents-post">
              <?php
              $paged = (get_query_var('page')) ? get_query_var('page') : 1;
              $args = array('post_type' => 'post', 'no_of_posts' => 6, 'posts_per_page' => 6, 'paged' => $paged);
              $wp_query = new WP_Query($args);
              while (have_posts()) : the_post(); ?>
                <div class="recent-parent">
                  <div class="recent-post-wrapper">

                    <div class="image-wrapper">
                      <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?>
                      <h6 ><?php the_title() ?></h6>
                    </div>


                  </div>
                </div>

              <?php endwhile; ?>
            </div>
          </section>
        </div>
      </div>


    </main>
  </div>
<?php
if (is_checkout()) {
  ?>
  <style>
      .woocommerce {
          padding: 60px 0;
      }
  </style>
<?php }
?>
<?php get_footer(); ?>