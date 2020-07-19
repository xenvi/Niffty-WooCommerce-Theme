<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

            <div class="member" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="col-lg-6 pr-0 pl-0 member-img-wrapper">
                    <?php if(has_post_thumbnail()):?>
                        <img src="<?php the_post_thumbnail_url('profile');?>" alt="<?php the_title();?>" class="img-fluid member-img"/>
                    <?php endif;?>
                </div>
                <div class="col-lg-6 member-info animate">
                    <h3 class="name"><?php the_title();?></h3>
                    <span class="title"><?php the_field('role');?></span>
                    <div class="content"><?php the_content(); ?></div>
                    <ul class="fields">
                        <li><a href="<?php the_field('instagram');?>"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="<?php the_field('twitter');?>"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="<?php the_field('linkedin');?>"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

            <?php endwhile; else: endif; ?>