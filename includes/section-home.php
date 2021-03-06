<section class="page-wrap">
    <div class="container home-container">

        <div class="cards">
            <div class="card animate">
                <h4><?php the_field('card_1_title') ?></h4>
                <p><?php the_field('card_1_description') ?></p>
            </div>
            <div class="card animate">
                <h4><?php the_field('card_2_title') ?></h4>
                <p><?php the_field('card_2_description') ?></p>
            </div>
            <div class="card animate">
                <h4><?php the_field('card_3_title') ?></h4>
                <p><?php the_field('card_3_description') ?></p>
            </div>
        </div>
        
        <div class="carousel top-rated-products animate">
            <h3><?php the_field('top_products_title') ?></h3>
            <p><?php the_field('top_products_description') ?></p>
            <?php if(is_active_sidebar('featured-products')):?>
                    <?php dynamic_sidebar('featured-products');?>
                <?php endif;?>
        </div>
    </div>
    <div class="categories animate">
        <div class="half left">
            <img src="<?php the_field('left_cat_image') ?>" alt="<?php the_field('left_cat_title') ?>">
            <h3><?php the_field('left_cat_title') ?></h3>
            <a class="shop-button" href="<?php echo wc_get_page_permalink( 'shop' ); ?>"> SHOP </a>
        </div>
        <div class="half right">
            <img src="<?php the_field('right_cat_image') ?>" alt="<?php the_field('right_cat_title') ?>">
            <h3><?php the_field('right_cat_title') ?></h3>
            <a class="shop-button" href="<?php echo wc_get_page_permalink( 'shop' ); ?>"> SHOP </a>
        </div>
    </div>
    <div class="container">
        <div class="carousel new-products animate">
            <h3><?php the_field('new_products_title') ?></h3>
            <p><?php the_field('new_products_description') ?></p>
            <?php if(is_active_sidebar('newest-products')):?>
                    <?php dynamic_sidebar('newest-products');?>
                <?php endif;?>
        </div>
    </div>
    <div class="newsletter animate">
        <div class="container">
            <h4><?php the_field('title') ?></h4>
            <?php if(is_active_sidebar('newsletter')):?>
                <?php dynamic_sidebar('newsletter');?>
            <?php endif;?>
        </div>
    </div>
</section>