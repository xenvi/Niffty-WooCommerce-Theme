<?php get_header(); ?>

<section class="page-404">
    <h1>404</h1>
    <p>Oops! Page cannot be found.</p>
    <div class="row">
        <a href="<?php echo home_url(); ?>">Return to Homepage</a>
        <a href="<?php echo get_permalink( get_page_by_path( 'shop' ) );?>" class="shop-button">Visit Shop</a>
    </div>
</section>

<?php get_footer(); ?>