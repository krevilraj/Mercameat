<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #page div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mercameat
 */

?>
<!-- ============ footer  Section Close  ==============  -->

<section class="footer__main">
  <div class="footer__section">
    <div class="container">
      <div class="footer__nav">
        <ul class="nav__footer">
          <li><a href="page2.html">SHOP</a></li>
          <li><a href="#">ABOUT US</a></li>
          <li><a href="#">BECOME TRANSPORTER</a></li>
          <li><a href="#">BECOME SUPPLIER</a></li>
          <li><a href="#">CONTACT</a></li>
        </ul>
        <div class="contact_info">
          <p> <?php echo get_theme_mod('dc_phone')?> </p>
          <p><?php echo get_theme_mod('dc_address')?></p>
          <p> <?php echo get_theme_mod('dc_email')?> </p>
        </div>
        <div class="social__media">
          <ul>
            <?php
            $facebook_link = get_theme_mod('dc_fb');
            $instagram_link = get_theme_mod('dc_instagram');
            ?>
            <?php if ($facebook_link): ?>
              <li><span id="c_fb"></span><a href="<?php echo $facebook_link; ?>>"><i class="fab fa-facebook-f"></i></a></li>
            <?php endif; ?>
            <?php if ($instagram_link): ?>
              <li><span id="c_instagram"></span><a href="<?php echo $instagram_link; ?>"><i
                      class="fab fa-instagram"></i></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="btm__footer text-center p-3"><p><?php echo get_theme_mod('dc_footer_text') ?></p></div>
</section>
<!-- ============ footer  Section Close  ==============  -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<?php wp_footer(); ?>


<script>
  $(document).ready(function () {
    var value = $('.quantity>.qty').val();
    $('#qty-minus').click(function () {
      if (value == 0) return;
      value--;
      $('.quantity>.qty').val(value);
    });

    $('#qty-plus').click(function () {
      value++;
      $('.quantity>.qty').val(value);
    });


  })
</script>


</body>

</html>