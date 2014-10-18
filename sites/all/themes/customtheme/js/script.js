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

  jQuery("#navbar li a").click(function(event) {
    // check if window is small enough so dropdown is created
    jQuery("#navbarCollapse").removeClass("in").addClass("collapse");
  });
});