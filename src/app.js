jQuery(document).ready(function() {
    // reveal search
    jQuery("#nav-search").click(function() {
        jQuery('.search-wrap').toggleClass('fade-in');
    });
    
    // open mobile
    jQuery(".hamburger").click(() => {
        jQuery(".mobile-nav").toggleClass('slide');
    })

    jQuery('.mobile-sub-menu').hide();
    jQuery(".mobile-sub-menu li:has(ul)").click(function(){
        jQuery("ul",this).slideToggle('slow');
    });

  });

  function toggle() {
    if ( jQuery( window ).width() >= 700 ) {
      jQuery( '.nav.menu-main-menu-container' ).show();
      jQuery( '.sub-menu' ).removeClass('mobile-sub-menu');
    } else {
      jQuery( '.nav.menu-main-menu-container' ).hide();
      if (!jQuery( '.sub-menu' ).hasClass('mobile-sub-menu')) {
        jQuery( '.sub-menu' ).addClass('mobile-sub-menu');
      }
      jQuery('.mobile-sub-menu').hide();
    }
}

toggle();

jQuery( window ).resize( function () {
    toggle();
} );