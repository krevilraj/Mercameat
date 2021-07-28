<?php

/*
Template Name: Home Page
*/

get_header(); ?>
  <!-- ============ Hero Slider Section Open ==============  -->
  <section class="hero__slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

      <?php $loop = new WP_Query(array('post_type' => 'slider', 'posts_per_page' => -1));
      $i = 0; ?>
      <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption ">
              <h1><?php the_title(); ?></h1>
              <div class="hero__btn"><a href="<?php echo get_field('link') ?>">Shop now</a></div>
            </div>
          </div>
        </div>

        <?php $i++; endwhile;
      wp_reset_query(); ?>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <!-- ============ Hero Slider Section Close  ==============  -->

  <!-- ============ PRODUCTS Section Close  ==============  -->
  <section class="product">
    <div class="container-fluid">
      <div class="product__heading">
        <h2>PRODUCTS</h2>
      </div>
      <div id="product__tab">
        <a href="javascript:void(0);" class="product__tab__name" data-category="all"
           onClick="filterSelection('all')"> All </a>

        <?php $slug = array('beef', 'chicken', 'pork') ?>
        <?php
        $i = 0;
        foreach ($slug as $cat_slug) {
          $catObj = get_term_by('slug', $cat_slug, 'product_cat');
          $catName = $catObj->name;
          ?>
          <a href="javascript:void(0);" class="product__tab__name <?php if ($i == 0) echo 'active'; ?>" data-category="<?php echo $cat_slug; ?>"
             > <?php echo $catName; ?></a>
          <?php
          $i++;
        }
        ?>

      </div>
      <div class="row product__item__wrapper">
        <?php
        $x = 0;
        foreach ($slug as $cat_slug) {

          $catObj = get_term_by('slug', $cat_slug, 'product_cat');
          $catName = $catObj->name;
          $args = array('post_type' => 'product', 'stock' => 1, 'posts_per_page' => 4, 'product_cat' => $cat_slug, 'orderby' => 'date', 'order' => 'ASC');
          $loop = new WP_Query($args);
          while ($loop->have_posts()) : $loop->the_post();
            global $product;
            ?>
            <div class="col-md-3 col-6 <?php echo $cat_slug; if($x==0) echo ' active'; ?>">
              <div class="product__item">
                <a href="<?php echo the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title() ?>"
                     class="img-fluid"></a>
                <p><?php echo $catName; ?></p>
                <h3><a href="<?php echo the_permalink(); ?>"><?php the_title() ?></a></h3>
                <h4><?php echo $product->get_price_html(); ?></h4>
                <a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button product__btn" data-product_id="<?php echo get_the_ID(); ?>" aria-label="Add “<?php the_title_attribute() ?>” to your cart">ADICIONAR</a>
<!--                <a href="#" class="product__btn">buy now</a>-->
              </div>
            </div>
          <?php endwhile;
          wp_reset_query();
          $x++;
        }
        ?>

      </div>

    </div>
  </section>
  <!-- ============ PRODUCTS Section Close  ==============  -->

  <!-- ============ HOW IT WORKS? Section Close  ==============  -->
  <section class="howWork">
    <div class="product__heading">
      <h2>HOW IT WORKS?</h2>
    </div>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="cunsumer-tab" data-toggle="pill" href="#pills-consumer" role="tab"
           aria-controls="pills-home" aria-selected="true">CONSUMER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="supplier-tab" data-toggle="pill" href="#pills-supplier" role="tab"
           aria-controls="pills-profile" aria-selected="false">SUPPLIER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="transporter-tab" data-toggle="pill" href="#pills-transporter" role="tab"
           aria-controls="pills-contact" aria-selected="false">TRANSPORTER</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-consumer" role="tabpanel" aria-labelledby="cunsumer-tab">
        <div class="container-fluid">
          <div class="row work__list__main">
            <?php if (have_rows('consumer_blocks')): ?>
              <?php while (have_rows('consumer_blocks')) : the_row();
                $sub_value = get_sub_field('icon'); ?>
                <div class="col-md-3">
                  <div class="work__process">
                    <div class="work__icon"><img src="<?php echo $sub_value; ?>" alt=""></div>
                    <h5><?php echo get_sub_field('title'); ?></h5>
                    <p><?php echo get_sub_field('subtitle'); ?></p>
                  </div>
                </div>

              <?php endwhile; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-supplier" role="tabpanel" aria-labelledby="supplier-tab">
        <div class="container-fluid">
          <div class="row work__list__main">
            <?php if (have_rows('supplier_blocks')): ?>
              <?php while (have_rows('supplier_blocks')) : the_row(); ?>
                <div class="col-md-3">
                  <div class="work__process">
                    <div class="work__icon"><img src="<?php echo get_sub_field('icon'); ?>" alt=""></div>
                    <h5><?php echo get_sub_field('title'); ?></h5>
                    <p><?php echo get_sub_field('subtitle'); ?></p>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-transporter" role="tabpanel" aria-labelledby="transporter-tab">
        <div class="container-fluid">
          <div class="row work__list__main">
            <?php if (have_rows('transporter_blocks')): ?>
              <?php while (have_rows('transporter_blocks')) : the_row(); ?>
                <div class="col-md-3">
                  <div class="work__process">
                    <div class="work__icon"><img src="<?php echo get_sub_field('icon'); ?>" alt=""></div>
                    <h5><?php echo get_sub_field('title'); ?></h5>
                    <p><?php echo get_sub_field('subtitle'); ?></p>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ============ HOW IT WORKS?  Section Close  ==============  -->

  <!-- ============ Footer two images member Section Open  ==============  -->
  <section class="member__section">
    <div class="container-fluid">
      <div class="row g-0">
        <div class="col-md-6"
             style="background: url(<?php the_field('left_side_background_image'); ?>); background-position: center; background-size: cover; ">
          <div class="become__supplier">
            <div class="member__dec">
              <h2><?php the_field('left_side_title') ?></h2>
              <a href="<?php the_field('left_side_link') ?>" class="member__btn">KNOW MORE</a>
            </div>
          </div>
        </div>
        <div class="col-md-6"
             style="background: url(<?php the_field('right_side_background_image'); ?>);  background-position: center; background-size: cover; ">
          <div class="become__transporter">
            <div class="member__dec">
              <h2>
                <?php the_field('right_side_title') ?>
              </h2>
              <a href="<?php the_field('right_side_link') ?>" class="member__btn">KNOW MORE</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ Footer two images member Section Close  ==============  -->

  <!-- ============ NEWSLETTER Section Open   ==============  -->
  <section class="newsletter">
    <div class="container">
      <div class="product__heading">
        <h2>NEWSLETTER</h2>
        <h4>SUBSCRIBE TO RECEIVE THE LATEST NEWS</h4>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <!--          <div class="content">-->
          <!--            <div class="input-group">-->
          <!--              <input type="email" class="form-control" value="Email Address"/>-->
          <!--              <span class="input-group-btn">-->
          <!--                <button class="btn" type="submit">SIGN UP</button>-->
          <!--               </span>-->
          <!--            </div>-->
          <!--          </div>-->
          <!---->
          <!--          <div class="form-check">-->
          <!--            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">-->
          <!--            <label class="form-check-label" for="flexCheckDefault">-->
          <!--              The user consents to the use of the data. More information: <a href="#">Privacy Policy.</a>-->
          <!--            </label>-->
          <!--          </div>-->
          <?php echo do_shortcode('[contact-form-7 id="5" title="Newsletter"]'); ?>
        </div>
      </div>

    </div>
  </section>

  <!-- ============ NEWSLETTER Section Close  ==============  -->


<?php get_footer(); ?>