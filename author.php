<?php get_header(); ?>
<main class="container" role="main">
    <div class="row">
        <section class="col-md-12">
            <?php if (have_posts()): the_post(); ?>
            <h1>Archivo de <?php echo get_the_author(); ?></h1>
            <?php if ( get_the_author_meta('description')) : ?>
            <?php echo get_avatar(get_the_author_meta('user_email')); ?>
            <h2>Acerca de <?php echo get_the_author() ; ?></h2>
            <?php echo wpautop( get_the_author_meta('description') ); ?>
            <?php endif; ?>
            <hr>
            <div class="col-md-9">
                <?php $defaultatts = array('class' => 'img-responsive'); ?>
                <?php rewind_posts(); while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" class="archive-item col-md-12 no-paddingl no-paddingr <?php echo join(' ', get_post_class()); ?>">
                    <picture class="col-md-5">
                        <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail('blog_img', $defaultatts); ?>
                        </a>
                        <?php else : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-img.jpg" alt="No img" class="img-responsive" />
                        </a>
                        <?php endif; ?>
                    </picture>
                    <div class="col-md-7">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>
                        <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                        <span class="author">Publicado por: <?php the_author_posts_link(); ?></span>
                        <p><?php the_excerpt(); ?></p>
                        <?php edit_post_link(); ?>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </article>
                <?php endwhile; ?>
                <div class="pagination col-md-12">
                    <?php if(function_exists('wp_paginate')) { wp_paginate(); } else { posts_nav_link(); } ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
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
