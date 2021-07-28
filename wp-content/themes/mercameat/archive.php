<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>

  <div class="container notice-archive">
    <div class="archive-title">
      <h2>
        <?php single_term_title() ?>
      </h2>
    </div>

    <div class="row">

      <?php if (have_posts()) : ?>

        <?php
        // Start the Loop.
        while (have_posts()) :
          the_post(); ?>
          <div class="notice-wrapper-archive col-md-4">

            <div class="notice-item">
              <div class="notice-image">
                <?php the_post_thumbnail('thumbnail'); ?>
              </div>
              <div class="notice-info">
                <p class="notice-date"><?php echo get_the_date(); ?></p>
                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <p><?php the_excerpt()?></p>

              </div>

            </div>


          </div>


        <?php
        endwhile;
  the_posts_pagination( array(
    'mid_size'  => 2,
    'prev_text' => __( 'voltar', 'Mercameat' ),
    'next_text' => __( 'Next', 'Mercameat' ),
    'screen_reader_text' => ' ',
    'before_page_number' => '',
  ) );


      // If no content, include the "No posts found" template.
      else :
        get_template_part('template-parts/content/content', 'none');

      endif;
      ?>
    </div><!-- #main -->
  </div><!-- #primary -->



<?php
get_footer();
