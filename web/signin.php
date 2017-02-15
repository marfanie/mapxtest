<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Mapx - Registrar</title>
<!-- BOOTSTRAP -->
<link href="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js" rel="stylesheet" />
<!-- ScreenMT -->
<link href="css/scland01mt.css" rel="stylesheet" type="text/css" media="only screen and (min-width:768px)" />
<link href="css/scformmt.css" rel="stylesheet" type="text/css" />
<link href="css/scmapmt.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require_once '../vendor/autoload.php';

$nave = "";
$dir_page = "";
$_SESSION["nivel"] = "1";
// define variables and set to empty values
$emailErr = $passwordErr = "";
$email = $password = "";

if (!empty($_POST["nave"])){
	$nave = test_input($_POST["nave"]);
}
if ($nave != "N"){
	if (!empty($_POST["txtemail"])){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  			if (empty($_POST["txtemail"])) {
    			$emailErr = "Se requiere Email";
  			} else {
    			$email = test_input($_POST["txtemail"]);
    // check if e-mail address is well-formed
    			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      				$emailErr = "Formato inválido de Email"; 
    			} else {
					$_SESSION["txtemail"] = $email;
				}
  			}
		}
  
  		if (empty($_POST["txtpasword"])) {
    		$passwordErr = "Se requiere Contraseña";
  		} else {
    		$password = test_input($_POST["txtpasword"]);
			
			$_SESSION["txtpasword"] = $password;
  		}
	}
	if (!empty($_POST["txtnombre"])){
		$_SESSION["txtnombre"] = $_POST["txtnombre"];
	}
	$dir_page = "login.php";
} else {
	$dir_page = htmlspecialchars($_SERVER["PHP_SELF"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<script>
function ingresa(){
	var email = document.getElementById('txtemail').value;
    var password = document.getElementById('txtpasword').value;
        if (email.length < 4) {
          alert('Se requiere Email válido.');
          return;
        }
        if (password.length < 4) {
          alert('Se requiere Contraseña válida.');
          return;
        };
	firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
	//this.auth.createUserWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
        // [START_EXCLUDE]
    if (errorCode == 'auth/weak-password') {
        alert('La contraseña es muy débil.');
    } else if(errorCode != 'auth/network-request-failed') {
			alert(errorMessage);
    	}
    	console.log(error);
		//document.location.href=("authphp.php");
		alert('lleguele');
		window.open("authphp.php","_self");
        // [END_EXCLUDE]
    });
	//abrirSesion(email,password);
	//document.forms.item(0).submit();
	//window.open("authphp.php","_self");
};

function abrirSesion(sc_email,sc_password){
	var email = sc_email;
    var password = sc_password;
	firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
	  // Handle Errors here.
	  var errorCode = error.code;
	  var errorMessage = error.message;
	  if(errorCode != 'auth/network-request-failed') {
	  	alert(errorCode+ " " +errorMessage);
	  	console.log(error);
	  }
	  // ...
	});
	
	firebase.auth().onAuthStateChanged(function(user) {
  		if (user) {
    		window.open("authphp.php","_self");
		}
	});
};

/*function seteaSesion(){
	var nave = document.getElementById("nave");
	//nave.setAttribute("value","S");
	nave = "S";onChange="seteaSesion()"
}*/
</script>

<header>
<div class="wrapper">
<div class="logo">Mapx</div>
</div>
</header>

<div id="alert-auth" class="alert alert-warning alert-dismissible fade show" role="alert">
<?php if ((!empty($_SESSION["errorusuario"])) && ($_SESSION["errorusuario"] == "si")) { ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <?php echo "<strong>AVISO!</strong> Hubo error en la Autenticación." ;
  $_SESSION["errorusuario"] = "NO" ; }?>
</div>

<div class="row-rev">
<div class="col-4 col-m-12">
<form action="<?php echo htmlspecialchars($dir_page);?>" method="post" name="signin02" target="_self" id="signin02">
  <p>
  <label class="sr-only" for="txtnombre">Nombre</label>
    <input name="txtnombre" type="text" id="txtnombre" placeholder="Nombre" />
  </p>
  <p>
  <label class="sr-only" for="txtemail">E-mail</label>
    <input type="text" name="txtemail" id="txtemail" required placeholder="e-mail@ejemplo.com" value="<?php 
	if (!empty($_POST["txtemail"])) { 
	echo htmlspecialchars($_POST['txtemail']) ; } ; ?>" />
  </p>
  <p>
  <label class="sr-only" for="txtpasword">Contraseña</label>
    <input  type="password" name="txtpasword" id="txtpasword" required placeholder="Contraseña"
    value="" />
  </p>
  <p>
  <button onClick="ingresa()" class="btn btn-primary primary-btn primary-button" type="submit" name="btnregistrar" id="btnregistrar">Registrarse</button>
  <input name="nave" type="hidden" value="S" />
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
<footer class="footer col-12 col-m-12">
Empieza a usar Mapx desde ahora!
</footer>
<!-- FIREBASE -->
<script src="https://www.gstatic.com/firebasejs/3.6.9/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBiN-F0JbBd_ZG80rBbugMqfqEu6Ml8DAA",
    authDomain: "mapxtest.firebaseapp.com",
    databaseURL: "https://mapxtest.firebaseio.com",
    storageBucket: "mapxtest.appspot.com",
    messagingSenderId: "627139871929"
  };
  firebase.initializeApp(config);
</script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>