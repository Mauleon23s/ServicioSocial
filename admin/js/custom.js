$(document).ready(function () {
    $('#bt_buscar').click(function () {
        if (verify_empty()) {
            $.post("sql/datos.php", $("#valores").serialize(), function (data) {
                if (data == 1){
                    window.location = "registro.php";
                }
                else {
                    window.location = "registro.php";
                }
            });
        }
    });
   
