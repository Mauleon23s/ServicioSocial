
<?php 
//session_start();
include ("../sql/conexion.php");

$id_curso =(int) $_POST['curso_'];
$cupo = utf8_encode($_POST['cupo']);
$periodo = $_POST['periodo'];
$id_profesores =(int) $_POST['profesor'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST ['fecha_fin'];
$horario = $_POST['horario'];
$ubicacion = $_POST['ubicacion'];
$hora = $_POST['hora'];
$boton = $_POST['registro_c'];



if ($id_curso !='' and $cupo != '' and $periodo != '' and $id_profesores != '' and $fecha_inicio != '' and $fecha_fin != '' and $horario != '' and $ubicacion != '' and $hora != '') {
	# code...

$query = "INSERT INTO `periodo_curso` (`id_periodo`, `id_curso`, `estatus`, `cupo`, `fecha_registro`, `periodo`, `id_profesores`, `fecha_inicio`, `fecha_fin`, `horario`, `ubicacion`, `hora`) VALUES (NULL, '$id_curso', 'true', '$cupo', CURRENT_TIMESTAMP, '$periodo', '$id_profesores', '$fecha_inicio', '$fecha_fin', '$horario', '$ubicacion', '$hora');";


  

  if($mysqli -> query($query)===TRUE){
    echo "<script>alert('Se guardo correctamente el registro');</script>";
  }else{
      echo "<script>alert('Ocurrio un error al guardar los datos');</script>";
  }
}
else{
	 echo "<script>alert('Tienes que llenar todos los campos');</script>";
}


$conn = NULL;
$mysqli = NULL;

 ?>
