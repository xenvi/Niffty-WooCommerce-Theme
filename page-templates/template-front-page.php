<?php 
/*
Template Name: Home
?>
*/
?>

<?php get_header(); ?>

<section class="landing">
    <?php if(has_post_thumbnail()):?>
        <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>" class="header-img img-fluid"/>
    <?php endif;?>
    <div class="content">
        <h5><?php the_field('small_text') ?></h5>
        <h1><?php the_field('large_text') ?></h1>
        <a class="shop-button" href="<?php echo wc_get_page_permalink( 'shop' ); ?>"> SHOP NOW </a>
    </div>
</section>

<?php get_template_part('includes/section','home'); ?>

<?php get_footer(); ?>