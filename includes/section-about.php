<section class="about-wrapper">
    <div class="company-info animate">
        <h3><?php the_field('about_title');?></h3>
        <hr />
        <p><?php the_field('about_description');?></p>
    </div>
    <div class="image animate">
    <?php if(has_post_thumbnail()):?>
        <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>" class="img-fluid"/>
    <?php endif;?>
    </div>
    <div class="about-cards">
        <div class="card animate">
            <h4><?php the_field('info_title_1');?></h4>
            <hr />
            <p><?php the_field('info_description_1');?></p>
        </div>
        <div class="card animate">
            <h4><?php the_field('info_title_2');?></h4>
            <hr />
            <p><?php the_field('info_description_2');?></p>
        </div>
        <div class="card animate">
            <h4><?php the_field('info_title_3');?></h4>
            <hr />
            <p><?php the_field('info_description_3');?></p>
        </div>
    </div>
</section>