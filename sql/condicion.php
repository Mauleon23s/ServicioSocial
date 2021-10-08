<?php 
session_start();
include ("conexion.php");
$dbo = conexion_pdo();
$id_curp = $_POST['id_registro'];
$cursos = $_POST['cursos'];
$curso = trim($cursos);
$id_c = trim($id_curp);
$query = "SELECT * FROM `usuario_curso` INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso on periodo_curso.id_periodo= usuario_curso.id_periodo INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE usuarios.curp='$id_c' and cursos.curso='$curso'";
$resultado = $dbo->prepare($query);
$parametros = array(
    ':curp' => $id_c,
    ':curso' => $curso
);
$resultado->execute($parametros);
$datos = $resultado->fetchAll();
//var_dump($datos);
if ($datos) {
 echo "1";
 return true;
     $_SESSION['id_']= $id_c;
} else {
    echo "0";
    return false;
    $_SESSION['id_']= $id_c;
}
$dbo = null;




 ?>