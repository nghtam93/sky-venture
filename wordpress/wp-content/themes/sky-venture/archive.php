<?php
/**
 * The template for displaying archive pages
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

get_header();
$term = get_queried_object();
$term_id = $term->term_id;
?>
<section class="page__header <?php echo ($term->parent == 0) ? '-parent' : '' ?>">
  <div class="container">
      <?php the_archive_title();?>

      <?php if($term->parent == 0): ?>
        <div class="news__slider">
          <?php
          $args = array(
              'post_type' => 'post',
              'posts_per_page' =>5,
          );
          $the_query = new WP_Query( $args );
          if ( $the_query->have_posts() ) : ?>

              <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                $categories = get_the_category(get_the_ID());
                ?>
                <div class="item__wrap">
                  <div class="news__slider__item -s1 ef--zoomin">
                    <a href="<?php the_permalink(); ?>" class="news__slider__wrap">
                      <div class="row gx-0 align-items-center">
                        <div class="col-md-6 order-md-2">
                          <div class="news__slider__thumb dnfix__thumb">
                            <?php the_post_thumbnail('medium',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="news__slider__meta">
                            <div class="news__slider__tax"><?php echo $categories[0]->name; ?></div>
                            <h3 class="news__slider__title text__truncate -n3"><?php the_title() ?></h3>
                            <div class="news__slider__excerpt text__truncate -n2"><?php dn_excerpt(250); ?></div>
                            <div class="news__slider__by"><?php echo get_the_author(); ?> - <span class="news__slider__date"><?php echo get_the_time("d/m/Y"); ?></span></div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
                <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else :
              get_template_part( 'template-parts/content', 'none' );
          endif; ?>
        </div>
      <?php endif; ?>
  </div>
</section>

<?php if($term->parent == 0): ?>

<section class="news__featured">
  <div class="container">
    <h2 class="archive__content__title"><?php _e('Nổi bật','dntheme'); ?></h2>
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' =>3,
        'meta_key' => '_jsFeaturedPost',
        "meta_value" => 'yes'
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) : ?>
      <div class="row">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
          $categories = get_the_category(get_the_ID());
          ?>
          <div class="col-md-4 ef--zoomin">
            <div class="el__item">
              <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                <div class="el__item__thumb">
                  <div class="dnfix__thumb">
                    <?php the_post_thumbnail('medium',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                  </div>

                </div>
                <div class="el__item__meta">
                  <div class="el__item__tax -s1"><?php echo $categories[0]->name; ?></div>
                  <h3 class="el__item__title text__truncate -n2"><?php the_title() ?></h3>
                  <div class="el__item__by"><?php echo get_the_author(); ?> - <span class="el__item__date"><?php echo get_the_time("d/m/Y"); ?></span></div>
                </div>
              </a>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      <?php wp_reset_postdata(); ?>
    <?php else :
        get_template_part( 'template-parts/content', 'none' );
    endif; ?>
  </div>
</section>


<section>
  <div class="container">
    <h2 class="archive__content__title"><?php _e('Danh mục','dntheme'); ?></h2>

    <ul class="cat__list row">
    <?php
      $categories=get_categories(
          array(
            'parent' => $term_id,
            'hide_empty'      => false
        )
      );
      foreach ($categories as $category) {
        $cat_image = get_field('icon',$category);
        ?>
        <li class="col-sm-6 col-md-6 col-lg-3">
          <a href="<?php echo get_category_link($category) ?>">
            <div class="cat__list__thumb">
              <?php echo wp_get_attachment_image( $cat_image, 'small' ); ?>
            </div>
            <h3 class="cat__list__title"><?php echo $category->name; ?></h3>
          </a>
        </li>
        <?php
      }
    ?>
    </ul>
  </div>
</section>


<div class="archive__content">
  <div class="container js-loadmore__wrap">

    <h2 class="archive__content__title"><?php _e('Tất cả bài viết','dntheme'); ?></h2>
    <?php
    if ( have_posts() ) :
        echo '<div class="row js-loadcontent">';
        while ( have_posts() ) : the_post();
          ?>
            <div class="col-lg-4 col-md-6 d-md-flex">
                <?php get_template_part( 'template-parts/content','archive'); ?>
            </div>
        <?php
        endwhile;
        echo '</div>';
        ?>
        <div class="text-center ">
          <button class="btn-loadmore js-loadmore" data-catid="<?php echo $term_id; ?>"><?php _e('Xem thêm','dntheme'); ?></button>
        </div>
        <?php
        else:
          get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
  </div>
</div>

<?php else: ?>
  <div class="archive__content">
    <div class="container">
      <?php
      if ( have_posts() ) : //$i=0;
          echo '<div class="row">';
          while ( have_posts() ) : the_post(); //$i++;
            // if($i>=2){
            ?>
              <div class="col-lg-4 col-md-6 d-md-flex">
                  <?php get_template_part( 'template-parts/content','archive'); ?>
              </div>
          <?php
            // }
          endwhile;
          echo '</div>';
          dntheme_paging_nav();
      endif;
      ?>
    </div>
  </div>
<?php endif; ?>


<?php get_footer();
