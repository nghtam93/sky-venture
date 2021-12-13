<?php
/**
 * Template Name: Page Home
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


  <section class="home-banner">
    <div class="container">
      <div class="el__meta">
        <div class="wow fadeInUp">
          <div class="el__sub"><?php the_field('header_sub') ?></div>
          <h2 class="el__title"><?php the_field('header_title') ?></h2>
        </div>
      </div>

      <div class="home-banner__icon">
        <img src="<?php echo get_theme_file_uri("/assets/img/home-banner-arrow.png"); ?>" alt="">
      </div>
    </div>
  </section>

  <?php $team_icon = get_field('team_icon'); ?>
  <section id="home-about" class="home-team">
    <div class="container">
      <header class="sc__header text-center">
        <div class="sc__header__icon wow fadeInDown">
          <?php echo wp_get_attachment_image( $team_icon, 'small' ); ?>
        </div>
        <h2 class="sc__header__title wow fadeInUp"><?php the_field('team_title') ?></h2>
      </header>
      <?php
        if( have_rows('team_items') ):?>
            <div class="row gx-md-5 gx-lgx-8 wow fadeInUp">
                <?php while( have_rows('team_items') ) : the_row(); $i++;
                  $sub_image = get_sub_field('image');
                  $sub_content = get_sub_field('content');
                  ?>
                  <div class="el__col col-md-6 col-lgx-5 d-md-flex">
                    <div class="el__item">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb -contain">
                          <?php echo wp_get_attachment_image( $sub_image, 'small' ); ?>
                        </div>
                      </div>
                      <div class="el__item__meta">
                        <div class="el__item__excerpt"><?php echo $sub_content ?></div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
            </div>

        <?php else :
          get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>

    </div>
  </section>

  <?php $mission_image = get_field('mission_image'); ?>
  <section id="home-mission" class="home-mission">
    <div class="container">
      <header class="sc__header text-center">
        <div class="sc__header__icon wow fadeInUp">
          <?php echo wp_get_attachment_image( $mission_image, 'small' ); ?>
        </div>
        <h2 class="sc__header__title wow fadeInLeft"><?php the_field('mission_title') ?></h2>
        <div class="sc__header__excerpt wow fadeInRight"><?php the_field('mission_sub') ?></div>
      </header>
      <?php
      if( have_rows('mission_items') ): $i=0; ?>
        <?php  $i=0; ?>
          <div class="el__boxs">
              <?php while( have_rows('mission_items') ) : the_row(); $i++;
                $sub_image = get_sub_field('image');

                $sub_number = get_sub_field('number');
                $sub_title = get_sub_field('title');
                $sub_content = get_sub_field('content');
                ?>
                <div class="el__item">
                  <div class="row">
                    <div class="col-md-6 col-lg-6 wow <?php echo ($i==1) ? 'fadeInLeft' : 'fadeInRight order-md-2 offset-lg-1'; ?>">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb">
                          <?php echo wp_get_attachment_image( $sub_image, 'medium' ); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-5 wow <?php echo ($i==1) ? 'offset-lg-1 fadeInRight' : 'fadeInLeft'; ?>">
                      <div class="el__item__meta">
                        <p class="el__item__number"><?php echo $sub_number ?></p>
                        <h3 class="el__item__title"><?php echo $sub_title ?></h3>
                        <div class="el__item__excerpt"><?php echo $sub_content ?></div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
          </div>

      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>
    </div>
    <div class="home-mission__icon"></div>
  </section>

<?php $value_icon = get_field('value_icon'); ?>
  <section id="home-value" class="home-value">
    <div class="container">
      <header class="sc__header text-center">
        <div class="sc__header__icon wow fadeInDown">
          <?php echo wp_get_attachment_image( $value_icon, 'small' ); ?>
        </div>
        <h2 class="sc__header__title wow fadeInUp"><?php the_field('value_title') ?></h2>
      </header>
      <?php
      if( have_rows('value_items') ):?>
          <div class="row el wow fadeInUp">
              <?php while( have_rows('value_items') ) : the_row(); $i++;
                $sub_number = get_sub_field('number');
                $sub_content = get_sub_field('content');
                ?>
                <div class="col-md-6">
                  <div class="el__item">
                    <div class="el__item__number"><?php echo $sub_number ?></div>
                    <h3 class="el__item__title"><?php echo $sub_content ?></h3>
                  </div>
                </div>
              <?php endwhile; ?>
          </div>

      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>
    </div>
    <div class="home-value__bg"></div>
  </section>

  <?php $solution_icon = get_field('solution_icon'); ?>
  <section id="home-solution" class="home-solution">
    <div class="container-fluid">
      <header class="sc__header text-center">
        <div class="sc__header__icon wow fadeInUp">
            <?php echo wp_get_attachment_image( $solution_icon, 'small' ); ?>
        </div>
        <h2 class="sc__header__title wow fadeInLeft"><?php the_field('solution_title') ?></h2>
        <div class="sc__header__excerptwow fadeInRight"><?php the_field('solution_sub') ?></div>
      </header>
      <?php
      if( have_rows('solution_items') ):?>
          <div class="el__items wow fadeInUp">
            <div class="row justify-content-center">
              <?php while( have_rows('solution_items') ) : the_row(); $i++;
                $sub_icon = get_sub_field('icon');
                $sub_title = get_sub_field('title');
                $sub_content = get_sub_field('content');
                ?>
                <div class="col-md-6 col-lg-4 d-md-flex">
                  <div class="el__item">
                    <div class="el__item__thumb">
                      <div class="dnfix__thumb -contain">
                        <?php echo wp_get_attachment_image( $sub_icon, 'small' ); ?>
                      </div>
                    </div>
                    <div class="el__item__meta">
                      <h3 class="el__item__title"><?php echo $sub_title ?></h3>
                      <div class="el__item__excerpt"><?php echo $sub_content ?></div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>

      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>
    </div>
    <div class="container wow fadeInUp">
        <div class="el__text"><?php the_field('text_content') ?></div>
    </div>
    <div class="home-solution__ic1"></div>
    <div class="home-solution__ic2"></div>
  </section>

<?php endwhile; ?>
<?php get_footer();