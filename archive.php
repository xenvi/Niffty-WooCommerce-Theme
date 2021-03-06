<?php get_header(); ?>

<section class="breadcrumbs">
    <h3><?php echo get_the_archive_title();?></h3>
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
                <?php get_template_part('includes/section','archive'); ?>

                <?php echo paginate_links();?>
            </div>
            <div class="col-lg-3 widgets">
                <?php if(is_active_sidebar('blog-sidebar')):?>
                    <?php dynamic_sidebar('blog-sidebar');?>
                <?php endif;?>
            </div>
        </section>
    </div>

</section>

<?php get_footer(); ?>