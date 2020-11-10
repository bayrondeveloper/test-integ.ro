<?
if (!empty($_POST)) {
	if (@$_POST['form']=='login' && !empty($_POST['correo']) && !empty($_POST['clave'])) {//Login
		$correo =$DB->Valores($_POST['correo']);
		$clave	=$DB->Valores($_POST['clave']);
		$ResAccesos=$Accesos->Ingresar($correo,$clave);
		//CerrarAnteriores($ResAccesos["Token"]);
		echo $ResAccesos;

	}
	else if (@$_GET['form']=='cerrar') {//Cerrar token
			$_SESSION["USER"]='';
			session_destroy();
			echo '{"Est":true}';
	}
}


?>