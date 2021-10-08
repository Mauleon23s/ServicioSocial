<?php
include("sql/usuario.php");
$ts = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: $ts");
header("Last-Modified: $ts");
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");
include("php/header_index.php");
session_start();
$user = new Usuario();
if(!empty($_POST))
{
    if($user->add($_POST))
    {
        //print_r($_SESSION);
    }
    //echo $user->error;
}
echo isset($_SESSION["token"]);	
if(isset($_SESSION["token"]) ==1)
{
    header("Location: admin/home/index2.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" type="text/css" href="../css/acatlan.css" />
	<link rel="icon" href="/img/iconx.png">
	
</head>
<body>
	<div class="contenedor">
     <div class="login">
    	<form method="POST" action="">
    		<h3>REGISTRO</h3>
    		<div class="input">
    			<label>Usuario</label>
    			<input type="text" name="username">
    		</div>
                <div class="input">
                <label>Nombre</label>
                <input type="text" name="nombre">
            </div>
            <div class="input">
                <label>Apelldio Paterno</label>
                <input type="text" name="apellido_p">
            </div>
            <div class="input">
                <label>Apellido Materno</label>
                <input type="text" name="apellido_m">
            </div>
            <div class="input">
                <label>Correo</label>
                <input type="mail" name="mail">
            </div>
    		<div class="input">
    			<label>Contrase&ntilde;a</label>
    			<input type="password" name="pwd">
    		</div>
    		<button>Registrarme</button>
    	</form>
     </div>
    </div>
</body>
</html>
<?php 
include("php/footer.php");
 ?>