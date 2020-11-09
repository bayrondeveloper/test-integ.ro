<?php 
/*
date_default_timezone_set('America/Bogota');
	$serv="209.97.187.251";
	$user="catablet_v1";
	$pass="catabletBayronyGabriel";		
	$db="catablet_v1";
	$type = "mysqli";
$mysqli = new mysqli($serv, $user,  $pass, $db);

if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}
$mysqli->set_charset("utf8");
*/

date_default_timezone_set('America/Bogota');
	$serv="localhost";
	$user="root";
	$pass="";		
	$db="catablet";
	$type = "mysqli";
$mysqli = new mysqli($serv, $user,  $pass, $db);

if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}
$mysqli->set_charset("utf8");


?>
