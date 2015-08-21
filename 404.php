<?php get_header(); ?>
<?php the_post(); ?>
<div class="container">
    <div class="row">
        <section class="col-md-12">
            <figure class="col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                <img src="<?php bloginfo('template_url'); ?>/images/404.png" alt="Error 404 Imagen" class="img-responsive" />
            </figure>
            <div class="clearfix"></div>
            <div class="col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                <h1 class="text-center">Error (404)</h1>
                <hr>
                <h4 class="text-center">No podemos encontrar la página que buscas. Dirígete nuevamente al <a href="<?php echo home_url('/'); ?>">inicio</a>.</h4>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
</div>
<?php get_footer(); ?>
