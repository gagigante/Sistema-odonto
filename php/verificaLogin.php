<?php
	// if(!isset($_SESSION)){
	// 	session_start();
	// } 

	if($_SERVER["HTTPS"] == "on")
	{
		header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		// exit();
	}

	if($_SESSION["logado"]==0){ 
		header("Location: login.php");
	}	
?>