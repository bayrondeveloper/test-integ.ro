<?
/**
 * 
 */ 
class accesos
{
	function __construct(){}
	function Ingresar($Nombre, $Clave){#crea Token en caso de conseguir el usuario en BD.
		$BD = new IMEC();
		$Fecha=date('Y-m-d');$Hora=date('G:i.s');
	 	$Clave=$BD->Encriptar($Clave);
		$Res["Men"]="Nombre o Clave de Acceso Erróneos, Por Favor Valide.";#mensaje por defecto.
		$Res["Est"]=false;#Estado De la Respuesta.
		$DatosUsu=$BD->Consultar("users","nickname='".$Nombre."' AND passwd='".$Clave."'");#consulta USuarios.
		
		if ($DatosUsu["nickname"]){
			$Id 				=$DatosUsu["nickname"];
			$_SESSION["USER"]=$DatosUsu["nickname"];
			$_SESSION["id_Usu"]=$DatosUsu["nickname"];
			$_SESSION["nombres_usuario"]=$DatosUsu["name"];
			$Res["Men"]			="Bienvenido.";
			$Res["Est"]			=true;
			# Creo token de sesión ............................
			$Res["Token"]		=$Token=$BD->Encriptar($Fecha.$Hora.rand(1,9999));
		}
		return json_encode($Res);
	}
	
	function Cerrar($Token){#Modifica el estado del token a desactivo
		$BD = new IMEC();
		$Res["Est"]=false;#error
		if ($BD->Actualizar("sesiones","id_EstSes=2","token_Ses='".$Token."'")) {
			$Res["Est"]=true;#realizado
		}
		return json_encode($Res);
	}

}
		$Accesos= new accesos();


?>