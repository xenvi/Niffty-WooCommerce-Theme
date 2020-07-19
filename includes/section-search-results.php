<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

<?php 
    $fname = get_the_author_meta('first_name');
    $lname = get_the_author_meta('last_name');
?>

   <div class="archive-post mb-5">
        <span class="cat"><?php the_category(' / '); ?></span>
        
        <?php if(has_post_thumbnail()):?>
            <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('post-large');?>" alt="<?php the_title();?>" class="img-fluid"/></a>
        <?php endif;?>

        <div class="blog-content">
            <p class="subtext"><?php echo get_the_date('F j, Y');?> by <?php echo $fname;?> <?php echo $lname;?></p>
            <a href="<?php the_permalink();?>" class="title"><?php the_title();?></a>
            <span><?php the_excerpt(); ?></span>
            <a href="<?php the_permalink();?>" class="readmore">Continue reading</a>
        </div>
   </div>

<?php endwhile; else: ?>
    There are no results for '<?php echo get_search_query(); ?>'
<?php endif; ?>