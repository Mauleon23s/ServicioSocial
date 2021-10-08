$(document).ready(function () {
    $('#bt_guardar_curso').click(function () {
        if (verify_campos() == true) {
            $('#bt_guardar_curso').attr('disabled', 'disabled');
            alert("Hola");
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
    $('#bt_registro').attr('style', 'background-color:blue;');
    $('#bt_registro').attr('disabled', 'disabled');
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