<?php

include ("../../sql/conexion.php");

$profes = $mysqli->query("SELECT * from profesores ");

$curso_on = $mysqli->query("select * from cursos ");

?>




