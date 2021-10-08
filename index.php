<?php
//session_start();
$ts = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: $ts");
header("Last-Modified: $ts");
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate"); 

include ("php/header.php");
include ("sql/consulta_curso.php");
?>

<html>
    <body>        
        <div class="bg">
        <div id="container">
     
        <div class="holder_content">
            <section class="group1">
                <h3>Información de los cursos.</h3>
                <div class="box_datos">
                    <p class="cursos">    Los siguientes cursos se encuentra abiertos, para que puedas realizar tu inscripción</p>
                    <?php
                    $datos = traer_curso();
                    $rows =  0;
                    while($rows  < count($datos)){
                    echo "<br><label class='datos_cursos'>". $var  = $rows+1 . ".- ". $datos[$rows][1] ."</label>";
                    $rows++;
                    }       
                    ?>
                    <br><br>
                </div>
            </section>
            <section class="group2">
                <h3>Registro</h3>
                <div class="box_datos form_taller" >
                    <h4>Ingresa tu <b>CURP</b></h4>
                    <p>Consulta tu CURP <a href="http://consultas.curp.gob.mx/CurpSP/" style="color:black" target="_blank">aquí</a></p>
                    <form class="form" id="Dato_taller" action="#" method="post">
                        <input type="text" class="entrada_dato" id="id_registro" name="id_registro" maxlength="18" >
                        <div id="id_error"></div>
                    <p><input type="button" name="bt_registro"  id="bt_registro" value="REGÍSTRATE"  /></p>
                    </form>
                </div>  
            </section>
        </div>
    </div>
</div>
    </body>
</html>

    <?php
    include ('php/footer.php');
    ?>
