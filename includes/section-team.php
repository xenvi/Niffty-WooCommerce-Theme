<?php
    $args = array(
        'post_type' => 'team',
        'orderby' => 'date',
        'order'   => 'ASC');
    $team = new WP_Query( $args );
    if( $team->have_posts() ): while( $team->have_posts() ): $team->the_post(); ?>

            <div class="member" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php the_permalink();?>"><div class="member-wrapper">
                    <?php if(has_post_thumbnail()):?>
                        <img src="<?php the_post_thumbnail_url('profile');?>" alt="<?php the_title();?>" class="member-img img-fluid"/>
                    <?php endif;?>

                    <ul class="fields">
                            <li><a href="<?php the_field('instagram');?>"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="<?php the_field('twitter');?>"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?php the_field('linkedin');?>"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    
                    <div class="text-wrapper">
                        <h3 class="name"><?php the_title();?></h3>
                        <span class="title"><?php the_field('role');?></span>
                    </div>
                </div>
            </a>
            </div>

            <?php endwhile; else: endif; wp_reset_query(); ?>