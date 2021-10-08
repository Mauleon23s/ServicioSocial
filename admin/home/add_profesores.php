<?php ob_start();
//session_start();
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
include("../php/header.php");
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="../../css/acatlan.css" />
    <link rel="stylesheet" type="text/css" href="../../css/styles.css" />  
    <script type="text/javascript" src="../../js/jquery-1.5.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
  <div class="contenedor">
     <div class="add_profes">
      <form id="registro_profesores" method="post" action="">
        <h3>ALTA PROFESORES</h3>
            <div class="input">
                <label>NOMBRE</label>
                <input type="text" name="nombre_prof" id="nombre_prof" >
            </div>
            <div class="input">
                <label>APELLIDO PATERNO</label>
                <input type="text" id="ap_p_prof" name="ap_p_prof" >
            </div>
            <div class="input">
                <label>APELLIDO MATERNO</label>
                <input type="text" name="ap_m_prof" id="ap_m_prof" >
            </div>
            <div class="input">
                <label>TELEFONO(10 dig.)</label>
                <input type="numero" name="telefono" id="telefono" maxlength="10" >
            </div>
            <div class="input">
                <label>CORREO</label>
                <input type="email" name="correo" id="correo" >
            </div>
        <div class="input">
          <label>PROCEDENCIA</label>
          <input type="text" name="procedencia" id="procedencia" >
        </div>
        <input type="button" name="guarda_profesores" id="guarda_profesores" value="Registrar">
        
      </form>
     </div>
    </div>
    <div id="resp"></div>
</body>

<script>
  $(document).ready(function(){
    $('#nombre_prof').val("");
            $('#ap_p_prof').val("");
            $('#ap_m_prof').val("");
            $('#telefono').val("");
            $('#correo').val("");
            $('#procedencia').val("");

      $('#guarda_profesores').click(function(){
         if (verify_campos() == true) {
        var url = "alta_profesores.php";
        //salert("hola");
         $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#registro_profesores").serialize(),
           success: function(data)            
           {
          if (data==1) {
            alert("Se guardo correctamente");
            location.reload();
            $('#nombre_prof').val("");
            $('#ap_p_prof').val("");
            $('#ap_m_prof').val("");
            $('#telefono').val("");
            $('#correo').val("");
            $('#procedencia').val("");       

          }else{
            alert("Ocurrio un error");
          }           
           }
         });
      }
      });
function verify_campos() {
    $('.error').remove();

    if ($('#nombre_prof').val() == "" || $('#ap_p_prof').val() == "" || $('#ap_m_prof').val() == "" || $('#procedencia').val() == "") {
      $("#guarda_profesores").after("<span class='error'>Llene todos los campos. Por favor!</span>");
        return false;
    
  }

    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    if (!(regex.test($('#correo').val().trim()))) {
        $("#correo").focus().after("<span class='error'>Ingrese su correo correctamente. Por favor!</span>");
 
        return false;
    }

    if ($('#telefono').val() != "" ) {
    var al = /^\d{10}$/ ;
    if(!(al.test($('#telefono').val()))){
        $("#telefono").focus().after("<span class='error'>Ingrese su numero correctamente. Por favor!</span>");
        return false;
    }
}

    
    return true
}

    });

 
</script>

  <div>
    <a href="profesores.php">Atras</a>
  </div>

</html>
<?php 
include("../php/footer.php");
 ?>