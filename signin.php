<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Untitled Document</title>
<!-- ScreenMT -->
<link href="/mapxtest/css/scland01mt.css" rel="stylesheet" type="text/css" media="only screen and (min-width:768px)" />
</head>

<body>
<header>
<div class="wrapper">
<div class="logo">Mapx</div>
</div>
</header>
<div>
<form action="" method="post" name="signin02" target="_self" id="signin02">
  <p>
    <input name="txtnombre" type="text" id="txtnombre" />
  </p>
  <p>
    <input type="text" name="txtemail" id="txtemail" value="<?php 
	if (!empty($_GET["txtemail"])) { 
	echo htmlspecialchars($_GET['txtemail']) ; } ; ?>" />
  </p>
  <p>
    <input type="text" name="txtpasword" id="txtpasword" />
  </p>
  <p>
    <input class="primary-btn" type="submit" name="btnregistrar" id="btnregistrar" value="Registrarse" />
  </p>
</form>
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
</body>
</html>