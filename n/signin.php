<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Mapx - Registrar</title>
<!-- ScreenMT -->
<link href="css/scland01mt.css" rel="stylesheet" type="text/css" media="only screen and (min-width:768px)" />
<link href="css/scformmt.css" rel="stylesheet" type="text/css" />
<link href="css/scmapmt.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php
// define variables and set to empty values
$emailErr = $passwordErr = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Se requiere Email";
  } else {
    $email = test_input($_POST["txtemail"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Formato inválido de Email"; 
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Se requiere Contraseña";
  } else {
    $password = test_input($_POST["txtpasword"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<header>
<div class="wrapper">
<div class="logo">Mapx</div>
</div>
</header>
<div class="row-rev">
<div class="col-4 col-m-12">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ; ?>" method="post" name="signin02" target="_self" id="signin02">
  <p>
    <input name="txtnombre" type="text" id="txtnombre" placeholder="Nombre" />
  </p>
  <p>
    <input type="text" name="txtemail" id="txtemail" required placeholder="e-mail@ejemplo.com" value="<?php 
	if (!empty($_POST["txtemail"])) { 
	echo htmlspecialchars($_POST['txtemail']) ; } ; ?>" />
  </p>
  <p>
    <input type="password" name="txtpasword" id="txtpasword" required placeholder="Contraseña"
    value="<?php if (!empty($_POST["txtpasword"])) { 
	echo htmlspecialchars($_POST['txtpassword']) ; }  ?>" />
  </p>
  <p>
  <input class="primary-btn primary-button" type="submit" name="btnregistrar" id="btnregistrar" value="Registrarse" />
  <!--input class="primary-btn primary-button" type="submit" name="btningresar" id="btningresar" value="Iniciar Sesión" hidden /-->
  </p>
  <br />
  <p>
  Si ya estás registrado, ingresa <a href="login.php" target="_self">aquí</a>.</p>
</form>
</div>

<div class="col-8 col-m-12">
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

</div>
<!-- FIREBASE -->
<script src="https://www.gstatic.com/firebasejs/3.6.9/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCIM74CdXE9KNLNJFdouZrHFN02ybRUemc",
    authDomain: "mapx-ad00e.firebaseapp.com",
    databaseURL: "https://mapx-ad00e.firebaseio.com",
    storageBucket: "mapx-ad00e.appspot.com",
    messagingSenderId: "238032457149"
  };
  firebase.initializeApp(config);
</script>
<script src="scripts/main.js"></script>
</body>
</html>