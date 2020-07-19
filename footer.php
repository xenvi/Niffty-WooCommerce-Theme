
<footer>
    <section class="container footer-container">
        <div class="row">
            <div class="col-lg-3">
                <div class="about">
                <a href="<?php echo get_home_url();?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="Niffty logo" class="brand"></a>

                <div class="company-info">
                    <span>+1 (123) 456-7890</span>
                    <span>info@niffty.com</span>
                    <span>123 Address Rd, CA 90987</span>
                </div>

                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'social-menu',
                        'menu_class' => 'social-menu'
                    )
                ); ?>
                </div>
            </div>
            <div class="col-lg-6 nav-links">
                <div class="nav-section">
                    <h5>Company</h5>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'footer-company',
                            'menu_class' => 'footer-company'
                        )
                    ); ?>
                </div>
                <div class="nav-section">
                    <h5>Support</h5>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'footer-help',
                            'menu_class' => 'footer-help'
                        )
                    ); ?>
                </div>
                <div class="nav-section">
                    <h5>Profile</h5>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'footer-profile',
                            'menu_class' => 'footer-profile'
                        )
                    ); ?>
                </div>
            </div>
            <div class="col-lg-3">
                <?php if(is_active_sidebar('newsletter')):?>
                    <?php dynamic_sidebar('newsletter');?>
                <?php endif;?>
            </div>
        </div>
    </section>
    <section class="legal">
        <span>© 2020 Niff All rights reserved.</span>
    </section>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.1/gsap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
<?php wp_footer(); ?>

</body>
</html>