<?php 
/*
Template Name: Contact Us
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
<section class="page-wrap">
    <div class="container">
        <div class="row contact-section">
            <div class="col-lg-7">
                <?php get_template_part('includes/section','content'); ?>
            </div>
            <div class="col-lg-5">
                <?php get_template_part('includes/section','contact'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>