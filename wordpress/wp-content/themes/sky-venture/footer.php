<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = get_field('logo_footer', 'option');
?>
  <footer class="footer">

    <div class="container">
      <div class="row">
        <div class="col-md-5 col-lg-6">
          <div class="footer__item">

            <a href="<?php echo site_url(); ?>" class="footer__logo">
              <?php echo wp_get_attachment_image( $logo_img, 'full' ); ?>
            </a>

            <div class="footer__text">
              <?php the_field('footer_content', 'option') ?>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-lg-6">
          <div class="footer__item">
            <nav class="footer__nav">
              <?php
                wp_nav_menu(
                array(
                   'theme_location'  => 'footer',
                   'container'       => 'ul',
                   'container_class' => '',
                   'menu_id'         => '',
                   'menu_class'      => 'el__menu',
                ));
              ?>
            </nav>
          </div>
        </div>
      </div>

      <div class="copyright"><?php the_field('copyright', 'option'); ?></div>
    </div>
    <div class="back-to-top">
      <img src="<?php echo get_theme_file_uri('assets/img/arrow-up.svg'); ?>" alt="">
    </div>

  </footer>

  <nav id="menu__mobile" class="nav__mobile">
      <div class="nav__mobile__content">
        <?php
            wp_nav_menu(
            array(
               'theme_location'  => 'primary',
               'container'       => 'ul',
               'container_class' => '',
               'menu_id'         => '',
               'menu_class'      => 'nav__mobile--ul',
            ));
          ?>
      </div>
  </nav>
</div> <!-- end .wrapper -->
<?php wp_footer(); ?>
</body>
</html>
