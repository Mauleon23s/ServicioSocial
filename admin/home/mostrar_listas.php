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
    <div id="contenedor">
        <h3>Reporte de alumnos </h3>
    </div>
    <br>
    <div class="container"></div>
   <?php 
    include("../sql/consultas.php");
    $perio=mysqli_fetch_array($peri)
    ?>
<form method="post" id="formulario" action="reporteexcel.php">
  Elegir un curso de los existentes:
<select name="cursos_" id="cursos_">
                           
                                <option value="" >Seleccione un curso</option>
                                <option value="0" >mostrar todos</option>
                                <?php
                                $cursos = traer_cursos();
                                foreach ($cursos as $rows) {
                                    echo " <option value='" . $rows[0] . "'> " . utf8_encode($rows[1]) . " </option> ";
                                }
                                ?>
                                <br>
                                <br>
                            </select>

                            <br><br>
    Elegir un periodo :
<select name="periodo_" id="periodo_">
                                <option value="" >Seleccione un periodo</option>
                                <option value="0" >mostrar todos</option>
                                <?php
                                $cursos = tra_per();
                                foreach ($cursos as $rows) {
                                    echo " <option value='" . $rows[0] . "'> " . utf8_encode($rows[0]) . " </option> ";
                                }
                                ?>
                                <br>
                                <br>
                                
    
</select>
<br>
<input type="submit" name="reporte" id="reporte" value="reporte" >
</form>
<input type="button" id="btn-buscar" value="buscar" />
<br>
<hr>
<br>
<div id="resp"></div>
<div id="demo"></div>


</body>
</html>
<?php 
include ("../php/footer.php");

 ?>


    
