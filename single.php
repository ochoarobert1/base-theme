<?php get_header(); ?>
<?php the_post(); ?>
<main class="container">
    <div class="row">
        <div class="col-md-12">
           <?php $defaultargs = array('class' => 'img-responsive'); ?>
            <article id="post-<?php the_ID(); ?>" class="the-single col-md-9 <?php echo join(' ', get_post_class()); ?>" itemscope itemtype="http://schema.org/Article">
                <?php if ( has_post_thumbnail()) : ?>
                <picture>
                    <?php the_post_thumbnail('single_img', $defaultargs); ?>
                </picture>
                <?php endif; ?>
                <header>
                    <a href="<?php echo get_edit_post_link(); ?> "><i class="fa fa-edit fa-2x pull-right"></i></a>
                    <h1 itemprop="name"><?php the_title(); ?></h1>
                    <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                    <span class="author">Publicado por: <?php the_author_posts_link(); ?></span>
                </header>
                <div class="post-content" itemprop="articleBody">
                    <?php the_content() ?>
                    <?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
                    <footer>
                        <p>Categorias: <?php the_category(', '); // Separated by commas ?></p>
                        <p>Escrito por: <?php the_author(); ?></p>

                    </footer>
                </div><!-- .post-content -->
                <meta itemprop="datePublished" content="<?php echo get_the_date('i') ?>">
                <meta itemprop="author" content="<?php echo esc_attr(get_the_author()) ?>">
                <meta itemprop="url" content="<?php the_permalink() ?>">
                <?php if ( comments_open() ) { comments_template(); } ?>
            </article><!-- #post-## -->
            <aside class="the-sidebar col-md-3" role="complementary">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>
