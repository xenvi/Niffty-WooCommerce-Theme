<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title();?></title>

    <?php wp_head(); ?>
    
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

<header>
<div class="info-nav-container">
    <div class="container info-nav">
        <div class="contact">
            <span>+1 (123) 456-7890</span>
            <span>info@niffty.com</span>
        </div>
        <div class="accessibility">
            <span>USD</span>
            <span>ENG</span>
        </div>
    </div>
</div>
<div class="main-nav-wrapper">
    <div class="container main-nav">
        <a href="<?php echo get_home_url();?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="Niffty logo" class="brand"></a>

        <div class="menu">
            <?php wp_nav_menu(
                array(
                'theme_location' => 'main-menu',
                'menu_class' => 'main-menu'
                )
            ); ?>
        </div>

        <div class="menu">
        <?php wp_nav_menu(
                array(
                'theme_location' => 'shop-menu',
                'menu_class' => 'shop-menu'
                )
            ); ?>
            <a href="<?php echo wc_get_cart_url() ?>" class="cart-count"><?php echo $woocommerce->cart->cart_contents_count ?></a>
            <span class="hamburger"><i class="fas fa-bars"></i></span>
        </div>
    </div>
    <div class="mobile-nav">
                <?php wp_nav_menu(
                    array(
                    'theme_location' => 'mobile-menu',
                    'menu_class' => 'mobile-menu'
                    )
                ); ?>
                
    </div>
    <div class="search-wrap">
        <?php get_product_search_form();?>
    </div>
</div>
</header>
