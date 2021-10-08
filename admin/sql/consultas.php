<?php
//session_start();
include ("../../sql/conexion.php");
//$curp = $_SESSION['id_'];

function traer_cursos() {
    $curp = $_SESSION['id_'];
    $dbo = conexion_pdo();
    $query = "select * from cursos inner join periodo_curso on periodo_curso.id_curso=cursos.id_curso where periodo_curso.estatus='true'";
    $resultado = $dbo->prepare($query);
    $parametros = array();
    $resultado->execute($parametros);
    $datos = $resultado->fetchAll();
    $dbo = null;
    return $datos;
}
function tra_per() {
    $curp = $_SESSION['id_'];
    $dbo = conexion_pdo();
    $query = "SELECT DISTINCT periodo FROM periodo_curso";
    $resultado = $dbo->prepare($query);
    $parametros = array();
    $resultado->execute($parametros);
    $datos = $resultado->fetchAll();
    $dbo = null;
    return $datos;
}
function traer_curso() {
    $dbo = conexion_pdo();
    $query = "select * from cursos inner join periodo_curso on periodo_curso.id_curso=cursos.id_curso where periodo_curso.estatus='true'";
    $resultado = $dbo->prepare($query);
    $parametros = array();
    $resultado -> execute($parametros);
    $datos = $resultado->fetchAll();
    $dbo = null;
    return $datos;
}
function trae_curso() {
    $dbo = conexion_pdo();
    $query = $mysqli->query("SELECT curso from cursos inner join periodo_curso on periodo_curso.id_curso = cursos.id_curso where periodo_curso.estatus= true");
    $resultado = $dbo->prepare($query);
    $parametros = array();
    $resultado -> execute($parametros);
    $datos = $resultado->fetchAll();
    $dbo = null;
    return $datos;
}

function trae_profesores() {
    $dbo = conexion_pdo();
    $query = $mysqli->query("SELECT nombre_prof, ap_p_prof, ap_m_prof from profesores ");
    $resultado = $dbo->prepare($query);
    $parametros = array();
    $resultado -> execute($parametros);
    $datos = $resultado->fetchAll();
    $dbo = null;
    return $datos;
}
function todos_cursos() {
    $dbo = conexion_pdo();
    $query = "select * from cursos";
    $resultado = $dbo->prepare($query);
    $parametros = array();
    $resultado -> execute($parametros);
    $datos = $resultado->fetchAll();
    $dbo = null;
    return $datos;
}

function traer_carreras() {
    $dbo = conexion_pdo();
    $query = "select * from carrera";
    $resultado = $dbo->prepare($query);
    $parametros = array();
    $resultado->execute($parametros);
    $datos = $resultado->fetchAll();
    $dbo = null;
    return $datos;
}



// A partir de aqui se hacen las consultas de la parte de administtacion
function traer_periodos(){
    $dbo = conexion_pdo();
    $query= "select * from usuarios where Periodos!= null";
    $resultado = $dbo->prepare($query);
    $parametros = array();
    $resultado->execute($parametros);
    $datos = $resultado->fetchAll();
    $dbo = null;
    return $datos;


}
$historial = $mysqli->query("SELECT * FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso ORDER BY usuario_curso.id_usuario_curso DESC");
$cons2 = $mysqli->query("select * from periodo_curso inner join cursos on cursos.id_curso=periodo_curso.id_curso inner join profesores on profesores.id_profesores=periodo_curso.id_profesores order by periodo_curso.id_periodo "); // consulta para sacar los datos del curso y del profesor.

$cons3= $mysqli->query("select * from usuarios inner join cursos on cursos.id_curso=usuarios.id_curso where usuarios.id_curso=3");




$cursos1 = $mysqli->query("SELECT curso from cursos inner join periodo_curso on periodo_curso.id_curso = cursos.id_curso where periodo_curso.estatus= true");

$peri = $mysqli->query("SELECT periodo FROM periodo_curso WHERE periodo = (SELECT MAX(periodo) from periodo_curso)");

$profes = $mysqli->query("SELECT * from profesores ");

$curso_on = $mysqli->query("select * from cursos inner join periodo_curso on periodo_curso.id_curso=cursos.id_curso where periodo_curso.estatus=true");


$peri2 = $mysqli->query("SELECT periodo FROM periodo_curso")

?>




