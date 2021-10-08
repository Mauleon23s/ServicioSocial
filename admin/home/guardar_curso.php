<?php 
require_once '../../sql/conexion.php';
$curso = $_POST['curso'];

$add = $mysqli->query("INSERT INTO cursos(curso) VALUES('$curso')");
if ($add) {
  echo "1";
}
else
{
  echo "0";
}

 ?>