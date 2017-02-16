<?php session_start(); ?>
<!DOCTYPE="html">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<title>Mapx - Mi propio mapa</title>
<!-- BOOTSTRAP -->
<link href="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js" rel="stylesheet" />
<!-- ScreenMT -->
<link href="css/scland01mt.css" rel="stylesheet" type="text/css" media="only screen and (min-width:768px)" />
<link href="css/scmapmt.css" rel="stylesheet" type="text/css" />
<link href="css/sctogglemt.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script>
function salida(){
	var nav = document.querySelector("nav");
	nav.setAttribute("value","N");
	document.forms.item(0).submit();
}
</script>
<!--div class="container">
    <!-- This checkbox will give us the toggle behavior, it will be hidden, but functional >
    <input id="toggle" type="checkbox">

    <!-- IMPORTANT: Any element that we want to modify when the checkbox state changes go here, being "sibling" of the checkbox element >

    <!-- This label is tied to the checkbox, and it will contain the toggle "buttons" >
    <label class="toggle-container" for="toggle">
        <!-- If menu is open, it will be the "X" icon, otherwise just a clickable area behind the hamburger menu icon >
        <span class="button button-toggle"></span>
    </label>

    <!-- The nav menu >
    <nav class="nav">
        <a class="nav-item" href="">Ver lugares ingresados</a>
        <a class="nav-item" href="">Añadir nuevo lugar</a>
    </nav>
</div -->
<header>
	<div class="wrapper">
	<div class="logo jumbotron">	
    	Mapx
    </div>
    <nav>
    	<button id="btnUsuario" formaction="#" class="btn btn-secondary header-button secondary-button"><? print($_SESSION["txtnombre"]) ; ?></button> 
        <button id="btnSalir" formaction="logout.php" class="btn btn-primary header-button primary-button">Cerrar Sesión</button>
	</nav>
    </div>
</header>

<div class="row">
<div class="menu container col-3">
	<!-- This checkbox will give us the toggle behavior, it will be hidden, but functional -->
    <input id="toggle" type="checkbox">

    <!-- IMPORTANT: Any element that we want to modify when the checkbox state changes go here, being "sibling" of the checkbox element -->

    <!-- This label is tied to the checkbox, and it will contain the toggle "buttons" -->
    <label class="toggle-container" for="toggle">
        <!-- If menu is open, it will be the "X" icon, otherwise just a clickable area behind the hamburger menu icon -->
        <span class="button button-toggle"></span>
    </label>

    <!-- The nav menu -->
    <nav class="nav flex-column">
        <a class="nav-item" href="">Ver lugares ingresados</a>
        <a class="nav-item" href="">Añadir nuevo lugar</a>
    </nav>
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

<footer class="footer col-12 col-m-12">
Empieza a usar Mapx desde ahora!
</footer>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>