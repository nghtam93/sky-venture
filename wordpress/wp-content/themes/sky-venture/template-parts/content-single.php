<?php
/**
 * Template part for displaying posts
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$categories = get_the_category(get_the_ID());
$cat_name = $categories[0]->name;
$cat_link = get_category_link($categories[0]);
?>

<div class="container container-lg-1200">
    <div class="single-content">
        <div class="dn__breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
              <?php if(function_exists('bcn_display'))
              {
                  bcn_display();
              }?>
        </div>

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-by"><?php echo get_the_author(); ?> - <span class="news__slider__date"><?php echo get_the_time("d/m/Y"); ?></span>
        </div>

        <div class="entry-content">
            <p class="text-center">
              <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
            </p>
            <?php the_content() ?>
        </div>
        <hr>
        <div class="single__tag">
            <?php
                echo get_the_tag_list( sprintf( '<p>%s: ', __( 'Tags', 'dntheme' ) ), ' ', '</p>' );
            ?>
        </div>
    </div>
</div>

<div class="related__post__wrapper">
    <div class="container">
    <?php
        related_category_fix(
            array(
                'posts_per_page'    => 6,
                'related_title'     => __( 'Bài viết liên quan', 'dntheme' ),
                'template_type'     => 'slider', // slider , widget
                'template'          => 'content-archive',
                'set_taxonomy'      => null,
                'class_item'        => 'col-12 col-md-4',
            )
        );
    ?>
    </div>
</div>