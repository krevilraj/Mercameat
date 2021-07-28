<?php

/*
Template Name: About
*/
get_header();
?>
  <div class="content-area">
    <main class="about default-page">

      <?php
      // If there are any posts
      if (have_posts()):

        // Load posts loop
        while (have_posts()): the_post();
          ?>
          <div class="wrapper">
            <section class="banner row no-gutter">
              <div class="col-md-5">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="img-fluid"
                     alt="">
              </div>
              <div class="col-md-7 right-side">
                <div class="right-wrapper">
                  <h1>
                    <?php the_title(); ?>
                  </h1>
                  <p><?php the_content() ?></p>
                </div>
              </div>

            </section>
            <div class="container client">
              <section class="client-info section-item">
                <div class="">
                  <span id="c_info1"></span>
                  <div class="client-wrapper">
                    <div class="client-img pb-2 pt-2">

                      <img src="<?php echo get_theme_mod('info1'); ?>" class="img-fluid"/>
                    </div>
                    <div class="client-img pb-2 pt-2">
                      <img src="<?php echo get_theme_mod('info2'); ?>" class="img-fluid"/>
                    </div>
                    <div class="client-img pb-2 pt-2">
                      <img src="<?php echo get_theme_mod('info3'); ?>" class="img-fluid"/>
                    </div>
                    <div class="client-img pb-2 pt-2">
                      <img src="<?php echo get_theme_mod('info4'); ?>" class="img-fluid"/>
                    </div>


                  </div>
                </div>
              </section>

            </div>
          </div>


          <section class="about-description">
            <div class="row">
              <div class="col-md-7 left-side">
                <h2>A SUA PROTEÇÃO É O NOSSO COMPROMISSO</h2>
                <p>Produzimos o Safe Q, um desinfectante antimicrobiano
                  multiusos de superfícies, que cumpre todas as normas da
                  DGS e que está em conformidade com os mais altos padrões de qualidade internacionais. A nossa empresa
                  quer aﬁrmar-se </p>
                <p>como líder no mercado de desinfeção e higienização,
                  promovendo igualmente e activamente práticas responsáveis
                  de proteção entre a população em geral. Sabemos e temos
                  consciência que a sua proteção é a base de tudo e por isso
                  estamos ao seu dispor para todas as necessidades que tenha,
                  quer seja a nível particular ou empresarial.
                  A SU</p>
              </div>
              <div class="col-md-5 my-auto">
                <img src="<?php bloginfo('template_url'); ?>/inc/images/notices/a2.png" class="img-fluid" alt="">
              </div>
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