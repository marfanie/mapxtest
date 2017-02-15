<head>
<title>Untitled Document</title>
</head>

<body>

<?php 
if (($_POST["txtemail"]<>"") and ($_POST["txtpasword"]<>"")) {
	$t_email = $_POST["txtemail"];
	$t_password = $_POST["txtpasword"];
	//echo ($t_email);
	//echo ($t_password);
}
?>

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
  
  var email = <?php echo ($t_email); ?>;
  var password = <?php echo ($t_password); ?>;
  alert(email||": "||password);
  //Authentication
  firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  alert(errorCode||": "||errorMessage);
});
</script>


<!--<script src="https://www.gstatic.com/firebasejs/3.6.9/firebase.js"></script>
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
  firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  // ...
});
</script>-->
</body>
</html>