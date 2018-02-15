(function($){
    Drupal.behaviors.mcbrideGmapSearchModule = {
        attach: function(context, settings) {

            ////map
            //            var map = new GMap2(document.getElementById("map"));
            //
            //            map.setCenter(new GLatLng(35.478932, -97.524176), 15);
            //            map.addControl(new GMapTypeControl(1));
            //            map.addControl(new GLargeMapControl());
            //            map.enableContinuousZoom();
            //            map.enableDoubleClickZoom();
            //
            //            var point = new GLatLng(35.478932, -97.524176);
            //            var markerD2 = new GMarker(point, {
            //                icon:G_DEFAULT_ICON, 
            //                draggable: true
            //            });
            //            map.addOverlay(markerD2);
            //            markerD2.enableDragging();
            //            GEvent.addListener(markerD2, "drag", function(){
            //                document.getElementById("location").value=markerD2.getPoint().toUrlValue();
            //            });
            //            GEvent.addListener(map, "mousemove", function(point){
            //                document.getElementById("mouse").value=point.toUrlValue();
            //            });
            ////map
            var map = new GMap2(document.getElementById("map"));
            //var start = new GLatLng(65,25);
            map.setCenter(new GLatLng(65,25), 4);
            map.addControl(new GMapTypeControl(1));
            map.addControl(new GLargeMapControl());
            map.enableContinuousZoom();
            map.enableDoubleClickZoom();
            // "tiny" marker icon
            var icon = new GIcon();
            icon.image = "http://labs.google.com/ridefinder/images/mm_20_red.png";
            icon.shadow = "http://labs.google.com/ridefinder/images/mm_20_shadow.png";
            icon.iconSize = new GSize(12, 20);
            icon.shadowSize = new GSize(22, 20);
            icon.iconAnchor = new GPoint(6, 20);
            icon.infoWindowAnchor = new GPoint(5, 1);
            /////Draggable markers
            var point = new GLatLng(62,25.5);
            var markerD = new GMarker(point, {
                icon:icon, 
                draggable: true
            });
            map.addOverlay(markerD);
            markerD.enableDragging();
            GEvent.addListener(markerD, "drag", function(){
                document.getElementById("location").value=markerD.getPoint().toUrlValue();
            });
            var point = new GLatLng(60,25);
            var markerD2 = new GMarker(point, {
                icon:G_DEFAULT_ICON, 
                draggable: true
            });
            map.addOverlay(markerD2);
            markerD2.enableDragging();
            GEvent.addListener(markerD2, "drag", function(){
                document.getElementById("location").value=markerD2.getPoint().toUrlValue();
            });
            /////Normal marker
            var point = new GLatLng(65,25)
            var markerN = new GMarker(point);
            map.addOverlay(markerN);
            ////Mouse pointer
            GEvent.addListener(map, "mousemove", function(point){
                document.getElementById("mouse").value=point.toUrlValue();
            }); 

        ////////////////////////////////////////////////////////////////////////////////////////////////////
        //                                                                                                //
        // Warning! The Google Local Search API has been officially deprecated as of November 1, 2010.    //
        // It will continue to work as per our deprecation policy,                                        //
        // but the number of requests you may make per day will be limited.                               //
        //                                                                                                //
        //The Google Local Search API provides a JavaScript interface to embed                            //
        //Google Maps results in your website or application. Some common uses of this API include:       //
        //                                                                                                //
        //    Displaying localized results to a search query.                                             //
        //   Building a searchable map that displays query results.                                       //
        //    Creating static map images containing local search results.                                 //
        //    Dynamically create driving directions from a central point to a search result.              
        ///////////////////////////////////////////////////////////////////////////////////////////
  
                   map.addControl(new google.maps.LocalSearch(), new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,10)));
          
                    GSearch.setOnLoadCallback(LoadMapSearch);

        
        }
    };

})(jQuery);


