<?php
session_start();
include ("../sql/conexion.php");
$dbo = conexion_pdo();
$dbo->beginTransaction();


$query = "insert into usuarios(id_curso, cupo, periodo, id_profesores, fecha_inicio, fecha_fin, horario, ubicacion, hora)"
        . " values(:id_curso,:cupo,:periodo,:id_profesores,:fecha_inicio,:fecha_fin,:horario,:ubicacion,:hora)";
$resultado = $dbo->prepare($query);
$parametros = array(
    ':id_curso' => $_POST['curso_'],
    ':cupo' => $_POST['cupo'],
    ':periodo' => $_POST['periodo'],
    ':id_profesores' => $_POST['profesor'],
    ':fecha_inicio' => $_POST['fecha_inicio'],
    ':fecha_fin' => $_POST ['fecha_fin'],
    ':horario' => $_POST['horario'],
    ':ubicacion' => $_POST['ubicacion'],
    ':hora' => $_POST['hora']
);
$resultado->execute($parametros);

var_dump($resultado);

$dbo->commit();
$dbo = null;
?>

