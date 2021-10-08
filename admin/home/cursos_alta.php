<?php
include("../sql/usuario.php");

session_start();
$user = new Usuario();
    
if(!isset($_SESSION["token"]))
{
    header("Location: ../");
}
include ("../php/header.php");
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

</head>
<body>
  <?php 
//include("../sql/datos.php");

   ?>
  <div class="contenedor">
        <h3 style="text-align : center;">Registro de Cursos</h3>
      <div>
        <form id="formulario" method="post" action="">
          <label>Agregar curso</label>
          <input type="text" name="curso" id="curso">
          <input type="button" name="guarda_curso" id="guarda_curso" value="Guardar">
        </form>

      </div>
      
    </div>
  
</body>
<script>
  $(document).ready(function(){
    $('#guarda_curso').click(function(){
      var curso = $('#curso').val();
      var url = "guardar_curso.php"
      $.ajax({
        type:'POST',
        url : url,
        data: {curso:curso},
        success: function(data){
          if(data == 1){
            alert("Se guardo correctamente");
          }else{
            alert("Ocurrio un error");
          }
          $('#curso').val("");
        }
      });

    });
  });
</script>
</html>
<?php 
include ("../php/footer.php");




?>