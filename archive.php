<?php get_header(); ?>
<?php the_post(); ?>
<div class="container">
    <div class="row">
        <section class="col-md-12">
            <?php $args = array('posts_per_page' => 9, 'paged' => $paged); ?>
            <?php query_posts($args); ?>
            <?php while (have_posts()) : the_post(); ?>
            <article class="col-md-12 no-paddingl no-paddingr">
                <object class="col-md-5">
                    <?php the_post_thumbnail('blog_img'); ?>
                </object>
                <div class="col-md-7">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
                </div>
                <div class="clearfix"></div>
            </article>
            <?php endwhile; ?>
            <?php if(function_exists('wp_paginate')) { wp_paginate(); } ?>
        </section>
    </div>
</div>
<?php get_footer(); ?>
