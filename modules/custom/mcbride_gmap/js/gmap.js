(function($){
  Drupal.behaviors.mcbrideGmapModule = {
    attach: function(context, settings) {
      var maps = Drupal.settings.maps;
      var maps_config = Drupal.settings.maps_config;
      
      $('div.map_canvas').css({
        'width':maps_config.width,
        'height':maps_config.height
      });
      var zoom = maps_config.zoom;
      for(var i in maps){
        var nid = maps[i]['nid'];
        var lon = maps[i]['long'];
        var lat = maps[i]['lat'];
        initialize(nid, lon, lat, zoom);
      }
      
      //Initialize map object
      function initialize(nid,lon,lat,zoom) {
        if (GBrowserIsCompatible()) {
          var map = new GMap2(document.getElementById("map_canvas_"+nid));
          map.setCenter(new GLatLng(lon, lat), 13);
          map.addControl(new GSmallMapControl());
          map.setZoom(zoom);                   
                    
          // Add markers to the map at locations
          var point = new GLatLng(lon,lat);
          map.addOverlay(new GMarker(point)); 
          

        }
      }
      
      GUnload();
            
            
        
    }
  };

})(jQuery);


