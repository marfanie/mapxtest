<!DOCTYPE="html">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Untitled Document</title>
<!-- ScreenMT -->
<link href="/mapxtest/web/css/scland01mt.css" rel="stylesheet" type="text/css" media="only screen and (min-width:768px)" />
<link href="/mapxtest/web/css/scmapmt.css" rel="stylesheet" type="text/css" />
</head>

<body>
<header>
	<div class="wrapper">
	<div class="logo">	
    	Mapx
    </div>
    <nav>
        <a href="/mapxtest/web/logout.php" target="_self" class="header-button primary-button">Cerrar Sesión</a>
	</nav>
    </div>
</header>

<div class="row">
<div class="menu">

</div>
<div class="main col-9 col-m-12">
	<div id=map></div>
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
</div>
</body>
</html>