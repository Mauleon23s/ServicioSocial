<!DOCTYPE html>
<html>
<head> 
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
 
<?php
require_once '../../sql/conexion.php';

$con = $mysqli;

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$cursos_ = $con->real_escape_string($_POST['cursos_']);
$periodo_ = $con->real_escape_string($_POST['periodo_']);

if($cursos_== 0 and $periodo_ == 0)
{
    $historial = $con->query("SELECT * FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso  ORDER BY usuario_curso.id_usuario_curso DESC");
}
elseif ($cursos_!= 0 and $periodo_ != 0) {
$historial = $con->query("SELECT * FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.id_curso = '$cursos_' and periodo_curso.periodo='$periodo_' ORDER BY usuario_curso.id_usuario_curso DESC");
}
    elseif ($cursos_>0 and $periodo_==0) {
        $historial = $con->query("SELECT * FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.id_curso = '$cursos_' ORDER BY usuario_curso.id_usuario_curso DESC");
       
    }
        elseif ($cursos_==0 and $periodo_>0) {
            $historial = $con->query("SELECT * FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.periodo='$periodo_' ORDER BY usuario_curso.id_usuario_curso DESC");
        }



echo "<table>
<tr>
<th>Registro</th>
<th>Profesor</th>
<th>curso</th>
<th>correo</th>
<th>departamento</th>
<th>estatus</th>
<th>periodo</th>
</tr>";

$cont=0;
while($var = mysqli_fetch_array($historial)) { 
    echo "<tr>"; ?>
    <?php 
                    $cont =$cont + 1;
                 ?>
                <td class="td1"> <?php echo ($cont); ?> </td>
                <td class="td1"> <?php echo $var['nombre']."&nbsp".$var['apellido_paterno']."&nbsp".$var['apellido_materno']; ?> </td>   
                <td class="td1"> <?php echo $var['curso']; ?> </td>
                <td class="td1"> <?php echo $var['correo']; ?> </td>
                <td class="td1"> <?php echo $var['area']."&nbsp".$var['detalle_externo']."&nbsp".$var['adscripcion'];  ?> </td>
                <td class="td1"> <?php if($var['estatus']==true) echo "Activo";; ?> </td>
                <td class="td1"> <?php echo $var['periodo']; ?></td>
<?php      echo "</tr>";
}
echo "</table>";

?>
</body>
</html> 

