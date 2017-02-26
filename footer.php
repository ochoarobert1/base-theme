<footer class="container-fluid" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="row">
        <div class="the-footer col-lg-12 col-md-12 col-sm-12 col-xs-12 no-paddingl no-paddingr">
            <div class="container">
                <div class="row">
                    <div class="footer-menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php wp_nav_menu(array('container_class' => 'menu-footer', 'theme_location' => 'footer_menu', 'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>' )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>
</html>
