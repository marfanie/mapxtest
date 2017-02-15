<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<title>Mapx - Mi propio mapa</title>
<!-- BOOTSTRAP -->
<link href="vendor/twbs/bootstrap/dist/js/bootstrap.min.js" rel="stylesheet" />
<!-- ScreenMT -->
<link href="web/css/scland01mt.css" rel="stylesheet" type="text/css" media="only screen and (min-width:768px)" />
<link href="web/css/scmapmt.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require_once('vendor/autoload.php');

$_SESSION["txtemail"] = "";
$_SESSION["txtpasword"] = "";
$_SESSION["txtnombre"] = "";
$_SESSION["nivel"] = "0" ;
$_SESSION["autenticado"] = "NO";
$_SESSION["errorusuario"] = "NO";

?>
<script>
function registro(){
	var nav = document.querySelector("nav");
	nav.setAttribute("value","N");
	document.forms.item(0).submit();
}
</script>
<header>
	<div class="wrapper">
	<div class="logo jumbotron">	
    	Mapx
    </div>
    <nav>
    	<button class="btn btn-secondary header-button secondary-button">Iniciar Sesión</button> 
        <button id="navregistrar" onClick="registro()" class="btn btn-primary header-button primary-button">Registrarse</button>
	</nav>
    </div>
</header>
<div class="row">
<div class="col-12 col-m-12 col-s-100">
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
<div class="col-4 col-m-12 col-s-100 wrapper">
  <form classe="form-inline" action="web/signin.php" method="post" name="signin01" target="_self" id="signin01">
  <label class="sr-only" for="txtemail">E-mail</label>
    <input class="form-control mb-2 mr-sm-2 mb-sm-0" name="txtemail" type="text" id="txtemail" placeholder="E-mail" />
    <button class="btn btn-primary primary-btn primary-button" name="btnlogin" id="btnlogin" type="submit">Registrarse</button><input id="nave" name="nave" type="hidden" value="S" />
  </form>
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