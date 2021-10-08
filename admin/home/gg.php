<?php 
require_once '../../sql/conexion.php';


$data1 = '2018-01-09';
$data2 = '2018-10-02';


$sql =  $mysqli->query("SELECT * from usuario_curso where fecha_registro between '$data1 00:00:00' and '$data2 23:59:59'");


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

<?php  
$cont=1;
 while ($var=mysqli_fetch_array($sql)) { ?>
            <tr >
              	<td> <?php echo $cont++; ?></td>
                <td > <?php echo $var['id_usuario_curso']; ?> </td>   
                <td > <?php echo $var['id_usuario']; ?> </td>
                <td > <?php echo $var['calificacion']; ?> </td>
                <td > <?php echo $var['id_periodo']; ?> </td>
                <td> <?php echo $var['fecha_registro'] ?></td>
            </tr> 

        <?php } 

print_r($sql);
echo "<br>";
var_dump($sql);


 ?>