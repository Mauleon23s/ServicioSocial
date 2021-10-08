<?php 
require_once '../../../sql/conexion.php';

if (isset($_POST['id']) ) {

$nombre_p = trim($_POST['nombre_p'], ' ');
$ap_p = trim($_POST['ap_p'], ' ');
$ap_m = trim($_POST['ap_m'], ' ');
$telefono = trim($_POST['telefono'], ' ');
$correo = trim($_POST['correo'], ' ');
$procedencia = trim($_POST['procedencia'], ' ');
$id = $_POST['id'];

$udt = $mysqli->query("UPDATE profesores SET nombre_prof='$nombre_p', ap_p_prof='$ap_p', ap_m_prof='$ap_m', telefono='$telefono', correo_prof='$correo', procedencia='$procedencia' WHERE id_profesores='$id'");
if ($udt) {
  echo "Guardado correctamente";
}
else
{
  echo "1";
}
  
}



 ?>