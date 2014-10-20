(function ($) {
  Drupal.behaviors.ruthiewaypoints = {
    attach: function (context, settings) {

      $(document).ready(function(){
        
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
  /*
            if (direction === 'down') {
              $('#menu-bootstrap-custom-menu a[href="' + curSection + '"]').addClass('active').prev().removeClass('active');
            }
            else {
              $('#menu-bootstrap-custom-menu a[href="' + curSection + '"]').addClass('active').next().removeClass('active');
            }
  */

          });    
        }

        mywindow = $(window);
        mywindow.scroll(function () {
          if (mywindow.scrollTop() == 0) {
            $('#menu-bootstrap-custom-menu a').removeClass('active');
            $('#menu-bootstrap-custom-menu li:first-child a').addClass('active');
          }
        });

      });
    
    }
  };
}(jQuery));