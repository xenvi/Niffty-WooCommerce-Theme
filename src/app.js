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

    // position sticky IE support
    // Check if Navigator is Internet Explorer
    if(navigator.userAgent.indexOf('MSIE')!==-1
    || navigator.appVersion.indexOf('Trident/') > -1){

    // Scroll event check
    jQuery(window).scroll(function (event) {
        var scroll = jQuery(window).scrollTop();

        // Activate sticky for IE if scrolltop is more than 51px
        if ( scroll > 51) {
            jQuery('.main-nav-wrapper').addClass( "sticky-ie" );
        }else{
            jQuery('.main-nav-wrapper').removeClass( "sticky-ie" );        
        }

    });
  }

    // GSAP ANIM
    var tl = gsap.timeline();
    tl.from("#small-landing", {autoAlpha: 0, y: 100, duration: 1, delay: 1});
    tl.from("#large-landing", {autoAlpha: 0, y: 50, duration: 1});
    tl.from("#shop-landing-button", {autoAlpha: 0, scale: 0, duration: 1});

    TweenLite.defaultEase = Linear.easeNone;
    var ctrl = new ScrollMagic.Controller();

    // Create scenes
    jQuery(".animate").each(function(i) {
    let target = jQuery(this);
    var tl = new TimelineMax();
    tl.from(target, 1, { opacity: 0, y: 60 });

    new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: 0.5,
        offset: '-120%'
    })
        .setTween(tl)
        .addTo(ctrl)
    });

    if(jQuery(".woocommerce-MyAccount-navigation").hasClass("animate")) {
        jQuery(".woocommerce-MyAccount-navigation").removeClass(" animate");
    }

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