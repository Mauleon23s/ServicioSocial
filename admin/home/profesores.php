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
        <h3>Listado de Docentes</h3>

      </form>
     </div>
     <br>
<a href="add_profesores.php" class="btn btn-info" charset="" style="text-decoration:none">Agregar Profesor</a>
<br>
<hr>
<br>
     <section>

            <?php  
include("../sql/consultas.php");
            if($profes != null)
                {
                    ?>
            <table class="caja" border="1px">
            <thead>
            <th class="th1">Registro</th>
            <th class="th1">Nombre Profesor</th>
            <th class="th1">Telefono</th>
            <th class="th1">Correo</th>
            <th class="th1">Procedencia</th>
            <th class="th1">Editar </th>
            </thead>
            <tbody id="myTable">
            <?php 
                $inc = 1;
       
                while ($var=mysqli_fetch_array($profes)) { ?>
            <tr id="<?php echo $var['id_profesores'] ?>">
              
                <td class="td1" data-target="numerico"> <?php echo $inc; ?> </td>
                <td class="td1" data-target="nombre_prof"> <?php echo $var['nombre_prof']."&nbsp".$var['ap_p_prof']."&nbsp".$var['ap_m_prof']; ?> </td>
                <td class="td1" data-target="nombre_p" hidden=""> <?php echo $var['nombre_prof']; ?> </td>
                <td class="td1" data-target="ap_p" hidden=""> <?php echo $var['ap_p_prof']; ?> </td>
                <td class="td1" data-target="ap_m" hidden=""> <?php echo $var['ap_m_prof']; ?> </td>
                <td class="td1" data-target="telefono"> <?php echo $var['telefono']; ?> </td>
                <td class="td1"data-target="correo"> <?php echo $var['correo_prof']; ?> </td>
                <td class="td1"data-target="procedencia"> <?php echo $var['procedencia']; ?> </td>
                <td class="td1"><a href="#" data-role="update" data-id="<?php echo $var['id_profesores']; ?>" ><input type="radio" class="entrada_dato" id="editar" name="editar" value="" ></a></td>
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
                <h4 class="modal-title">Modificar datos personales</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Profesor :</label>
                  <input type="text" id="nombre" class="form-control" disabled=""></input>
                </div>
                 <div class="form-group">
                  <label>Nombre profesor :</label>
                  <input type="text" id="nombre_p" class="form-control" ></input>
                </div>
                <div class="form-group">
                  <label>Apellido paterno :</label>
                  <input type="text" id="ap_p" class="form-control" ></input>
                </div>
                <div class="form-group">
                  <label>Apellido materno :</label>
                  <input type="text" id="ap_m" class="form-control" ></input>
                </div>
                <div class="form-group">
                  <label>Telefono (10dig):</label>
                  <input type="numerico" id="telefono" class="form-control" maxlength="10"></input>
                </div>
                <div class="form-group">
                  <label>Correo :</label>
                  <input type="email" id="correo" class="form-control"></input>
                </div>
                <div class="form-group">
                  <label>Procedencia :</label>
                  <input type="text" id="procedencia" class="form-control"></input>
                </div>
                <input type="hidden" id="userid" class="form-control"></input>
              </div>
              <div class="modal-footer">
                <a href="#" id="save" class="btn btn-primary pull-right" style="text-decoration:none"> Guardar </a>
                <a href="#" id="delete" class="btn btn-danger pull-right" style="text-decoration:none"> Eliminar </a>
                <button type="button" class="btn btn-info" data-dismiss="modal" >Cancelar</button>
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
      var nombre = $('#'+id).children('td[data-target=nombre_prof]').text();
      var nombre_p = $('#'+id).children('td[data-target=nombre_p]').text();
      var telefono = $('#'+id).children('td[data-target=telefono]').text();
      var correo = $('#'+id).children('td[data-target=correo]').text();
      var procedencia = $('#'+id).children('td[data-target=procedencia]').text();
      var ap_p = $('#'+id).children('td[data-target=ap_p]').text();
      var ap_m = $('#'+id).children('td[data-target=ap_m]').text();
      $('#nombre').val(nombre);
      $('#nombre_p').val(nombre_p);
      $('#ap_p').val(ap_p);
      $('#ap_m').val(ap_m);
      $('#telefono').val(telefono);
      $('#correo').val(correo);
      $('#procedencia').val(procedencia);
      $('#userid').val(id);
      $('#myModal').modal('toggle');
    });

    //cambiar calificacion
    $('#save').click(function(){
      var id = $('#userid').val();
      var nombre_p = $('#nombre_p').val();
      var ap_p = $('#ap_p').val();
      var ap_m = $('#ap_m').val();
      var telefono = $('#telefono').val();
      var correo = $('#correo').val();
      var procedencia = $('#procedencia').val();
      if(nombre_p == ''  || ap_p == '' || ap_m == '' || telefono == '' || correo == '' || procedencia == ''){
      alert("Llene todos los campos");
      return false;
    }else{
      var url = "editar/editar_profesor.php";
      $.ajax({
        method : 'POST',
        url : url ,
        data : {id:id,nombre_p:nombre_p, ap_p:ap_p, ap_m:ap_m, telefono:telefono, correo:correo, procedencia:procedencia},
        success : function(resp){
            if(resp == 1){
                alert("Error al ingresar los datos...")
            }else{
          alert("Actualizado Correctamente !!");
          $('#'+id).children('td[data-target=nombre_p]').text();
          $('#myModal').modal('toggle');
          location.reload();
        }
    }
      })
    }
    });

    //eliminar registros
     $('#delete').click(function(){
      var id = $('#userid').val();
      var url = "editar/eliminar_profesor.php";
      $.ajax({
        method : 'POST',
        url : url ,
        data : {id:id},
        success : function(resp){
            if (resp == 1) {
                alert("Ocurrio un error!");
            }else{   
          alert("Registro Eliminado Correctamente");
          $('#'+id).children('td[data-target=calificacion]').text();
          $('#myModal').modal('toggle');
          location.reload();
            }
        }
      }) 
    });
  })
</script>
</html>
<?php 
include ("../php/footer.php");
 ?>

    
