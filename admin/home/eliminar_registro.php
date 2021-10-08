<?php 
require_once '../../sql/conexion.php';

if (isset($_POST['id'])) {


$id = $_POST['id'];

$udt = $mysqli->query("DELETE FROM usuario_curso WHERE id_usuario_curso = '$id'");
if ($udt) {
  echo "Eliminado correctamente";
}
else
{
  echo "error";
}
  
}



 ?>