


    $('#registro_c').click(function () {
        if (verify_campos() == true) {
            $('#registro_c').attr('disabled', 'disabled');
            $.post("sql/guardar.php", $("#registro").serialize(), function (data) {
                alert("Ya has quedado registrado, espera un correo con la información y/o confirmación al curso.");
                window.location = "index.php";
            });
        }
    });

    $('.numerico').keydown(function (e) {
        this.value = this.value.replace(/[^0-9\.]/g, '');
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

    if ($('#nombre').val() == "") {
        $("#nombre").focus().after("<span class='error'>Ingrese su nombre. Por favor!</span>");
        return false;
    }
    if ($('#apellido_p').val() == "") {
        $("#apellido_p").focus().after("<span class='error'>Ingrese su apellido. Por favor!</span>");
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
     if ($('#cuenta').val() != "" && $('#carrera').val() == "") {
        $("#carrera").focus().after("<span class='error'>Ingrese la carrera a la que pertenece.!</span>");
        return false;
    }
   
    if ($('#cursos').val() == "") {
        $("#cursos").focus().after("<span class='error'>Seleccione un curso. Por favor!</span>");
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
