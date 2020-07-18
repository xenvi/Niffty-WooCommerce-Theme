<?php get_header(); ?>

<section class="breadcrumbs">
    <h3><?php the_title();?></h3>
    <?php
    if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }
    ?>
</section>

<section class="page-wrap">
    <div class="container">
    <section class="row">
            <div class="col-lg-9">
                <?php get_template_part('includes/section','content'); ?>

                <?php wp_link_pages();?>
            </div>
        
            <div class="col-lg-3 widgets">
                <?php if(is_active_sidebar('page-sidebar')):?>
                    <?php dynamic_sidebar('page-sidebar');?>
                <?php endif;?>
            </div>
        </section>
    </div>
</section>

<?php get_footer(); ?>