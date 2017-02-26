<?php get_header(); ?>
<?php the_post(); ?>
<main class="container">
    <div class="row">
        <div class="single-main-container col-lg-12 col-md-12 col-sm-12 col-xs-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <?php $defaultargs = array('class' => 'img-responsive'); ?>
            <?php /* GET THE POST FORMAT */ ?>
            <?php get_template_part( 'post-formats/format', get_post_format() ); ?>
            <aside class="the-sidebar col-lg-3 col-md-3 col-sm-3 hidden-xs" role="complementary">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>
