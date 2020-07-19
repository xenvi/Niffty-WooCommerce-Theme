jQuery(document).ready(function() {
    // reveal search
    jQuery("#nav-search").click(function() {
        jQuery('.search-wrap').toggleClass('fade-in');
    });
    
    // open mobile
    jQuery(".hamburger").click(() => {
        jQuery(".mobile-nav").toggleClass('slide');
    })

    jQuery(".mobile-menu li:has(ul)").click(function(){
        jQuery("ul",this).toggleClass('slide2');
    });

  });

  function toggle() {
    if ( jQuery( window ).width() >= 770 ) {
      jQuery( '.nav.menu-main-menu-container' ).show();
      jQuery( '.sub-menu' ).removeClass('mobile-sub-menu');
      jQuery( '.sub-menu' ).show();
    } else {
      jQuery( '.nav.menu-main-menu-container' ).hide();
      if (!jQuery( '.sub-menu' ).hasClass('mobile-sub-menu')) {
        jQuery( '.sub-menu' ).addClass('mobile-sub-menu');
      }
    }
}

toggle();

jQuery( window ).resize( function () {
    toggle();
} );