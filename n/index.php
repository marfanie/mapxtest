<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Mapx - Mi propio mapa</title>
<!-- ScreenMT -->
<link href="css/scland01mt.css" rel="stylesheet" type="text/css" media="only screen and (min-width:768px)" />
<link href="css/scmapmt.css" rel="stylesheet" type="text/css" />
<!-- TabletMT -->
<!--link href="/mapxtest/css/tablet01mt.css" rel="stylesheet" type="text/css" media="only screen and (min-width:480px)" /-->
<!-- SmartphoneMT -->
<!--link href="/mapxtest/css/smart01mt.css" rel="stylesheet" type="text/css" /-->
</head>

<body>

<header>
	<div class="wrapper">
	<div class="logo">	
    	Mapx
    </div>
    <nav>
    	<a href="#" class="header-button secondary-button">Iniciar Sesión</a> 
        <a href="../signin.php" target="_self" class="header-button primary-button">Registrarse</a>
	</nav>
    </div>
</header>
<div class="row">
<div class="col-12 col-m-12">
<div id="map"></div>
<script>

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWF4wv1ry582-p2O0vYwll6CIJ3ZpaR-Y&callback=initMap"
        async defer></script>
    
</div>
<div class="col-4 col-m-12 wrapper">
  <form action="../signin.php" method="post" name="signin01" target="_self" id="signin01">
    <input name="txtemail" type="text" id="txtemail" placeholder="E-mail" />
    <input class="primary-btn" name="btnlogin" id="btnlogin" type="submit" value="Registrarse" />
  </form>
</div>
</div>
<footer class="footer col-12 col-m-12">
Empieza a usar Mapx desde ahora!
</footer>
</body>
</html>