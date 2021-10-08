<?php
ob_start();
include("sql/usuario.php");
$ts = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: $ts");
header("Last-Modified: $ts");
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate"); 
include ("php/header_index.php");
session_start();
$user = new Usuario;
if(!empty($_POST))
{
    if($user->login($_POST))
    {
        header("Location: home/index.php");
    }
}
if(isset($_SESSION["token"]))
{
    header("Location: home/index.php");
}
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>          
        <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="../css/acatlan.css" />
        <link rel="stylesheet" type="text/css" href="../css/styles.css" />
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />


</head>
<body>
    <br>
	<div class="contenedor">
     <div class="login"
     style="border: 1px">
    	<form style="border: 1px; " method="POST" id="sesion" action="">
    		<h3>Inicio de sesión</h3>
    		
    			<label>Usuario</label>
    			<input type="text" id="username" name="username" required="">
    		<br><br>
    		
    			<label>Contrase&ntilde;a</label>
    			<input type="password" id="pwd" name="pwd" required="">     
    		<br><br>
    		<button name="acceder" id="acceder">Ingresar</button>
    	</form>
     </div>
    </div>
</body>
<script>

</script>
</html>
   <?php
    include ('php/footer.php');
    ?>
