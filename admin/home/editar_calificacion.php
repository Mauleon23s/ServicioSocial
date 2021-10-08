<?php 
require_once '../../sql/conexion.php';

if (isset($_POST['calificacion'])) {

$calificacion = $_POST['calificacion'];
$calificacion = trim($calificacion,' ');
$id = $_POST['id'];

$udt = $mysqli->query("UPDATE usuario_curso SET calificacion='$calificacion' WHERE id_usuario_curso='$id'");
if ($udt) {
  echo "Guardado correctamente";
}
else
{
  echo "error";
}
  
}



 ?>