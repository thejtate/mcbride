<div id="novel" style="position: absolute;left:600px; width:360px; height:600px; text-align:left">

  <p>
    <input type="text" id="location" style="width:300;" >
  <p>

    <input type="text" id="mouse" style="width:300;" >

  </p>

</div>

<div id="map" style="position: absolute;left:10px;width:512px; height:400px"></div>



<script type="text/javascript">
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
  var markerD = new GMarker(point, {icon:icon, draggable: true}); 
  map.addOverlay(markerD);

  markerD.enableDragging();

  GEvent.addListener(markerD, "drag", function(){
    document.getElementById("location").value=markerD.getPoint().toUrlValue();
  });


  var point = new GLatLng(60,25);
  var markerD2 = new GMarker(point, {icon:G_DEFAULT_ICON, draggable: true}); 
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


  //]]>
</script>
