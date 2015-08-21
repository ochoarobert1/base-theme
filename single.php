<?php get_header(); ?>
<?php the_post(); ?>
<main class="container">
    <div class="row">
        <div class="col-md-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
                <object>
                    <?php if ( has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <?php endif; ?>
                </object>
                <header>
                    <h1 itemprop="name"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                    <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                    <span class="author">Publicado por: <?php the_author_posts_link(); ?></span>
                </header>
                <div class="post-content" itemprop="articleBody">
                    <?php the_content() ?>
                    <?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
                     <footer>
                    <p>Categorias: <?php the_category(', '); // Separated by commas ?></p>
                    <p>Escrito por: <?php the_author(); ?></p>
                    <?php edit_post_link(); // Always handy to have Edit Post Links available ?>
                    </footer>
                </div><!-- .post-content -->
                <meta itemprop="datePublished" content="<?php echo get_the_date('i') ?>">
                <meta itemprop="author" content="<?php echo esc_attr(get_the_author()) ?>">
                <meta itemprop="url" content="<?php the_permalink() ?>">
            </article><!-- #post-## -->
        </div>
    </div>
</main>
<?php get_footer(); ?>
