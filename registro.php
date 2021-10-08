
<?php
session_start();
$ts = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: $ts");
header("Last-Modified: $ts");
header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate"); 

include ("php/header.php");
include ("sql/consultas.php");

$curp = $_SESSION['id_'];


$prueba=mysqli_fetch_array($dato3);
$traer_car = mysqli_fetch_array($carr);
$cursos = traer_cursos();
?>

<!DOCTYPE html>
<html>
    <body>
        <div class="bg">
            
        <section id="intro">
            <hgroup>
                <br>
                <h1>Registro del alumno</h1>
            </hgroup>
        </section>
        <section class="holder_content">
            <?php  
            if($dato != null)
                {
                    ?>

            <table border="1px" style="margin-top: 15px;">
            <thead>
            <th class="th1">Número de Registro</th>
            <th class="th1">Nombre</th>
            <th class="th1">Apellido Paterno</th>
            <th class="th1">Apellido Materno</th>
            <th class="th1">Correo</th>
            <th class="th1">Curp</th>
            <th class="th1">Curso</th>
            </thead>
        
            <tbody>
            <?php
            
            echo"Ya estas registrado a los siguientes cursos.";
            
                while ($var=mysqli_fetch_array($dato)) { ?>
            <tr>
                <td class="td1"> <?php echo $var['id_usuario']; ?> </td>
                <td class="td1"> <?php echo $var['nombre']; ?> </td>
                <td class="td1"> <?php echo $var['apellido_paterno']; ?> </td>
                <td class="td1"> <?php echo $var['apellido_materno']; ?> </td>
                <td class="td1"> <?php echo $var['correo']; ?> </td>
                <td class="td1"> <?php echo $var['curp']; ?> </td>
                <td class="td1"> <?php echo $var['curso']; ?> </td>

            </tr>
        
            <?php } ?>
            </tbody>
       
            </table>
            <?php } ?>
        </section>

            <div class="holder_content">

            <section class="group3">

                <div class="box_datos">
                    <div style="margin-left: 200px;">
                        <form class="form" id="registro" name="registro" >

                            <table>
                                <tr>
                                    <td><strong>Tipo de alumno:</strong></td>
                                    <td>
                                        <?php 
                                        if($prueba['tipo'] == 1) { ?>
                                        CeDeTec <input type="radio" class="entrada_dato" name="int_ext" value="1" onclick="mostrar_int();" checked="1">
                                        Comunidad Acatlán <input type="radio" class="entrada_dato" id="rad_2" name="int_ext" value="2" onclick=     "mostrar_com();">
                                        Externo <input type="radio" class="entrada_dato" id="rad_" name="int_ext" value="3" onclick=     "mostrar_ext();" >
                                    <?php  }
                                    ?>
                                     <?php 
                                        if($prueba['tipo'] == 2) { ?>
                                        CeDeTec <input type="radio" class="entrada_dato" id="rad_1" name="int_ext" value="1" onclick= "mostrar_int();" >
                                        Comunidad Acatlán <input type="radio" class="entrada_dato"  name="int_ext" value="2" onclick="mostrar_com();" checked="1">
                                        Externo <input type="radio" class="entrada_dato" id="rad_" name="int_ext" value="3" onclick=     "mostrar_ext();" >
                                         <?php  }
                                    ?>
                                     <?php 
                                        if($prueba['tipo'] == 3) { ?>
                                        CeDeTec <input type="radio" class="entrada_dato" id="rad_1" name="int_ext" value="1" onclick= "mostrar_int();" >
                                        Comunidad Acatlán <input type="radio" class="entrada_dato" id="rad_2" name="int_ext" value="2" onclick=     "mostrar_com();">
                                        Externo <input type="radio" class="entrada_dato" id="rad_" name="int_ext" value="3" onclick="mostrar_ext();" checked="1" ><br>
                                        <?php  }
                                    ?>
                                     <?php 
                                        if($prueba['tipo'] == "") { ?>
                                            CeDeTec <input type="radio" class="entrada_dato" name="int_ext" value="1" onclick="mostrar_int();">
                                            Comunidad Acatlán <input type="radio" class="entrada_dato" name="int_ext" value="2" onclick="mostrar_com();" >
                                            Externo <input type="radio" class="entrada_dato" id="rad_" name="int_ext" value="3" onclick="mostrar_ext();"
                                        <?php  }
                                    ?>
                                    </td>
                                </tr>
                            </table>
                            <div id="Externo" hidden="hidden">
                                <br>
                                <table>
                                    <tr>
                                        <td><p style="margin-right: 10px; ">Institución/Empresa/Otro:</p></td>
                                        <td><input type="text" class="entrada_dato" id="detalle" name="detalle" size="30px" value="<?php echo $prueba['detalle_externo'] ?>"></td>
                                    </tr>
                                </table>
                            </div>
                            <div id="comunidad" hidden="hidden">
                                <br>
                                <table>
                                    <tr>
                                        <td><p style="margin-right: 30px; ">Adscripción:</p></td>
                                        <td><input type="text" class="entrada_dato" id="adscripcion" name="adscripcion" size="30px"></td>
                                    </tr>
                                </table>
                            </div>

                            <div id="interno" hidden="hidden">
                                <table>
                                    <tr>
                                        <td><p><strong>Área</strong></p></td>
                                        <td>
                                            <?php 
                                        if($prueba['area'] == "DSC") { ?>
                                            DSC <input type="radio" class="entrada_dato" id="r_" name="area" value="DSC" checked="1">
                                            Redes <input type="radio" class="entrada_dato" id="r_1" name="area" value="Redes">
                                            DSI <input type="radio" class="entrada_dato" id="r_2" name="area" value="DSI">
                                            Cursos <input type="radio" class="entrada_dato" name="area" value="Cursos" id="rad_area" >
                                            <?php  }
                                    ?>
                                     <?php 
                                        if($prueba['area'] == "Redes") { ?>
                                            DSC <input type="radio" class="entrada_dato" id="r_" name="area" value="DSC">
                                            Redes <input type="radio" class="entrada_dato" id="r_1" name="area" value="Redes" checked="1">
                                            DSI <input type="radio" class="entrada_dato" id="r_2" name="area" value="DSI">
                                            Cursos <input type="radio" class="entrada_dato" name="area" value="Cursos" id="rad_area" >
                                            <?php  }
                                    ?>
                                     <?php 
                                        if($prueba['area'] == "DSI") { ?>
                                            DSC<input type="radio" class="entrada_dato" id="r_" name="area" value="DSC">
                                            Redes <input type="radio" class="entrada_dato" id="r_1" name="area" value="Redes">
                                            DSI <input type="radio" class="entrada_dato" id="r_2" name="area" value="DSI" checked="1">
                                            Cursos <input type="radio" class="entrada_dato" name="area" value="Cursos" id="rad_area" >
                                            <?php  }
                                    ?>
                                     <?php 
                                        if($prueba['area'] == "Cursos") { ?>
                                            DSC <input type="radio" class="entrada_dato" id="r_" name="area" value="DSC">
                                            Redes <input type="radio" class="entrada_dato" id="r_1" name="area" value="Redes">
                                            DSI <input type="radio" class="entrada_dato" id="r_2" name="area" value="DSI">
                                            Cursos <input type="radio" class="entrada_dato" name="area" value="Cursos" id="
                                            rad_area" checked="1">
                                            <?php  }
                                    ?>
                                       <?php 
                                        if($prueba['area'] == "") { ?>
                                            DSC <input type="radio" class="entrada_dato" id="r_" name="area" value="DSC">
                                            Redes <input type="radio" class="entrada_dato" id="r_1" name="area" value="Redes">
                                            DSI<input type="radio" class="entrada_dato" id="r_2" name="area" value="DSI">
                                            Cursos <input type="radio" class="entrada_dato" name="area" value="Cursos" id="rad_area" >
                                            <?php  }
                                    ?>
                                     
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p style="margin-right: 40px; "><strong>Categoría</strong></p></td>
                                        <td>
                                    <?php 
                                     
                                        if($prueba['categoria'] == "Trabajador") { ?>
                                            Trabajador <input type="radio" class="entrada_dato" id="r_3" name="catego" value="Trabajador" checked="1">                                            
                                            Servicio <input type="radio" class="entrada_dato" id="r_4" name="catego" value="Servicio">                                   
                                            Honorarios <input type="radio" class="entrada_dato" id="r_5" name="catego" value="Honorarios">                                    
                                            Apoyo <input type="radio" class="entrada_dato" name="catego" value="Apoyo" id="rad_catego" >
                                              <?php  }
                                    ?>
                                     <?php 
                                        if($prueba['categoria'] == "Servicio") { ?>
                                            Trabajador <input type="radio" class="entrada_dato" id="r_3" name="catego" value="Trabajador" >
                                            Servicio <input type="radio" class="entrada_dato" id="r_4" name="catego" value="Servicio" checked="1">                                            
                                            Honorarios <input type="radio" class="entrada_dato" id="r_5" name="catego" value="Honorarios">                                    
                                            Apoyo <input type="radio" class="entrada_dato" name="catego" value="Apoyo" id="rad_catego" >
                                              <?php  }
                                    ?>
                                     <?php 
                                        if($prueba['categoria'] == "Honorario") { ?>
                                            Trabajador <input type="radio" class="entrada_dato" id="r_3" name="catego" value="Trabajador" >
                                            Servicio <input type="radio" class="entrada_dato" id="r_4" name="catego" value="Servicio">                                                                   Honorarios<input type="radio" class="entrada_dato" id="r_5" name="catego" value="Honorarios" checked="1">
                                            Apoyo <input type="radio" class="entrada_dato" name="catego" value="Apoyo" id="rad_catego" >
                                              <?php  }
                                    ?>
                                     <?php 
                                        if($prueba['categoria'] == "Apoyo") { ?>
                                            Trabajador <input type="radio" class="entrada_dato" id="r_3" name="catego" value="Trabajador" >
                                            Servicio <input type="radio" class="entrada_dato" id="r_4" name="catego" value="Servicio">                                   
                                            Honorarios <input type="radio" class="entrada_dato" id="r_5" name="catego" value="Honorarios">                                    
                                            Apoyo <input type="radio" class="entrada_dato" name="catego" value="Apoyo" id="rad_catego" checked="1">
                                              <?php  }
                                    ?>
                                    <?php 
                                     
                                        if($prueba['categoria'] == "") { ?>
                                            Trabajador <input type="radio" class="entrada_dato" id="r_3" name="catego" value="Trabajador">
                                            Servicio <input type="radio" class="entrada_dato" id="r_4" name="catego" value="Servicio">
                                            Honorarios <input type="radio" class="entrada_dato" id="r_5" name="catego" value="Honorarios">
                                            Apoyo <input type="radio" class="entrada_dato" name="catego" value="Apoyo" id="rad_catego" >
                                              <?php  }
                                    ?>
                                    
                                        </td>
                                    </tr>
                                </table>
                            </div> 

                            <table>
                                <tr>
                                    <td>CURP:</td>
                                    <td><input type="text" class="entrada_dato" id="id_registro" name="id_registro" maxlength="18" value="<?php echo strtoupper($curp) ?>"></td>
                                </tr>
                                <tr>
                                    <td>Cuenta:</td>
                                    <td><input type="text" class="entrada_dato numerico" id="cuenta" name="cuenta" maxlength="9" minlength="9" value="<?php echo $prueba['cuenta'] ?>" ></td>
                                </tr>
                                <tr>
                                    <td>Nombre :</td>
                                    <td><input type="text" class="entrada_dato" id="nombre" name="nombre" size="30px" value="<?php echo $prueba['nombre'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Apellido Paterno:</td>
                                    <td><input type="text" class="entrada_dato" id="apellido_p" name="apellido_p" size="30px" value="<?php echo $prueba['apellido_paterno']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Apellido Materno:</td>
                                    <td><input type="text" class="entrada_dato" id="apellido_m" name="apellido_m" size="30px" value="<?php echo $prueba['apellido_materno'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Correo:</td>
                                    <td><input type="email" class="entrada_dato" id="correo" name="correo" size="30px" value="<?php echo $prueba['correo'] ?>" ></td>

                                </tr>
                                 <tr>
                                    <td>Confirmar Correo:</td>
                           
                                    <td><input type="email" class="entrada_dato" id="correo2" name="correo" size="30px" value="<?php echo $prueba['correo'] ?>" oncopy="return false" onpaste="return false"></td>
                               
                                </tr>
                                <tr>
                                    <td>Carrera:</td>
                                    <td>
                                        <select  id="carrera" name="carrera" onchange="mostrar_caja();">
                                            <option value="<?php echo $traer_car['id_carrera'] ?>" >
                                            <?php 
                                            if($traer_car['carrera'] === null)
                                            { 
                                                echo "Selecciona una carrera";
                                                ?>
                                            <?php 
                                            } 
                                            else 
                                            {
                                              echo $traer_car['carrera'];  # code...
                                             } ?>
                                            </option>
                                            <?php
                                            $datos = traer_carreras();
                                            $rows = 0;
                                            while ($rows < count($datos)) {
                                                echo "<option value='" . $datos[$rows][0] . "'> " . utf8_encode($datos[$rows][1]) . " </option> ";
                                                $rows++;
                                            }
                                            ?>
                                            <option value="0" >OTRO</option>
                                        </select>
                                    </td>
                                </tr>

                            </table>
                            <div id="caja_sel" hidden="hidden">
                                <br>
                                <table>
                                    <tr>
                                        <td><p style="margin-right: 55px; ">Otro:</p></td>
                                        <td><input type="text" class="entrada_dato" id="otro_sel" name="otro_sel"></td>
                                    </tr>
                                </table>
                            </div>


                            <br>
                            Cursos:
                            <select  id="cursos" name="cursos">
                                <option value="" >Seleccione un curso</option>
                                <?php
                                foreach ($cursos as $rows) {
                                    echo " <option value='" . $rows[0] . "'> " . utf8_encode($rows[1]) . " </option> ";
                                }
                                ?>
                            </select>
                            <p><input type="button"  id="bt_guardar_curso" value="Guardar"  /></p>
                        </form>
                    </div>
                </div>

            </section>
            </div>
        </div>
    </body>
</html>
<?php 
include ("php/footer.php");
?>


   