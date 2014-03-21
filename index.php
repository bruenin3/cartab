<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script type="text/javascript" charset="utf-8" src="getlocation.js"></script>
<script type="text/javascript" src="http://fgnass.github.com/spin.js/spin.js"></script>
<title>CarTab</title> 
</head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">		
$.fn.spin = function(opts) {
			this.each(function() {
				var $this = $(this),
					spinner = $this.data('spinner');
 
				if (spinner) spinner.stop();
				if (opts !== false) {
				  opts = $.extend({color: $this.css('color')}, opts);
				  spinner = new Spinner(opts).spin(this);
				  $this.data('spinner', spinner);
				}
			});
			return this;
		};
		$(function() {
	$(".Button").click(function(e) {
				var opts = {
				  lines: 12, 
				  length: 7, 
				  width: 5, 
				  radius: 10, 
				  color: '#fff', 
				  speed: 1, 
				  trail: 66,
				  shadow: true 
				};
								$("#spin").show().spin(opts);
});
});
</script>
<body style="font-family: 'Montserrat', sans-serif; font-size: 13px; color: white;">
<div id="body">
<div id="top">
  <div id="top"><p id="toploc">Current Location: San Francisco, CA</p></div><div id="spin" style="display:none;"></div><p id="header">cartab</p>
  <input type="button" class="Button" id="getLocation" onclick="getLocation()" value="find me"/>
  <form action="index.php" method="post" id="Address">
    <p>start address: 
        <input type="text" name="start" id="start">
        <br>
        end address:
        <input type="text" name="end" id="end">
  <br><br>
        <input type="submit" class="Button" name="submit" id="submit" value="submit">
    </p>
</form>
<div id="map" style="display:none; width: 250px; height: 200px; font-family: Montserrat, sans-serif;"></div> 
<br><div id="duration"></div> 
<div id="distance"></div> 
<div id="distance2"></div> 
<div id="distance3"></div>
<script type='text/javascript' src="address.js"></script></div></div>
</body> 
<script type="text/javascript" src="analytics.js"></script>
</html>
