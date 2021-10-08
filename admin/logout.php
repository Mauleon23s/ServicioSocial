<?php
include("sql/usuario.php");
$user = new Usuario;
$user->killSession();
header("Location: ../admin/");

  ?>