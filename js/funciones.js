$(document).ready(function () {
    if('#bt_registro'){   
    $('#bt_registro').click(function () {
        if (verify_empty()) {
            $.post("sql/buscar.php", $("#Dato_taller").serialize(), function (data) {
                if (data == 1 || data == 0){
                    window.location = "registro.php";
                }
                else {
                    window.location = "index.php";
                }
            });
        }
    });
    }else
    {
        window.location = "index.php";
    }
   


    $('#bt_guardar_curso').click(function () {
        if (verify_campos() == true) {
            $('#bt_guardar_curso').attr('disabled', 'disabled');
            $.post("sql/guardar.php", $("#registro").serialize(), function (data) {
                alert("Ya has quedado registrado, espera un correo con la información y/o confirmación al curso.");
                window.location = "index.php";
            });
        }
    });

    $('.numerico').keydown(function (e) {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
});

function verify_empty() {
    $('.error').remove();
    if ($('#id_registro').val() == "") {
        $("#id_error").focus().after("<span class='error'>Ingrese los datos. Por favor.</span>");
        return false;
    }
    else if($('#id_registro').val().length < 18){
        $("#id_error").focus().after("<span class='error'>Escriba correctamente su CURP. Por favor.</span>");
        return false;
    }
    $('#bt_registro').attr('style', 'background-color:red;');
    $('#bt_registro').attr('disabled', 'disabled');
    return true;
}

function verify_campos() {
    $('.error').remove();

    if ($('input[name="int_ext"]').is(':checked'))
    {
         if ($('input[name="area"]').is(':checked') || $('#adscripcion').val() == "" || $('#detalle').val() == "")
            {
                if($('input[name="area"]').is(':checked') || $('#adscripcion').val() != "" || $('#detalle').val() != ""){
                    if($('input[name="catego"]').is(':checked') || $('#adscripcion').val() != "" || $('#detalle').val() != ""){
                    } else {
                        $("#rad_catego").focus().after("<span class='error'>Marque el tipo de categoria</span>");
                        return false;
                    }


                } else {

                    $("#rad_area").focus().after("<span class='error'>Marque el area al que pertenece</span>");
                    $("#adscripcion").focus().after("<span class='error'>Ingrese su adscripcion</span>");
                    $("#detalle").focus().after("<span class='error'>Ingrese intitucion a la que pertenece.</span>");
                    return false;
                }
        
            } else {
            $("#rad_area").focus().after("<span class='error'>Marque el area al que pertenece</span>");
            return false;
            }
    } else {
        $("#rad_").focus().after("<span class='error'>Marque si es interno o externo</span>");
        return false
    }
    if (($('input[name="area"]').is(':checked') || $('#adscripcion').val() != "" ) && $('#cuenta').val() == "") {
        $("#cuenta").focus().after("<span class='error'>Ingrese su numero de cuenta. Por favor!</span>");
        return false;
    }
    if ($('#cuenta').val() != "" ) {
    var al = /^\d{9}$/ ;
    if(!(al.test($('#cuenta').val()))){
        $("#cuenta").focus().after("<span class='error'>Ingrese su numero de cuenta correctamente. Por favor!</span>");
        return false;
    }
}


    if ($('#nombre').val() == "") {
        $("#nombre").focus().after("<span class='error'>Ingrese su nombre. Por favor!</span>");
        return false;
    }
    if ($('#apellido_p').val() == "") {
        $("#apellido_p").focus().after("<span class='error'>Ingrese su apellido. Por favor!</span>");
        return false;
    }
    if ($('#apellido_m').val() == "") {
        $("#apellido_m").focus().after("<span class='error'>Ingrese su apellido. Por favor!</span>");
        return false;
    }
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    if (!(regex.test($('#correo').val().trim()))) {
        $("#correo").focus().after("<span class='error'>Ingrese su correo correctamente. Por favor!</span>");
        return false;
    }
      if ($('#correo2').val() != $('#correo').val()) {
        $("#correo2").focus().after("<span class='error'>Ingrese su correo correctamente.!</span>");
        return false;
    }
     if ($('#carrera').val() == "") {
        $("#carrera").focus().after("<span class='error'>Ingrese la carrera a la que pertenece.!</span>");
        return false;
    }
    if ($('#cursos').val() == "") {
        $("#cursos").focus().after("<span class='error'>Ingrese su curso. Por favor!</span>");
        return false;
    }
   

    return true;
}



function mostrar_int() {
    $('#adscripcion').val("");
    $('#detalle').val("");
    document.getElementById("interno").style.display = "block";
    document.getElementById("Externo").style.display = "none";
    document.getElementById("comunidad").style.display = "none";
}

function mostrar_ext() {
    document.getElementById("r_").checked = false;
    document.getElementById("r_1").checked = false;
    document.getElementById("r_2").checked = false;
    document.getElementById("rad_area").checked = false;
    document.getElementById("r_3").checked = false;
    document.getElementById("r_4").checked = false;
    document.getElementById("r_5").checked = false;
    document.getElementById("rad_catego").checked = false;

    $('#adscripcion').val("");
    document.getElementById("interno").style.display = "none";
    document.getElementById("comunidad").style.display = "none";
    document.getElementById("Externo").style.display = "block";
}

function mostrar_com() {
    document.getElementById("r_").checked = false;
    document.getElementById("r_1").checked = false;
    document.getElementById("r_2").checked = false;
    document.getElementById("rad_area").checked = false;
    document.getElementById("r_3").checked = false;
    document.getElementById("r_4").checked = false;
    document.getElementById("r_5").checked = false;
    document.getElementById("rad_catego").checked = false;

    $('#detalle').val("");
    document.getElementById("comunidad").style.display = "block";
    document.getElementById("interno").style.display = "none";
    document.getElementById("Externo").style.display = "none";
}

function mostrar_caja() {
    if (document.getElementById('carrera').value == 0) {
        document.getElementById("caja_sel").style.display = "block";
    } else {
        document.getElementById('otro_sel').value = "";
        document.getElementById("caja_sel").style.display = "none";
    }
}
