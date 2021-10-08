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
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="contenedor">
     <div class="login">
      <form method="POST" action="">
        <br>
        <h3>Cursos</h3>

      </form>
     </div>
     <section>
<br>
<a href="add_curso.php" class="btn btn-info" charset="" style="text-decoration:none">Agregar curso</a>
<br>
<hr>
<br>
            <?php  
include("../sql/consultas.php");
            if($historial != null)
                {
                    ?>
            <table class="caja" border="1px">
            <thead>
            <th class="th1">Registro</th>
            <th class="th1">Nombre del Profesor</th>
            <th class="th1">Curso</th>
            <th class="th1">Cupo</th>
            <th class="th1">Periodo</th>
            <th class="th1">Estatus</th>
            <th class="th1">Horario</th>
            <th class="th1">Ubicación </th>
            <th class="th1">Editar </th>
            </thead>
            <tbody id="myTable">
            <?php 
                $inc = 1;
       
                while ($var=mysqli_fetch_array($cons2)) { ?>
            <tr id="<?php echo $var['id_periodo'] ?>">
              
                <td class="td1" data-target="numerico"> <?php echo $inc; ?> </td>
                <td class="td1" data-target="nombre"> <?php echo $var['nombre_prof']." ".$var['ap_p_prof']." ".$var['ap_m_prof']; ?> </td>   
                <td class="td1" data-target="curso"> <?php echo $var['curso']; ?> </td>
                <td class="td1" data-target="cupo"> <?php echo $var['cupo']; ?> </td>
                <td class="td1" data-target="periodo"> <?php echo $var['periodo']; ?> </td>
                <td class="td1" data-target="estatus"> <?php  if($var['estatus']==='true') echo "Activo"; else echo "Inactivo"; ?> </td>   
                <td class="td1" data-target="horario"> <?php echo $var['horario']." de"." &nbsp". $var['hora']; ?> </td>
                <td class="td1" data-target="ubicacion"> <?php echo $var['ubicacion']; ?> </td>
                <td class="td1"><a href="#" data-role="update" data-id="<?php echo $var['id_periodo']; ?>" ><input type="radio" class="entrada_dato" id="editar" name="editar" value="" ></a></td>
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
                <h4 class="modal-title">Modificar Datos del curso</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nombre del Profesor :</label>
                  <input type="text" id="nombre" class="form-control" disabled="3"></input>
                </div>
                <div class="form-group">
                  <label>Curso :</label>
                  <input type="select" id="curso" class="form-control" disabled=""></input>
                </div>
                <div class="form-group">
                  <label>Cupo :</label>
                  <input type="text" id="cupo" class="form-control"></input>
                </div>
                <div class="form-group">
                  <label>Periodo :</label>
                  <input type="numerico" id="periodo" class="form-control"></input>
                </div>
                <div class="form-group">
                  <label>Estatus :<input id="estatus" disabled=""></input></label>
                  <select  id="estatus2" class="form-control">
                    <option value="true" >Activar</option>
                    <option value="false">Desactivar</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Ubicación :</label>
                  <input type="text" id="ubicacion" class="form-control"></input>
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
      var cupo = $('#'+id).children('td[data-target=cupo]').text();
      var calificacion = $('#'+id).children('td[data-target=calificacion]').text();
      var estatus = $('#'+id).children('td[data-target=estatus]').text();
      var ubicacion = $('#'+id).children('td[data-target=ubicacion]').text();
      var periodo = $('#'+id).children('td[data-target=periodo]').text();
      $('#nombre').val(nombre);
      $('#curso').val(curso);
      $('#cupo').val(cupo);
      $('#calificacion').val(calificacion);
      $('#ubicacion').val(ubicacion);
      $('#periodo').val(periodo);
      $('#estatus').val(estatus);
      $('#userid').val(id);
      $('#myModal').modal('toggle');


    });

    //cambiar calificacion
    $('#save').click(function(){
      var id = $('#userid').val();
      var cupo = $('#cupo').val();
      var periodo = $('#periodo').val();
      //var calificacion = $('#calificacion').val();
      var estatus = $('#estatus2').val();
      var ubicacion = $('#ubicacion').val();

      var url = "editar_periodo_curso.php";
      $.ajax({
        method : 'POST',
        url : url ,
        data : {id:id,cupo:cupo,periodo:periodo,estatus:estatus,ubicacion:ubicacion},
        success : function(resp){
          if (resp == 1) {
            alert("Error, ingrese todos los valores");
          }
          if (resp == 2) {
            alert("Se guardo correctamente")
          $('#'+id).children('td[data-target=periodo]').text();
          $('#myModal').modal('toggle');
          }
          else
            alert("Error, no se guardo el registro")
          //alert("Calificacion Guardada");
          location.reload();
          //window.Location : "index.php" ;
        }

      });
    
    });

    //eliminar registros
     $('#delete').click(function(){
      var id = $('#userid').val();
      var calificacion = $('#calificacion').val();
  
      var url = "eliminar_curso.php";
      $.ajax({
        method : 'POST',
        url : url ,
        data : {id:id},
        success : function(resp){
          if (resp == 2) {
            alert("No se puede eliminar este registro");
          }
          if (resp == 1) {
          alert("Registro eliminado");
          $('#'+id).children('td[data-target=calificacion]').text();
          $('#myModal').modal('toggle');
          }
          if (resp ==3) { alert("algo salio mal")}
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

    
