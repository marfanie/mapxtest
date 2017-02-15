<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

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
<script>
firebase.auth().signOut().then(function() {
  // Sign-out successful.
}, function(error) {
  // An error happened.
  alert(error.code + '' + error.message);
});
</script>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>

<script>
document.location.href=("../index.php");
</script>

</body>
</html>