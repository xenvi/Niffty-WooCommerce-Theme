<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

<section class="blog-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(has_post_thumbnail()):?>
        <img src="<?php the_post_thumbnail_url('post-large');?>" alt="<?php the_title();?>" class="img-fluid animate"/>
    <?php endif;?>

    <?php 
        $fname = get_the_author_meta('first_name', $post->post_author);
        $lname = get_the_author_meta('last_name', $post->post_author);
    ?>
    <p class="subtext animate">By <?php echo $fname;?> <?php echo $lname;?>, <?php echo get_the_date('F j, Y');?> in
    <?php
        $categories = get_the_category();
        foreach($categories as $cat):?>
            <a href="<?php echo get_category_link($cat->term_id);?>" class="category-tag animate">
                <?php echo $cat->name;?> 
            </a>
        <?php endforeach;?></p>

    <div class="content animate"><?php the_content(); ?></div>

   <div class="tag-wrapper animate">
   <i class="fas fa-tags"></i>
        <?php
        $tags = get_the_tags();
        if($tags):
        foreach($tags as $tag):?>
            <a href="<?php echo get_tag_link($tag->term_id);?>" class="tag">
                 #<?php echo $tag->name;?>
            </a>
        <?php endforeach; endif;?>
   </div>

    <?php $comments_number = get_comments_number();
        if ($comments_number):?>
            <div class="comments animate">
                <h3><?php echo $comments_number; ?> Comments</h3>
                <ol>
                    <?php
                    $comments = get_comments(array(
                        'post_id' => $post->ID,
                        'status'  => 'approve'
                    ));
                    wp_list_comments(array(
                        'per_page' => 4,
                        'avatar_size' => 50,
                        'callback' => 'niffty_comment'
                    ), $comments)
                    ?>
                </ol>
    
            </div>        <div class="navigation">
                <?php paginate_comments_links(); ?>
            </div>
        <?php else: ?>
            <div class="comments animate">
                <p class="no-comments">There are no comments.</p>
            </div>
    <?php endif;?>
    <div class="animate"><?php comment_form(); ?></div>
</section>

<?php endwhile; else: endif; ?>