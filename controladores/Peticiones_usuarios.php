<?php

if (@$_POST['form_sup']=='aAJd15Ff5a6s65dFfa56svmiJremoiH4iidiRsadiurjeg' && !empty($_POST['cript'])) 
{
	$cript=$_POST['cript'];

	 if ($idInsertado=$DB->Eliminar('users','cript="'.$cript.'"')) 
	 	{
			echo "Se ha eliminado de la base de datos";
			exit();
		}else{
		
			echo "error al intentar eliminar";
			exit();
		}
	
}

if (!empty($_POST)) {

	if (@$_POST['form']=='user' && !empty($_POST['name']) && !empty($_POST['nickname'])  && !empty($_POST['clave1']))
		{//datos
		$Res['Est']=false;
	    $Res['Men']="Hubo un error.";
		$name 	=$DB->Valores($_POST['name']);
		$nickname 	=$DB->Valores($_POST['nickname']);
		$clave1 	=$DB->Valores($_POST['clave1']);
		$clave2 	=$DB->Valores($_POST['clave2']);
		$edit 	=$_POST['edit'];
		$cript      =md5(date('Y-m-d h:i:s A'));

		//Validaciones backend de formulario
		
		if(strlen($name) <= 5){
			$Res['Est']=false;
			$Res['Men']="El nombre debe tener mínimo 5 caracteres";
			echo json_encode($Res);
			exit();
		 }

		$caracter_allow = "/^[a-z0-9_]+$/i";
		$resultado = preg_match($caracter_allow, $nickname);
		if(!$resultado) {
		$Res['Est']=false;
		$Res['Men']="El nick name es requerido, único, solo puede contener letras, números y guión al
		piso";
		echo json_encode($Res);
		exit();
		}
		
		function validar_clave($clave,&$error_clave){
			if(strlen($clave) < 4){
			   $error_clave = "La clave debe tener al menos 4 caracteres";
			   return false;
			}
			if (!preg_match('`[A-Z]`',$clave)){
			   $error_clave = "La clave debe tener al menos una letra mayúscula";
			   return false;
			}
			if (!preg_match('`[0-9]`',$clave)){
			   $error_clave = "La clave debe tener al menos un caracter numérico";
			   return false;
			}
			$error_clave = "";
			return true;
		 }

		 if (validar_clave($clave1,$error_clave)){
		 }else{
			$Res['Est']=false;
			$Res['Men']=$error_clave;
			echo json_encode($Res);
			exit();

		 }


		if($clave1 != $clave2 OR empty($clave1) OR empty($clave2)){
		    $Res['Est']=false;
			$Res['Men']="Las claves deben ser iguales y no pueden quedar en blanco";
			echo json_encode($Res);
			exit();
		}
	

		if($edit==1){
			$ClaveEnc=$DB->Encriptar($clave1);

		$cripedit  =$DB->Valores($_POST['cripedit']);
				if ($idInsertado=$DB->Actualizar('users','
					name="'.$name.'",
					nickname="'.$nickname.'",
					passwd="'.$ClaveEnc.'"
					','cript="'.$cripedit.'"')) {
				
					$Res['Est']=true;
					$Res['Men']="Actualizado con éxito";
					echo json_encode($Res);

				}else{
					
					$Res['Est']=false;
					$Res['Men']="Error al actualizar los datos, intente con otro nombre de Nickname";
					echo json_encode($Res);

				}
				exit();
		}

			$ClaveEnc=$DB->Encriptar($clave1);
				
			if ($idInsertado=$DB->Insertar('users','name,nickname,passwd,cript',
						'"'.$name.'",
						"'.$nickname.'",
						"'.$ClaveEnc.'",
						"'.$cript.'" ','')) 
					{
					
						$Res['Est']=true;
						$Res['Men']="Se insertó correctamente el dato";
						echo json_encode($Res);

					}else{
					
						$Res['Est']=false;
						$Res['Men']="Error al guardar";
						echo json_encode($Res);

					}
					
				}else{

						$Res['Est']=false;
						$Res['Men']="No pueden quedar campos vacíos, por favor ingrese información.";
						echo json_encode($Res);
							exit();
					}

				
	}else
	{

		$Res['Est']=false;
				$Res['Men']="No pueden quedar campos vacíos, por favor ingrese información.";
				echo json_encode($Res);
					exit();
	}


?>