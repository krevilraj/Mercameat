<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>
<?php if (have_posts()) : ?>

  <?php
  // Start the Loop.
  while (have_posts()) :
    the_post(); ?>
    <div class="page-wrapper">
      <div class="page-title">
        <div class="icon-wrapper">
          <img src="<?php echo get_template_directory_uri() ?>/inc/images/sun.png" alt="">

        </div>
        <h1><?php the_title() ?></h1>

        <?php the_content() ?>
      </div>
      <div class="img-wrapper">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
             class="img-fluid wp-post-image" alt="<?php the_title() ?>"
             loading="lazy"/>
      </div>
    </div>
    <div class="clearfix"></div>
  <?php endwhile;
  wp_reset_query(); endif; ?>


  <div class="container detail-page">

    <div class="row">


      <?php
      $terms = get_the_terms(get_the_ID(), 'product_cat');
      foreach ($terms as $term) {
        $cat_slug = $term->slug;
        ?>
        <h2>Produtos <?php echo $term->name; ?></h2>

        <?php

        $catObj = get_term_by('slug', $cat_slug, 'product_cat');
        $catName = $catObj->name;
        $args = array('post_type' => 'product', 'stock' => 1, 'posts_per_page' => 4, 'product_cat' => $cat_slug, 'orderby' => 'date', 'order' => 'ASC');
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
          global $product;
          ?>
          <div class="cat-item slide <?php echo $cat_slug; ?> col-sm-6 col-6 col-md-3 mt-2 mb-2">
            <div class="cat-image">
              <a href="<?php echo the_permalink(); ?>">
              <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>"
                   class="img-fluid wp-post-image" alt="<?php the_title() ?>"
                   loading="lazy"/>
              </a>

            </div>
            <div class="product-info">
              <p class="cat-title"><?php echo $catName; ?></p>
              <h3><a href="<?php echo the_permalink(); ?>"><?php the_title() ?></a></h3>
              <p><?php echo $product->get_price_html(); ?></p>
              <a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>" aria-label="Add “<?php the_title_attribute() ?>” to your cart">ADICIONAR</a>
            </div>
          </div>

        <?php endwhile;
        wp_reset_query();
      }
      echo get_post_meta('product_cat');


      ?>


    </div><!-- #main -->
  </div><!-- #primary -->


<?php
get_footer();
