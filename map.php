<?php include('get.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Drawing tools</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="nav">
        Hello
        <?php echo get(); ?>
    </div>

    <div id="map"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>

      // var location = '';

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 52.407175, lng: -4.090470},
          zoom: 8
        });

        drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.MARKER,
          drawingControl: true,
          drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [
              google.maps.drawing.OverlayType.MARKER,
              // google.maps.drawing.OverlayType.CIRCLE,
              // google.maps.drawing.OverlayType.POLYGON,
              google.maps.drawing.OverlayType.POLYLINE
            ]
          },
          markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
          circleOptions: {
            fillColor: '#ffff00',
            fillOpacity: 1,
            strokeWeight: 5,
            clickable: false,
            editable: true,
            zIndex: 1
          }
        });

        drawingManager.setMap(map);
        // console.log(drawingManager)
        // 
        drawingManager.addListener('overlaycomplete', function(polyline){
          $.each(polyline.overlay.latLngs.j[0].j , function(key,g){
            // location += ''+g;
          });

          // $('#nav').html(location)
        })



      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGZ6UZNUwkU_qVzB7RrdfzGf28entH1LI&libraries=drawing&callback=initMap"
         async defer></script>
  </body>
</html>