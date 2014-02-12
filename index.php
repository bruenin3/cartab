<!DOCTYPE html>
<html><head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, height=device-height, target-densitydpi=device-dpi"/>
<title>CarTab</title> 
</head>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css">
<body style="font-family: 'Montserrat', sans-serif; font-size: 13px; color: white;"><div id="container" align="center">
<p id="header">cartab</p>
<script type="text/javascript" charset="utf-8">
   function getLocation(){
      console.log("Entering getLocation()");
      if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(
      displayCurrentLocation,
      displayError,
      { 
        maximumAge: 3000, 
        timeout: 5000, 
        enableHighAccuracy: true 
      });
    }else{
      console.log("No geolocation support");
    } 
      console.log("Exiting getLocation()");
    };
    function displayCurrentLocation(position){
      var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    getAddressFromLatLang(latitude,longitude);
    }
   function  displayError(error){
    var errorType = {
      0: "Unknown error",
      1: "Permission denied by user",
      2: "Position is not available",
      3: "Request time out"
    };
    var errorMessage = errorType[error.code];
    if(error.code == 0  || error.code == 2){
      errorMessage = errorMessage + "  " + error.message;
    }
    alert("Error Message " + errorMessage);
  }
    function getAddressFromLatLang(lat,lng){
      var geocoder = new google.maps.Geocoder();
        var latLng = new google.maps.LatLng(lat, lng);
        geocoder.geocode( { 'latLng': latLng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[1]) {
            console.log(results[1]);
			var form = document.getElementById('Address');
            form.elements.start.value = (results[1].formatted_address);
          }
        }else{
          alert("Geocode was not successful for the following reason: " + status);
        }
        });
    }
    </script>
  </head>
  <body>

  <input type="button" class="Button" id="getLocation" onclick="getLocation()" value="find me"/>
    <form action="index.php" method="post" id="Address">
      <p>
        Start Address: 
        <input type="text" name="start" id="start">
        <br>
        End Address:
        <input type="text" name="end" id="end">
  <br><br>
        <input type="submit" class="Button" name="submit" id="submit" value="submit">
      </p>
</form>
<div id="map" style="width: 250px; height: 200px; font-family: Montserrat, sans-serif;"></div> 
<br><div id="duration"></div> 
<div id="distance"></div> 
<div id="distance2"></div> 
<div id="distance3"></div>
<script type='text/javascript'>
    $("#Address").submit(function(event) {
      event.preventDefault();
      var $form = $( this ),
          url = $form.attr( 'action' );
      var posting = $.post( url, { start: $('#start').val(), end: $('#end').val() } );
var start = $('#start').val();
var end = $('#end').val();
posting.done(function( data ) {
   var directionsService = new google.maps.DirectionsService();
   var directionsDisplay = new google.maps.DirectionsRenderer();
   var myOptions = {
     zoom:7,
     mapTypeId: google.maps.MapTypeId.ROADMAP
   }
   var map = new google.maps.Map(document.getElementById("map"), myOptions);
   directionsDisplay.setMap(map);
   var request = {
       origin: start,
       destination: end,
       travelMode: google.maps.DirectionsTravelMode.DRIVING
   };
   directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
         document.getElementById('distance').innerHTML = 
           "Uber cost: $" + Math.round( (3+(response.routes[0].legs[0].distance.value*0.000621371*1.5)+(response.routes[0].legs[0].duration.value/60*.30)) *100 ) /100;
         document.getElementById('distance2').innerHTML = 
           "Lyft cost: $" + Math.round( (3.5+(response.routes[0].legs[0].distance.value*0.000621371*1.90)+(response.routes[0].legs[0].duration.value/60*.40)) *100 ) /100;
         document.getElementById('distance3').innerHTML = 
           "Cab cost: $" + Math.round( (3.5+(response.routes[0].legs[0].distance.value*0.000621371*2.75)+(response.routes[0].legs[0].duration.value/60*.55)) *100 ) /100;
         document.getElementById('duration').innerHTML = 
            "Time: " + Math.round( (response.routes[0].legs[0].duration.value/60) *100 ) / 100 + " minutes";
         directionsDisplay.setDirections(response);
      }
   });
  });
    });
</script>
<script type="text/javascript">
   </script> <br><br>
</div>
</body> 
</html>
