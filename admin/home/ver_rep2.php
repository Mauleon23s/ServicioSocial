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

if(isset($_POST['periodo_'])){

    $periodo_ = $con->real_escape_string($_POST['periodo_']);
    $historial = $con->query("SELECT cursos.curso, periodo_curso.periodo ,periodo_curso.fecha_inicio,periodo_curso.fecha_fin, COUNT(usuario_curso.id_usuario_curso) FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.periodo='$periodo_'     GROUP BY cursos.curso");
    $reprobados = $con->query("SELECT cursos.curso, periodo_curso.periodo ,periodo_curso.fecha_inicio,periodo_curso.fecha_fin, COUNT(usuario_curso.id_usuario_curso) FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.periodo='$periodo_' AND usuario_curso.calificacion=5 GROUP BY cursos.curso");
}elseif (isset($_POST['data1']) || isset($_POST['data2'])) {
    $date1 = $con->real_escape_string($_POST['data1']);
    $date2 = $con->real_escape_string($_POST['data2']);
    $historial = $con->query("SELECT cursos.curso, periodo_curso.periodo ,periodo_curso.fecha_inicio,periodo_curso.fecha_fin, COUNT(usuario_curso.id_usuario_curso) FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.fecha_registro BETWEEN '$date1 00:00:00' AND '$date2 23:59:59'  GROUP BY cursos.curso");
    $reprobados = $con->query("SELECT cursos.curso, periodo_curso.periodo ,periodo_curso.fecha_inicio,periodo_curso.fecha_fin, COUNT(usuario_curso.id_usuario_curso) FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.fecha_registro BETWEEN '$date1 00:00:00' AND '$date2 23:59:59' AND usuario_curso.calificacion=5 GROUP BY cursos.curso");
}else{
     echo "No se encontraron registros";
    exit();
}



echo "<table>
<tr>
<th>#</th>
<th>Curso</th>
<th>Periodo</th>
<th>Fecha de inicio</th>
<th>Fecha Termino</th>
<th>Numero de Alumnos</th>
<th>Aprobados</th>
<th>Reprobados</th>
</tr>";

$cont=0;
while($var = mysqli_fetch_array($historial) AND $var2 = mysqli_fetch_array($reprobados) ) { 
    echo "<tr>"; ?>
    <?php 
                    $cont =$cont + 1;
                 ?>
                <td class="td1"> <?php echo ($cont); ?> </td> 
                <td class="td1"> <?php echo $var['curso']; ?> </td>
                <td class="td1"> <?php echo $var['periodo']; ?> </td> 
                <td class="td1"> <?php echo $var['fecha_inicio']; ?> </td>
                <td class="td1"> <?php echo $var['fecha_fin']; ?> </td> 
                <td class="td1"> <?php echo $var['COUNT(usuario_curso.id_usuario_curso)'] ?> </td> 
                <td class="td1"> <?php echo $var['COUNT(usuario_curso.id_usuario_curso)']-$var2['COUNT(usuario_curso.id_usuario_curso)']; ?> </td> 
                <td class="td1"> <?php echo $var2['COUNT(usuario_curso.id_usuario_curso)']; ?> </td> 
<?php      echo "</tr>";
}
echo "</table>";

?>
</body>
</html> 

