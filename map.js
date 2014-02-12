   var directionsService = new google.maps.DirectionsService();
   var directionsDisplay = new google.maps.DirectionsRenderer();

   var myOptions = {
     zoom:7,
     mapTypeId: google.maps.MapTypeId.ROADMAP
   }

   var map = new google.maps.Map(document.getElementById("map"), myOptions);
   directionsDisplay.setMap(map);

   var request = {
       origin: '<?php if (!empty($_POST['start'])) {
echo $_POST['start']; 
	   } else { echo "1 Infinite Loop, Cupertino, CA"; } ?>',
       destination: '<?php if (!empty($_POST['end'])) {
echo $_POST['end']; 
	   } else { echo "1 Infinite Loop, Cupertino, CA"; } ?>',
       travelMode: google.maps.DirectionsTravelMode.DRIVING
   };

   directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
		  
		 // Cost
         document.getElementById('distance').innerHTML += 
           Math.round( (3+(response.routes[0].legs[0].distance.value*0.000621371*1.5)+(response.routes[0].legs[0].duration.value/60*.30)) *100 ) /100;
		   
         document.getElementById('distance2').innerHTML += 
           Math.round( (3.5+(response.routes[0].legs[0].distance.value*0.000621371*1.90)+(response.routes[0].legs[0].duration.value/60*.40)) *100 ) /100;

         document.getElementById('distance3').innerHTML += 
           Math.round( (3.5+(response.routes[0].legs[0].distance.value*0.000621371*2.75)+(response.routes[0].legs[0].duration.value/60*.55)) *100 ) /100;

         // Time
         document.getElementById('duration').innerHTML += 
            Math.round( (response.routes[0].legs[0].duration.value/60) *100 ) / 100 + " minutes";
		
         directionsDisplay.setDirections(response);
      }
   });
