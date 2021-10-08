<?php ob_start();
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

include("../sql/datos.php");
include ("../php/header.php");
ob_end_flush();

?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="../../css/acatlan.css" />
    <link rel="stylesheet" type="text/css" href="../../css/styles.css" />  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../sql/consultas.php"></script>
    <script type="text/javascript" src="../../js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="../../js/funciones.js"></script> 

</head>
<body>
  <div class="contenedor">
        <h3 style="text-align : center;">Registro de Cursos por periodo</h3>
     <div class="login">
      <div>
      </div>
      <center>
        
      <form class="col s12" method="post" action="">
      <div class="row">
          
        <hr>
        <br>
        <div style="padding-left: 50px; padding-right: 600px;">

       <td>Seleccionar profesor: </td> <select id="profesor"  name="profesor" style="margin-left: 10px;">
        <option value="">Selecciona un profesor</option>
        <?php 
       while ($var=mysqli_fetch_array($profes)) {
       echo " <option value='" . $var['id_profesores'] . "'> " . utf8_encode($var['nombre_prof']) ."&nbsp". utf8_encode($var['ap_p_prof']) ."&nbsp". utf8_encode($var['ap_m_prof']) . " </option> ";
        }
         ?>
      </select>
<br>
<br>
       <td>Seleccionar curso: </td><select id="curso_" name="curso_"  style="margin-left: 10px;">
        <option value="">Selecciona un curso</option>
        <?php 
       while ($cur=mysqli_fetch_array($curso_on)) {
       echo " <option value='" . $cur['id_curso'] . "'> " . utf8_encode($cur['curso']) . " </option> ";
        }
         ?>
      </select>
      <br>
      <br>
      
      <td>Cupo: </td><input type="numero" id="cupo" name="cupo" style="margin-left: 10px;" >
      <br>
      <br>
       <td>Fecha inicio: </td><input type="date" id="fecha_inicio" name="fecha_inicio" style="margin-left: 10px;">
      <br>
      <br>
       <td>Fecha fin: </td><input type="date" name="fecha_fin" id="fecha_fin" style="margin-left: 10px;">
      <br>
      <br>
      <td>Periodo: </td><input type="text" id="periodo" name="periodo" value="" placeholder="2019-1">
      <br>
      <br>
      <td>Dias: </td><input type="text" name="horario" id="horario" value="" placeholder="Lunes y Miercoles">
      <br>
      <br>
      <td>Ubicacion: </td><input type="text" name="ubicacion" id="ubicacion" value="" placeholder="PCNET#" >
      <br>
      <br>
      <td>Hora: </td><input type="text" name="hora" id="hora" value="" placeholder="9:00am a 2:00pm" >

      <br>
      <br>
          
      <button type="submit" id="registro_c" name="registro_c" >Registrar</button>
      </div>

      </div>
    </form>
      </div>
      
     
      </center>
    </div>
<?php 
if(isset($_POST['registro_c'])){
  require_once '../sql/cursos2.php';
}

 ?>  
</body>
 

  <div>
    <br>
    <a href="cursos.php">Atras</a>
  </div>

</html>
<?php 
include ("../php/footer.php");




?>