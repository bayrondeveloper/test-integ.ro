<?php

if (@$_POST['form_sup']=='aAJd15Ff5a6s65dFfa56svmiJremoiH4iidiRsadiurjeg' && !empty($_POST['cript'])) 
{
	$cript=$_POST['cript'];

	 if ($idInsertado=$DB->Eliminar('movies','cript="'.$cript.'"')) 
	 	{
			echo "Se ha eliminado de la base de datos";
			exit();
		}else{
		
			echo "error al intentar eliminar";
			exit();
		}
	
}


if (!empty($_POST)) 
{

	if (@$_POST['form']=='peli' && !empty($_POST['title']) && !empty($_POST['year']))
		{//datos
		$Res['Est']=false;
	    $Res['Men']="Hubo un error.";
		$title 	=$DB->Valores($_POST['title']);
		$year 	=$DB->Valores($_POST['year']);
		$sinop 	=$DB->Valores($_POST['sinop']);
		$edit 	=$_POST['edit'];
		$cript      =md5(date('Y-m-d h:i:s A'));


		//Validaciones backend de formulario
		
		if(strlen($year) <= 4 && $year <= date('Y')){
		 }else{
			$Res['Est']=false;
			$Res['Men']="Debe tener mínimo 4 caracteres y ser menor al presente año";
			echo json_encode($Res);
			exit();
		 }

		if($edit==1){

		$cripedit  =$DB->Valores($_POST['cripedit']);
				if ($idInsertado=$DB->Actualizar('movies','
					title="'.$title.'",
					year="'.$year.'",
					sinop="'.$sinop.'"
					','cript="'.$cripedit.'"')) {
				
					$Res['Est']=true;
					$Res['Men']="Actualizado con éxito";
					echo json_encode($Res);

				}else{
					
					$Res['Est']=false;
					$Res['Men']="Error al actualizar los datos";
					echo json_encode($Res);

				}
				exit();
		}

	
			if ($idInsertado=$DB->Insertar('movies','title,year,sinop,cript',
						'"'.$title.'",
						"'.$year.'",
						"'.$sinop.'",
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
				$Res['Men']="Por favor revise los campos título y año, no pueden quedar vacíos";
				echo json_encode($Res);
					exit();
			}
}else{

	$Res['Est']=false;
			$Res['Men']="Por favor revise los campos título y año, no pueden quedar vacíos";
			echo json_encode($Res);
				exit();
}


?>