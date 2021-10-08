<?php
session_start();
//$val = $_POST['id_registro'];
if(isset($_POST['id_registro'])) {
include ("conexion.php");
$dbo = conexion_pdo();
$id_curp = $_POST['id_registro'];
$id_c = trim($id_curp);
$query = "select * from usuarios where curp=:curp";
$resultado = $dbo->prepare($query);
$parametros = array(
    ':curp' => $id_c
);
$resultado->execute($parametros);
$datos = $resultado->fetchAll();
if ($resultado->rowCount() == 0) {
    echo "0";
     $_SESSION['id_']= $id_c;
} else {
    echo "1";
    $_SESSION['id_']= $id_c;
}
$dbo = null;
}
else{
echo "3";

}
?>