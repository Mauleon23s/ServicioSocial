<?php 
require_once '../../sql/conexion.php';
$id =6;
if ($id != '') {
$udt = $mysqli->query("DELETE FROM periodo_curso WHERE periodo_curso.id_periodo = $id");
if ($udt) {
  echo "1";
}
else
{
  echo "2";
} 
}else
{
	echo "3";
}

 ?>