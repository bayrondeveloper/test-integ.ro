<?php 
class IMEC { 
	function __construct(){}
	function Valores($val){
		require("conexion.php");
		return $mysqli->real_escape_string($val);
	}
	function Encriptar($Variable){
		return sha1(md5('3@4gF$fTEm..'.$Variable));
	}
	function ArrSerialize($Var){
		if (strlen($Var)>3){
			$Arr1 = explode("&", $Var);
			foreach ($Arr1 as $value) {
				$Arr2 = explode("=", $value);
				$Arr3[]=$Arr2[1];
			}
			return $Arr3;
		}else{
			return $Var;
		}
	}
	function Insertar($tabIns,$valIns,$contIns,$condIns){
		  require("conexion.php");
		if ($condIns=="" || $condIns==null) {
		    $SQLI="INSERT INTO $tabIns($valIns) values($contIns)";
			$mysqli->query($SQLI);
		}else{
			$SQLI="INSERT INTO $tabIns ($valIns) values ($contIns) WHERE ($condIns)";
			$mysqli->query($SQLI);
		}
		return($mysqli->insert_id);
	}


	function Consultar($tab,$cond){
		  require("conexion.php");
		if ($cond=="" || $cond==null) {
			$SQL="SELECT * FROM $tab";
			$Row=$mysqli->query($SQL);
		}else{
			$SQL="SELECT * FROM $tab WHERE ($cond)";
			$Row=$mysqli->query($SQL);
		}
		return($Row->fetch_array());
	}
	function ConLista($tab,$cond){
		  require("conexion.php");
		if ($cond=="" || $cond==null) {
		 $SQL="SELECT * FROM $tab";
		}else{
		 $SQL="SELECT * FROM $tab WHERE $cond";
		}
		return($mysqli->query($SQL));
	}
	function Actualizar($tabAct,$datAct,$condAct){	
		  require("conexion.php");
		if ($condAct=="" || $condAct==null) {
		  $SQLA="UPDATE $tabAct SET $datAct";
		}else{
		  $SQLA="UPDATE $tabAct SET $datAct WHERE($condAct)";
		}
			if ($Row=$mysqli->query($SQLA)) {
				return true;
			}
				return false;
	}
	function Eliminar($tabEli,$condEli){
		  require("conexion.php");
		if ($condEli=="" || $condEli==null) {
		
		}else{
		     $SQLE="DELETE FROM $tabEli WHERE($condEli)";
		}
			if ($Row=$mysqli->query($SQLE)) {
				return true;
			}
				return false;
	}
	function Manual($Conten)
	{
		require("conexion.php");
		$SQLI=$Conten;	
		return($mysqli->query($SQLI));
	}	

	function validar_fecha($fecha){
	$valores = explode('-', $fecha);
	if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
		return true;
    }
		return false;
	}
	

}
$DB= new IMEC();
?>