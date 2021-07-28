<?php
/**
 * Template for displaying search forms in Primeform
 *
 * @package Primeform
 */
?>
<div class="collapse searchid" id="searchid">
  <div class="card card-body">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
      <div class="d-flex">
        <input type="search" class="search-field"
               placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'Mercameat'); ?>"
               value="<?php echo get_search_query(); ?>" name="s"/>
        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
        <?php
        // If WooCommerce is activated, we'll be searching among products, not posts
        if (class_exists('WooCommerce')): ?>
          <input type="hidden" value="product" name="post_type" id="post_type">
        <?php endif; ?>
      </div>
    </form>
  </div>
</div>
