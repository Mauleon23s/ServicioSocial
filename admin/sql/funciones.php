<?php 

class validar
{

	function __construct(){	
	require_once('../sql/conexion.php');
	$this->conexion = $mysqli;
	//$this->conexion = conectar();
	}

function mostrar_registros($valor){
	$sql = "SELECT * FROM usuario_curso where id_usuario like '%".$valor."%' or id_periodo like '%".$valor."%'";
	$this->conexion->set_charset('utf8');
	$resultado = $this->conexion->query($sql);
	$array = array();
	while ( $re = $resultado->fetch_array()) {
		$arreglo = $re;
	}
	return$arreglo;
}

function actualizar($calif, $id_)
	{
		$sql = "UPDATE usuario_curso SET calificacion ='$calif' WHERE id_usuario_curso = '$id_' ";
		if ($this->conexion->query($sql)) {
			return true;
		}
		else
		{
			return false;
		}
	}
}

$inst = new validar();
if( $inst -> actualizar(8,61)) {
	echo "Se actualizo correctamente";
}
else {
	echo "no se actualizo nada";
}

 ?>