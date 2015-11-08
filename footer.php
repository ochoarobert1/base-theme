<footer class="container-fluid" role="contentinfo">
    <div class="row">
        <div class="the-footer col-md-12 no-paddingl no-paddingr">
            <div class="container">
                <div class="row">
                    <div class="footer-menu col-md-12">
                        <?php wp_nav_menu(array('container_class' => 'menu-footer', 'theme_location' => 'menu_footer', 'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>' )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>
</html>
