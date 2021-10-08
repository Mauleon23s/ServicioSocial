<?php

include ("conexion.php");
$dbo = conexion_pdo();
$dbo->beginTransaction();
$cons = "select * from usuarios where curp= $curp";

$query = "insert into usuarios(cuenta, curp, nombre, apellido_paterno, apellido_materno, correo, tipo, area, categoria, detalle_externo,adscripcion,id_carrera,id_curso)"
        . " values(:cuenta,:curp,:nombre,:apellido_p,:apellido_m,:correo,:int_ext,:area,:catego,:detalle,:adsc,:carrera,:cursos
        )";
$resultado = $dbo->prepare($query);
$parametros = array(
    ':curp' => $_POST['id_registro'],
    ':cuenta' => $_POST['cuenta'],
    ':nombre' => utf8_decode($_POST['nombre']),
    ':apellido_p' => utf8_decode($_POST['apellido_p']),
    ':apellido_m' => utf8_decode($_POST['apellido_m']),
    ':correo' => $_POST ['correo'],
    ':carrera' => $_POST['carrera'],
    ':int_ext' => $_POST['int_ext'],
    ':area' => $_POST['area'],
    ':catego' => $_POST['catego'],
    ':detalle' => $_POST['detalle'],
    ':adsc' => $_POST['adscripcion'],
    ':cursos' => $_POST['cursos']
);
$resultado->execute($parametros);

$query1 = $dbo->prepare("select max(id_usuario) as id from usuarios");
$query1->execute();
$data = $query1->fetchColumn();
echo "<br>";
$query4 = $dbo->prepare("select id_curso from usuarios where id_usuario=$data");
$query4->execute();
$cursos = $query4->fetchColumn();

$query5 = $dbo->prepare("select id_periodo from periodo_curso where id_curso=$cursos and estatus='true'");
$query5->execute();
$curso2 = $query5->fetchColumn();
echo "<br>";
echo "Hola";
echo "<br>";
echo "<br>";
echo $data;
echo "<br>";
echo "<br>";

$query10 = $dbo->prepare("select max(id_usuario_curso) as id from usuario_curso");
$query10->execute();
$data10 = $query10->fetchColumn();
echo "<br>";
if (isset($query10)) {
    $data10=$data10+1;
    echo $data10;
}
    echo "gg";
//echo $cursos;
echo "<br>";
echo $curso2;
echo "<br>";

//$query2 -> execute($parametros);

$dbo->commit();

echo "<br  >";
echo "<br>";



    $consulta = "insert into usuario_curso(id_usuario, calificacion,id_periodo)"." values ($data,'10', $curso2)";
     if($mysqli->query($consulta)==TRUE){
    echo "insertado correctamente";
  }else{
    echo "insertado incorrectamente";
  }

$dbo = null;
?>

