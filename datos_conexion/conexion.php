<?php 


date_default_timezone_set('America/Bogota');
	$serv="localhost";
	$user="root";
	$pass="";		
	$db="peliculas";
	$type = "mysqli";
$mysqli = new mysqli($serv, $user,  $pass, $db);

if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}
$mysqli->set_charset("utf8");


?>
