<?
session_start();
require_once('datos_conexion/IMEC.php');
require_once("./modelos/accesos.php");
$id=0;
if(!empty($_GET)){#Cerrar sesión

if (@$_GET["P"]=='cs') {//Cerrar sesión por orden
	$_SESSION["USER"]='';
			session_destroy();
			require "view/login.php";
			exit();
	}

	if (isset($_GET["P"])) {#verifica que haya una variable "N" por método "GET"  
	//echo '{"Est":"hola","Est2":"mundo"}';
	require "./controladores/Peticiones_".$_GET["P"].".php";//Requiere un archivo en el directorio "view/modulos/" con el nombre 'Modulo_"Valor de la variable N".php'
	exit();
	}
}
if (!@$_SESSION["USER"]) {#en caso de no estar cargada la sesión 
	require "view/login.php";#Vista de acceso
}else if(!empty($_GET)){#si están cargada las variables de sesión y recibo un envió de variables por GET
	if (isset($_GET["N"])) {#verifica que haya una variable "N" por método "GET"  
include 'view/static/head.php';
	#head
	require "view/modulo/Modulo_".$_GET["N"].".php";//Requiere un archivo en el directorio "view/modulos/" con el nombre 'Modulo_"Valor de la variable N".php'
include 'view/static/footer.php';
	#footer
	}
	else if (isset($_GET["I"])) {#verifica que haya una variable "I" por método "GET"
	#Solicita el archivo "IMEC.php" que contiene un objeto con métodos Insertar,Modificar,Eliminar,Consultar.
		require "indexBackend/insert/I_".$_GET["I"].".php";//Requiere un archivo en el directorio "indexBackend/insert/" con el nombre 'I_"Valor de la variable I".php'
	}
}


else{#si están cargada las variables de sesión
	include 'view/static/head.php';
		require "view/main.php";#requiere la vista del inicio de la aplicación 
	include 'view/static/footer.php';
}
 ?>