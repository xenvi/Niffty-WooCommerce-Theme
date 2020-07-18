<section class="page-wrap">
    <div class="container home-container">

        <div class="cards">
            <div class="card">
                <h4><?php the_field('card_1_title') ?></h4>
                <p><?php the_field('card_1_description') ?></p>
            </div>
            <div class="card">
                <h4><?php the_field('card_2_title') ?></h4>
                <p><?php the_field('card_2_description') ?></p>
            </div>
            <div class="card">
                <h4><?php the_field('card_3_title') ?></h4>
                <p><?php the_field('card_3_description') ?></p>
            </div>
        </div>

        
        <div class="carousel top-rated-products">
            <h3><?php the_field('top_products_title') ?></h3>
            <p><?php the_field('top_products_description') ?></p>
            <?php if(is_active_sidebar('featured-products')):?>
                    <?php dynamic_sidebar('featured-products');?>
                <?php endif;?>
        </div>

        <div class="carousel new-products">
            <h3><?php the_field('new_products_title') ?></h3>
            <p><?php the_field('new_products_description') ?></p>
            <?php if(is_active_sidebar('newest-products')):?>
                    <?php dynamic_sidebar('newest-products');?>
                <?php endif;?>
        </div>


    </div>
    <div class="newsletter">
        <div class="container">
            <h4><?php the_field('title') ?></h4>
            <?php if(is_active_sidebar('newsletter')):?>
                <?php dynamic_sidebar('newsletter');?>
            <?php endif;?>
        </div>
    </div>
</section>