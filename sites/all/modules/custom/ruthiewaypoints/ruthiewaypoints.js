(function ($) {
  Drupal.behaviors.ruthiewaypoints = {
    attach: function (context, settings) {

      var user = Drupal.settings.ruthiewaypoints.user;
      var ids_array = $("#menu-bootstrap-custom-menu a").map(function() {
        return $(this).attr("href");
      });

      for (var i = 0; i < ids_array.length; i++) {
        var curSection = ids_array[i]; 
        addWaypoint(i, curSection);
      }

      function addWaypoint( n, curSection ){
        $(curSection).waypoint(function(direction) {
          console.log(curSection, direction);

          if (direction == 'down') {
            $( "#menu-bootstrap-custom-menu a[href*='" + curSection + "']" ).addClass("active");
            $( "#menu-bootstrap-custom-menu a[href!='" + curSection + "']" ).removeClass("active");
          }
          
          
        });    
      }
    
    }
  };
}(jQuery));