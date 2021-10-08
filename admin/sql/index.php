<?php 
include("usuario.php");
$user = new Usuario;
$user->killSession();
header("Location: ../");

 ?>