<?php 

if(!isset($_POST['nombre_prof']) || !isset($_POST['ap_p_prof']) || !isset($_POST['ap_m_prof']) || !isset($_POST['telefono']) || !isset($_POST['correo']) || !isset($_POST['procedencia'])){
	echo "error";
}else
{
require_once '../../sql/conexion.php';
$nombre_prof = $_POST['nombre_prof'];
$ap_p_prof = $_POST['ap_p_prof'];
$ap_m_prof = $_POST['ap_m_prof'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$procedencia = $_POST['procedencia'];
 
 $query = $mysqli->query("INSERT INTO profesores(nombre_prof,ap_p_prof,ap_m_prof,telefono,correo_prof,procedencia) VALUES('$nombre_prof','$ap_p_prof','$ap_m_prof','$telefono','$correo','$procedencia')");
 if ($query) {
 	echo "1";
 }
}
 ?>