<?php 

require_once '../../sql/conexion.php';

$id = $_POST['id'];
$cupo = $_POST['cupo'];
$cupo = trim($cupo,' ');
$estatus = $_POST['estatus'];
$estatus = trim($estatus,' ');
$periodo = $_POST['periodo'];
$periodo = trim($periodo,' ');
$ubicacion = $_POST['ubicacion'];
$ubicacion = trim($ubicacion,' ');

if ($id === '' || $cupo === '' || $estatus === '' || $periodo === '' || $ubicacion === '') {
  echo "1";
  # code...
}
else
{
	$udt = $mysqli->query("UPDATE periodo_curso SET estatus='$estatus', cupo='$cupo', periodo='$periodo', ubicacion='$ubicacion' WHERE id_periodo='$id'");
if ($udt) {
  echo "2";
}
else
{
  echo "error";
}

}



 ?>