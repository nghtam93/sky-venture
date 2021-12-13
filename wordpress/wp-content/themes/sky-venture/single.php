<?php
/**
 * The template for displaying all single posts
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
get_header(); ?>
<section class="single__wrapper">
    <div class="single__wrapper__ic"></div>
    <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content','single');
        endwhile;
    ?>
</section>

<?php get_footer();
