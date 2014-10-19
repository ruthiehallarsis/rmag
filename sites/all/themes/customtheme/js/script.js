jQuery(document).ready(function(){

	jQuery('#works-sortable-container').mixItUp();
  
  jQuery( "h1:contains('Welcome to Ruthie')" ).remove();

  jQuery('#galaxy-slider').flexslider({
    animation: "slide",
    direction: "vertical",
    animationLoop: true,
    controlNav: false,
    directionNav: false,
    smoothHeight: true,
    slideshowSpeed: 1500
  });

  jQuery("#menu-bootstrap-custom-menu li:first-child a").addClass("active");

  jQuery("#navbar li a").click(function(event) {
    jQuery("#navbarCollapse").removeClass("in").addClass("collapse");
  });

  jQuery("#menu-bootstrap-custom-menu li a").click(function() {
    jQuery(this).addClass("active");
    jQuery('#menu-bootstrap-custom-menu li a').not(this).each(function(){
      jQuery(this).removeClass('active');
    });
  });


});