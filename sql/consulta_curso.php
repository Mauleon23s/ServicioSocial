<?php 
require_once 'conexion.php';
function traer_curso() {
    $dbo = conexion_pdo();
    //$val = $mysqli->query("select max(periodo) from periodo_curso where estatus='true'");
    $query = "select * from cursos inner join periodo_curso on periodo_curso.id_curso=cursos.id_curso where periodo_curso.estatus='true' and periodo_curso.periodo=(select max(periodo) from periodo_curso where estatus='false') ";
    $resultado = $dbo->prepare($query);
    $parametros = array();
    $resultado -> execute($parametros);
    $datos = $resultado->fetchAll();
    $dbo = null;
    return $datos;
}

 ?>