<?php ob_start();
include("../sql/usuario.php");
$ts = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: $ts");
header("Last-Modified: $ts");
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");
//var_dump($_POST);
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
  <div class="contenedor">
     <div class="login">
      <form method="POST" action="">
        <br>
        
        <h3>Historial de Cursos</h3>

      </form>
     </div>
     <section>

            <?php  
include("../sql/consultas.php");
            if($historial != null)
                {
                    ?>
            <table class="caja" border="1px">
            <thead>
            <th class="th1">Registro</th>
            <th class="th1">Nombre del Alumno</th>
            <th class="th1">Correo</th>
            <th class="th1">Curso</th>
            <th class="th1">calificacion</th>
            <th class="th1">Nombre del Profersor</th>
            <th class="th1">Periodo</th>
            <th class="th1">Editar </th>
            </thead>
            <tbody id="myTable">
            <?php 
                $inc = 1;
       
                while ($var=mysqli_fetch_array($historial)) { ?>
            <tr id="<?php echo $var['id_usuario_curso'] ?>">
              
                <td class="td1" data-target="numerico"> <?php echo $inc; ?> </td>
                <td class="td1" data-target="nombre"> <?php echo $var['nombre']."&nbsp".$var['apellido_paterno']."&nbsp".$var['apellido_materno']; ?> </td>   
                <td class="td1" data-target="correo"> <?php echo $var['correo']; ?> </td>
                <td class="td1"data-target="curso"> <?php echo $var['curso']; ?> </td>
                <td class="td1"data-target="calificacion"> <?php echo $var['calificacion']; ?> </td>
                <td class="td1" data-target="profesor"> <?php echo $var['nombre_prof']."&nbsp".$var['ap_p_prof']."&nbsp".$var['ap_m_prof']; ?> </td>     
                <td class="td1" data-target="periodo"> <?php echo $var['periodo']; ?> </td>
                <td class="td1"><a href="#" data-role="update" data-id="<?php echo $var['id_usuario_curso']; ?>" ><input type="radio" class="entrada_dato" id="editar" name="editar" value="" ></a></td>
            </tr> 
        

            <?php
            $inc++;

             } ?>
            </tbody>
       
            </table>
            <?php } ?>
        </section>
        <div>
          <!-- Trigger the modal with a button -->

        </div>
        <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Calificar</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nombre del alumno :</label>
                  <input type="text" id="nombre" class="form-control" disabled="disabled"></input>
                </div>
                <div class="form-group">
                  <label>Nombre del curso :</label>
                  <input type="text" id="curso" class="form-control"  disabled="disabled"></input>
                </div>
                <div class="form-group">
                  <label>Calificacion :</label>
                  <input type="numerico" id="calificacion" class="form-control"></input>
                </div>
                <input type="hidden" id="userid" class="form-control"></input>
              </div>
              <div class="modal-footer">
                <a href="#" id="save" class="btn btn-primary pull-right" style="text-decoration:none"> Guardar </a>
                <a href="#" id="delete" class="btn btn-danger pull-right" style="text-decoration:none"> Eliminar </a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
              </div>
            </div>

          </div>
        </div>
    </div>
</body>
<script>
  //Carga los datos
  $(document).ready(function(){
    $(document).on('click','a[data-role=update]',function(){
      var id = $(this).data('id');
      var nombre = $('#'+id).children('td[data-target=nombre]').text();
      var curso = $('#'+id).children('td[data-target=curso]').text();
      var calificacion = $('#'+id).children('td[data-target=calificacion]').text();
      var profesor = $('#'+id).children('td[data-target=profesor]').text();
      var periodo = $('#'+id).children('td[data-target=periodo]').text();
      $('#nombre').val(nombre);
      $('#curso').val(curso);
      $('#calificacion').val(calificacion);
      $('#profesor').val(profesor);
      $('#periodo').val(periodo);
      $('#userid').val(id);
      $('#myModal').modal('toggle');

    });

    //cambiar calificacion
    $('#save').click(function(){
      var id = $('#userid').val();
      var calificacion = $('#calificacion').val();
      if(calificacion >= 5  && calificacion <=10){

      var url = "editar_calificacion.php";
      $.ajax({
        method : 'POST',
        url : url ,
        data : {id:id,calificacion:calificacion},
        success : function(resp){
          alert("Calificacion Guardada");
          $('#'+id).children('td[data-target=calificacion]').text();
          $('#myModal').modal('toggle');
          location.reload();
          //window.Location : "index.php" ;
        }

      })
    }else{
      alert("Calificacion invalida");
      return false;
    }
    });

    //eliminar registros
     $('#delete').click(function(){
      var id = $('#userid').val();
      var calificacion = $('#calificacion').val();
  
      var url = "eliminar_registro.php";
      $.ajax({
        method : 'POST',
        url : url ,
        data : {id:id},
        success : function(resp){
          alert("Calificacion Eliminada");
          $('#'+id).children('td[data-target=calificacion]').text();
          $('#myModal').modal('toggle');
          location.reload();
          //window.Location : "index.php" ;
        }

      })
    
    });
  })

</script>

</html>
<?php 
include ("../php/footer.php");

 ?>

    
