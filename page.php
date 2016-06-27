<?php get_header(); ?>
<?php the_post(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <section class="page-container col-md-12" role="article" itemscope itemtype="http://schema.org/BlogPosting">
            <h1 itemprop="headline"><?php the_title(); ?></h1>
            <div class="the-breadcrumbs col-md-12">
                <?php echo the_breadcrumb(); ?>
            </div>
            <article id="post-<?php the_ID(); ?>" class="page-content <?php echo join(' ', get_post_class()); ?>" >
                <div class="page-article col-md-12 no-paddingl no-paddingr" itemprop="articleBody">
                    <?php the_content(); ?>
                    <?php comments_template( '', true ); // Remove if you don't want comments ?>
                    <br class="clear">
                    <?php edit_post_link(); ?>
                </div>
            </article>
        </section>
    </div>
</main>
<?php get_footer(); ?>
