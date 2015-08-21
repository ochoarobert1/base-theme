<?php get_header(); ?>
<main class="container" role="main">
    <div class="row">
        <section class="col-md-12">
            <h2>Ultimos Posts</h2>
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <object class="col-md-5">
                    <?php if ( has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail('blog_img'); ?>
                    </a>
                    <?php endif; ?>
                </object>
                <div class="col-md-7">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>
                    <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                    <span class="author">Publicado por: <?php the_author_posts_link(); ?></span>
                    <p><?php the_excerpt(); ?></p>
                    <?php edit_post_link(); ?>
                </div>
                <div class="clearfix"></div>
            </article>
            <?php endwhile; ?>
            <div class="pagination">
                <?php if(function_exists('wp_paginate')) { wp_paginate(); } ?>
            </div>
            <?php else: ?>
            <article>
                <h2>Disculpe, su busqueda no arrojo ningun resultado</h2>
                <h3>Haga click <a href="<?php echo home_url('/'); ?>">aqui</a> para volver al inicio</h3>
            </article>
            <?php endif; ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>
