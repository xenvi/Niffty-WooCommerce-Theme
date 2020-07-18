<div class="container">
    <div class="row">
     <h3>Contact Info</h3>
    </div>
   <div class="row info-box">
     <i class="fas fa-map-marked-alt"></i>
     <div class="text">
          <h4>Niffty HQ</h4>
          <p><?php the_field('street_address');?></p>
          <p><?php the_field('city_state_zip');?></p>
          <p><?php the_field('country');?></p>
     </div>
     </div>
   <div class="row info-box">
     <i class="fas fa-phone"></i>
     <div class="text">
          <h4>Business Phone</h4>
          <p><?php the_field('telephone_number');?></p>
          <p><?php the_field('office_hours');?></p>
     </div>
   </div>
   <div class="row info-box">
        <?php wp_nav_menu(
             array(
                'theme_location' => 'social-menu',
                'menu_class' => 'social-menu'
             )
        ); ?>
   </div>
</div>