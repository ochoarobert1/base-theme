<?php get_header(); ?>
<?php the_post(); ?>
<main class="container">
    <div class="row">
        <div class="single-main-container col-md-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <?php $defaultargs = array('class' => 'img-responsive'); ?>
            <?php /* GET THE POST FORMAT */ ?>
            <?php get_template_part( 'post-formats/format', get_post_format() ); ?>
            <aside class="the-sidebar col-md-3" role="complementary">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>
