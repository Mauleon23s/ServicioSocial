<?php 
require_once '../../../sql/conexion.php';

if (isset($_POST['id'])) {


$id = $_POST['id'];

$udt = $mysqli->query("DELETE FROM profesores WHERE id_profesores = '$id'");
if ($udt) {
  echo "Eliminado correctamente";
}
else
{
  echo "1";
}
  
}
 ?>