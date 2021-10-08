<?php 
require_once '../../sql/conexion.php';

 $cons = $mysqli->query("select * from profesores");

 $arre = mysqli_fetch_array($cons);

 echo $arre['nombre_prof'];

 var_dump($cons);


 ?>