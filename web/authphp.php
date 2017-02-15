<?php
//session_start();
if (!empty($_POST["txtemail"]) && !empty($_POST["txtpasword"])){
	//vemos si el usuario y contraseña es váildo
	switch ($_SESSION["nivel"]) { 
		case "1":
			if ($_POST["txtemail"]==$_SESSION["txtemail"] && $_POST["txtpasword"]==$_SESSION["txtemail"]){ 
				//usuario y contraseña válidos 
				//defino una sesion y guardo datos 
				session_start(); 
				$_SESSION["autentificado"]= "SI"; 
				header ("Location: web/mapxinit.php");	
			}else {
				session_start();
				if((empty($_SESSION["txtemail"])) && (empty($_SESSION["txtpasword"]))){
					
					$_SESSION["txtemail"] = $_POST["txtemail"];
					$_SESSION["txtpasword"] = $_POST["txtpasword"];
				} 
				 $_SESSION["errorusuario"] = "si";
				//si no existe le mando otra vez a la portada 
				header("Location: signin.php"); 
			} 
		break;
		case "2":
			if ($_POST["txtemail"]==$_SESSION["txtemail"] && $_POST["txtpasword"]==$_SESSION["txtemail"]){ 
				//usuario y contraseña válidos 
				//defino una sesion y guardo datos 
				session_start(); 
				$_SESSION["autentificado"]= "SI"; 
				header ("Location: web/mapxinit.php");	
			}else {
				session_start();
				if((empty($_SESSION["txtemail"])) && (empty($_SESSION["txtpasword"]))){
					
					$_SESSION["txtemail"] = $_POST["txtemail"];
					$_SESSION["txtpasword"] = $_POST["txtpasword"];
				} 
				 $_SESSION["errorusuario"] = "si";
				//si no existe le mando otra vez a la portada 
				header("Location: login.php"); 
			} 
		break;
		default:
			header("Location: ../index.php");
	}
}
?>