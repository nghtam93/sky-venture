<?php
/**
 * Template Name: Page Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
global $dn_options;
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page__contact">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="page__contact__meta">
          <h1 class="page__contact__title"><?php _e('Liên hệ với chúng tôi','dntheme'); ?></h1>
          <ul class="page__contact__list">
            <li><a href="mailto:<?php the_field('email', 'option'); ?>">
              <div class="el__thumb">
                  <img src="<?php echo get_theme_file_uri('assets/img/email.png') ?>" alt="">
              </div>
              <span><?php the_field('email', 'option'); ?></span>
            </a></li>
            <li><a href="tel:<?php the_field('hotline', 'option'); ?>">
              <div class="el__thumb">
                  <img src="<?php echo get_theme_file_uri('assets/img/phone.png') ?>" alt="">
              </div>
              <span><?php the_field('hotline', 'option'); ?></span>
            </a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <?php the_content() ?>
      </div>
    </div>

  </div>
</div>
<?php endwhile; ?>
<?php get_footer();