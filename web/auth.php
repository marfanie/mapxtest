<?php 
//vemos si el usuario y contraseña es váildo 
if ($_POST["txtemail"]==$_SESSION["txtemail"] && $_POST["txtpasword"]==$_SESSION["txtemail"]){ 
   	//usuario y contraseña válidos 
   	//defino una sesion y guardo datos 
   	session_start(); 
    $_SESSION["autentificado"]= "SI"; 
   	header ("Location: web/mapxinit.php");	
}else { 
   	//si no existe le mando otra vez a la portada 
   	header("Location: signin.php?errorusuario=si"); 
} 
?>