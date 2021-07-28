<?php

/*
Template Name: Contact
*/
get_header();
?>
  <div class="content-area">
    <main class="contact default-page">

      <?php
      // If there are any posts
      if (have_posts()):

        // Load posts loop
        while (have_posts()): the_post();
          ?>
          <section class="banner"
                   style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>)">
            <h1 class="text-center">
              <?php the_title(); ?>
            </h1>
          </section>
          <section>
            <div class="row no-gutters">
              <div class="col-md-6 col-12 col-sm-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12456.270042586139!2d-9.313739138047259!3d38.69329349323446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1ec92e6f7feb7f%3A0xa8b9a6598f1a5bd3!2sR.%20C%C3%A2ndido%20dos%20Reis%20220%2C%202780-203%20Oeiras!5e0!3m2!1spt-PT!2spt!4v1621527616140!5m2!1spt-PT!2spt"
                    width="100%" height="700" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>

              </div>
              <div class="col-md-6 col-12 col-sm-12 right-side">
                <h2>Contact Info</h2>
                <ul>
                  <li>
                    <p><i class="fa fa-phone"></i></p>
                    <p>+351 962 455 478</p>
                    <p>
                      +351 217 932 655</p>
                  </li>
                  <li>
                    <p><i class="fa fa-envelope"></i></p>
                    <p>info@Mercameat.pt</p>
                  </li>
                  <li>
                    <p><i class="fa fa-map-marker-alt"></i></p>
                    <p>Rua Visconde de Seabra, 12-C, 1700-370 Lisboa</p>
                    <p>
                      Mon to Fri — 10am - 7pm</p>
                    <p>
                      Sat — 10am - 1pm</p>
                  </li>
                </ul>
              </div>
            </div>
          </section>

          <section class="contact-form">

            <div class="wrapper">
              <h2>Contact Form</h2>
              <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]') ?>
            </div>


          </section>

        <?php
        endwhile;
      else:
        ?>
        <p>Nothing to display.</p>
      <?php endif; ?>

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


