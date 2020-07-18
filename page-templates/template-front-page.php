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
    <h1></h1>
</section>

<?php get_template_part('includes/section','home'); ?>

<?php get_footer(); ?>