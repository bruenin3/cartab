<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cartab - ride cheap</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="cover.css" rel="stylesheet">
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script type="text/javascript" charset="utf-8" src="getlocation.js"></script>
  </head>

  <body>

  <div class="site-wrapper">

    <div class="site-wrapper-inner">

      <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Cartab</h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="code.html">Code</a></li>
                <li></li>
              </ul>
            </div>
          </div>
          <div class="inner cover">
            <h1 class="cover-heading">Ride cheap.</h1>
            <p class="lead">Cartab is a simple application that lets you compare current pricing of ridesharing services and taxi cabs in real time, so you get the best deal for your ride.</p>
              <p>
                <input type="button" class="btn btn-lg btn-default" id="getLocation" onclick="getLocation()" value="find me"/>
              </p>
            <p></p>
            <form action="index.html" method="post" id="Address">
              <p>from address:</p>
              <p>
                <input name="start" type="text" class="textbox" id="start">
        </p>
              <p>to address:
              <p>
                <input type="text" name="end" id="end" class="textbox"></p>
                <br>
                <input type="submit" class="btn btn-lg btn-default" name="submit" id="submit" value="submit">
              </p>
            </form>
<div id="map" style="display:none; width: 250px; height: 200px; font-family: Montserrat, sans-serif;"></div> 
<br><div id="duration"></div> 
<div id="distance"></div> 
<div id="distance2"></div> 
<div id="distance3"></div><br>
<script type='text/javascript' src="address.js"></script>
</div>

      <div class="mastfoot">
            <div class="inner">
              <ul>
                 <a href="http://getbootstrap.com/">Bootstrap</a> . <a href="https://github.com/tbarrettwilsdon">Github</a> . Taylor Barrett-Wilsdon
              </ul>
            </div>
          </div>
      </div>
    </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/docs.min.js"></script>
<script type="text/javascript" src="analytics.js"></script>
</body>
</html>
