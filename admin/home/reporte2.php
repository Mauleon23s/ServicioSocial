<?php
ob_start();
include("../sql/usuario.php");
$ts = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: $ts");
header("Last-Modified: $ts");
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");
session_start();
$user = new Usuario();
    
if(!isset($_SESSION["token"]))
{
    header("Location: ../");
}
include ("../php/header.php");
ob_end_flush();
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="../../css/acatlan.css" />
    <link rel="stylesheet" type="text/css" href="../../css/styles.css" />  
    <script type="text/javascript" src="../../js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="../../js/funciones.js"></script> 
    <script type="text/javascript" src="script.js"></script>
</head>



<body>
    <div id="contenedor"></div>

  <div class="container"></div>
<h3>Reporte General</h3>
<form id="option" method="post" action="">
    <label>Elige una opción</label>
    <select name="valor" id="valor" required="">
        <option value="">Elige una opción</option>
        <option value="1">Por periodo</option>
        <option value="2">Por fecha de registro</option>
    </select>
    <input type="button" name="opcion" id="opcion" value="Elegir">
</form>

<div id="opt1">
<br><hr> 
<label>Selecciona el periodo que deseas visualizar</label>
<br>
<form id="rep_periodo" method="post" action="">
    <br>
<?php 
    include("../sql/consultas.php");
    $perio=mysqli_fetch_array($peri);
?>
<label> Periodos : </label>
<select name="periodo_" id="periodo_" required="">
        <option value="">Seleccione un periodo</option>
        <?php
        $cursos = tra_per();
        foreach ($cursos as $rows) {
            echo " <option value='" . $rows[0] . "'> " . utf8_encode($rows[0]) . " </option> ";
        }
        ?>
        <br>
</select>
<input type="submit" id="imp_rep1" value="Guardar Reporte" />
<input type="button" name="ver_rep1" id="ver_rep1" value="Visializar">
</form>
</div>
<div id="opt2"> 
<br><hr>
    <label>Selecciona fecha de registo </label>
    <br><br>
    <form id="rep_registro" method="post" action="reporteexcel2.php">
        <label>Desde </label><input type="date" name="data1" id="data1" required="">
        <label> hasta </label>
        <input type="date" name="data2" id="data2" required="">
        <br>
        <input type="button" name="ver_rep2" id="ver_rep2" value="Visializar">
        <input type="submit" name="imp_rep2" id="imp_rep2" value="Guardar Reporte">
    </form>
</div>
<br>

<div id="resp2"></div>
<div id="demo"></div>


</body>
<script>


</script>
</html>
<?php 
include ("../php/footer.php");

 ?>


    
