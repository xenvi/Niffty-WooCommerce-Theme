<?php 
/*
Template Name: About Us
*/
?>

<?php get_header(); ?>

<section class="breadcrumbs">
    <h3><?php the_title();?></h3>
    <?php
    if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }
    ?>
</section>
<section class="page-wrap about-section">
    <div class="container">
        <?php get_template_part('includes/section','about'); ?>
    </div>

</section>
<a href="<?php echo home_url(); ?>/contact" class="contact-button">GET IN CONTACT</a>

<?php get_footer(); ?>