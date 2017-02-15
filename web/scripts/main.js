// JavaScript Document
'use strict';
//var auth;
//var database = firebase.database();
//var storage;
function MapxtestAuth(){
	this.checkSetup();
	
	this.btnRegistrar = document.getElementById('btnregistrar');
	//this.btnIngresar = document.getElementById('btningresar');
	this.txtnombre = document.getElementById('txtnombre');
	//this.ecorreo = document.getElementById('txtemail').value;
	//this.pclave = document.getElementById('txtpasword').value;
	//if ((this.ventry == '0') && (this.btnRegistrar === null)){
	this.btnRegistrar.addEventListener('click', this.handleSignUp());
	//} else if ((this.ventry == '0') && (this.btnIngresar === null)) {
	//this.btnIngresar.addEventListener('click',this.toggleSignIn());
	//}
	
	this.initFirebase();
}
// Sets up shortcuts to Firebase features and initiate firebase auth.
MapxtestAuth.prototype.initFirebase = function() {
  // Shortcuts to Firebase SDK features.
  this.auth = firebase.auth();
  this.database = firebase.database();
  this.storage = firebase.storage();
  // Initiates Firebase auth and listen to auth state changes.

  //this.auth.onAuthStateChanged(this.onAuthStateChanged.bind(this));
  this.auth.onAuthStateChanged(function(user) {
  if (user) { // User is signed in!
    // Get profile pic and user's name from the Firebase user object.
    //var profilePicUrl = user.photoURL;
    var nombre = user.displayName;

    // Set the user's profile pic and name.
    //this.userPic.style.backgroundImage = 'url(' + (profilePicUrl || '/images/profile_placeholder.png') + ')';
    this.txtnombre=document.getElementById('txtnombre');
	this.txtnombre.textContent = nombre;

    // Show user's profile and sign-out button.
    //this.txtnombre.setAttribute('hidden','true');
    //this.userPic.removeAttribute('hidden');
	//if ((this.ventry == '0') && (this.btnIngresar === null)){
    	//this.btnIngresar.setAttribute('hidden', 'true');
	//} else if ((this.ventry == '0') && (this.btnRegistrar === null)){
    // Hide sign-in button.
    //	this.btnRegistrar.setAttribute('hidden', 'true');
  	//}
    // We load currently existing chant messages.
    //this.loadMessages();
  } else { // User is signed out!
    // Hide user's profile and sign-out button.
    //this.txtnombre.removeAttribute('hidden');
    //this.userPic.setAttribute('hidden', 'true');
	//if ((this.ventry == '0') && (this.btnIngresar === null)){
    //this.btnIngresar.removeAttribute('hidden');
	//} else if ((this.ventry == '0') && (this.btnRegistrar === null)){
    // Show sign-in button.
    //this.btnRegistrar.removeAttribute('hidden');
	alert('Usuario no registrado');
	//window.open("../signin.php","_self");
	//}
  }
});
};

    /**
     * Handles the sign in button press.
     */
MapxtestAuth.prototype.toggleSignIn = function() {
      if (firebase.auth().currentUser) {
        // [START signout]
        this.auth.signOut();
        // [END signout]
      } else {
        var email = document.getElementById('txtemail').value;
        var password = document.getElementById('txtpasword').value;
        if (email.length < 4) {
          alert('Please enter an email address.');
          return;
        }
        if (password.length < 4) {
          alert('Please enter a password.');
          return;
        }
        // Sign in with email and pass.
        // [START authwithemail]
        this.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // [START_EXCLUDE]
          if (errorCode === 'auth/wrong-password') {
            alert('Wrong password.');
          } else {
            alert(errorMessage);
          }
          console.log(error);
          //document.getElementById('quickstart-sign-in').disabled = false;
          // [END_EXCLUDE]
        });
        // [END authwithemail]
      }
      //document.getElementById('quickstart-sign-in').disabled = true;
    }

MapxtestAuth.prototype.handleSignUp = function() {
	//var entryname = "";
	var email = document.getElementById('txtemail').value;
    var password = document.getElementById('txtpasword').value;
	var errorCod;
	//var email = this.ecorreo;
	//var password = this.pclave;
    if (email.length < 4) {
		alert('Por favor ingrese una dirección de e-mail.');
        return;
	}
    if (password.length < 4) {
        alert('Por favor ingrese una contraseña.');
        return;
    }
      // Sign in with email and pass.
      // [START createwithemail]
    firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
	//this.auth.createUserWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
        // [START_EXCLUDE]
    if (errorCode == 'auth/weak-password') {
        alert('La contraseña es muy débil.');
    } else {
		alert(errorMessage);
    }
    console.log(error);
        // [END_EXCLUDE]
    });
	//if (error.code == null){
		//window.open("../login.php","Mapx - Inicio Sesión","_self");
	//}
      // [END createwithemail]
 }
 
// Triggers when the auth state change for instance when the user signs-in or signs-out.
MapxtestAuth.prototype.onAuthStateChanged = function(user) {
  if (user) { // User is signed in!
    // Get profile pic and user's name from the Firebase user object.
    //var profilePicUrl = user.photoURL;
    var nombre = user.displayName;

    // Set the user's profile pic and name.
    //this.userPic.style.backgroundImage = 'url(' + (profilePicUrl || '/images/profile_placeholder.png') + ')';
    this.txtnombre.textContent = nombre;

    // Show user's profile and sign-out button.
    this.txtnombre.setAttribute('hidden','true');
    //this.userPic.removeAttribute('hidden');
	//if ((this.ventry == '0') && (this.btnIngresar === null)){
    	//this.btnIngresar.setAttribute('hidden', 'true');
	//} else if ((this.ventry == '0') && (this.btnRegistrar === null)){
    // Hide sign-in button.
    	this.btnRegistrar.setAttribute('hidden', 'true');
  	//}
    // We load currently existing chant messages.
    //this.loadMessages();
  } else { // User is signed out!
    // Hide user's profile and sign-out button.
    this.txtnombre.removeAttribute('hidden');
    //this.userPic.setAttribute('hidden', 'true');
	//if ((this.ventry == '0') && (this.btnIngresar === null)){
    //this.btnIngresar.removeAttribute('hidden');
	//} else if ((this.ventry == '0') && (this.btnRegistrar === null)){
    // Show sign-in button.
    this.btnRegistrar.removeAttribute('hidden');
	//}
  }
};

// Checks that the Firebase SDK has been correctly setup and configured. 
MapxtestAuth.prototype.checkSetup = function() {
  if (!window.firebase || !(firebase.app instanceof Function) || !window.config) {
    window.alert('You have not configured and imported the Firebase SDK. ' +
        'Make sure you go through the codelab setup instructions.');
  } else if (config.storageBucket === '') {
    window.alert('Your Firebase Storage bucket has not been enabled. Sorry about that. This is ' +
        'actually a Firebase bug that occurs rarely. ' +
        'Please go and re-generate the Firebase initialisation snippet (step 4 of the codelab) ' +
        'and make sure the storageBucket attribute is not empty. ' +
        'You may also need to visit the Storage tab and paste the name of your bucket which is ' +
        'displayed there.');
  }
};
 
//document.getElementById('btnRegistar').onclick = function(){
	//document.getElementById('btnRegistar').mapxtestauth = new MapxtestAuth();
//}

window.onload = function(){
	window.mapxtestauth = new MapxtestAuth();
}