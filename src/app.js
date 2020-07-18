jQuery(document).ready(function() {
    jQuery("#nav-search").click(function() {
        jQuery('.search-wrap').toggleClass('fade-in');
        console.log('clicked');
    })
  });