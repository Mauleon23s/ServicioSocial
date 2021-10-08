$(document).on('ready',function(){

      $('#btn-buscar').click(function(){
         if (verify_campos() == true) {
        var url = "getuser.php";                                      

        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#formulario").serialize(),
           success: function(data)            
           {
             $('#resp').html(data);           
           }
         });
      }
      });

      $('#reporte').click(function(){
       if (verify_campos() == true) {

       }
       else 
       {
        return false;
       }
      });

function verify_campos() {
    $('.error').remove();

    if ($('#cursos_').val() == "") {
        $("#cursos_").focus().after("<span class='error'>Ingrese un curso. Por favor!</span>");
        return false;
    }
    if ($('#periodo_').val() == "") {
        $("#periodo_").focus().after("<span class='error'>Ingrese un periodo. Por favor!</span>");
        return false;
    }
    return true
  }

    });


      $('#registro_c').click(function(){
         if (verify_campos1() == true) {
        var url = "../sql/cursos2.php";                                      

        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#formularios").serialize(),
           success: function(data)            
           {
             $('#resp').html(data);           
           }
         });
      }

//reporte 2


      });

function verify_campos1() {
    $('.error').remove();

    if ($('#profesor').val() == "") {
        $("#profesor").focus().after("<span class='error'>Ingrese un curso. Por favor!</span>");
        return false;
    }
    if ($('#curso_').val() == "") {
        $("#curso_").focus().after("<span class='error'>Ingrese un periodo. Por favor!</span>");
        return false;
    }
    if ($('#cupo').val() == "") {
        $("#curso_").focus().after("<span class='error'>Ingrese un periodo. Por favor!</span>");
        return false;
    }
    if ($('#fecha_inicio').val() == "") {
        $("#fecha_inicio").focus().after("<span class='error'>Ingrese un periodo. Por favor!</span>");
        return false;
    }
    if ($('#fecha_fin').val() == "") {
        $("#fecha_fin").focus().after("<span class='error'>Ingrese un periodo. Por favor!</span>");
        return false;
    }
    if ($('#periodo').val() == "") {
        $("#periodo").focus().after("<span class='error'>Ingrese un periodo. Por favor!</span>");
        return false;
    }
    if ($('#horario').val() == "") {
        $("#horario").focus().after("<span class='error'>Ingrese un periodo. Por favor!</span>");
        return false;
    }
    if ($('#ubicacion').val() == "") {
        $("#ubicacion").focus().after("<span class='error'>Ingrese un periodo. Por favor!</span>");
        return false;
    }
    if ($('#hora').val() == "") {
        $("#hora").focus().after("<span class='error'>Ingrese un periodo. Por favor!</span>");
        return false;
    }
    return true
  }




 $(document).ready(function(){
        $('#opt1').hide();
        $('#opt2').hide();
        //$('#resp2').hide();
    $("#opcion").click(function(){
        var valor = $('#valor').val();
        if (valor == 1) {
        $('#opt1').show();
        $('#opt2').hide();
        $('#resp2').hide();
        }if (valor == 2) {
            $('#opt2').show();
            $('#opt1').hide();
            $('#resp2').hide();
        }
    });
     $('#ver_rep1').click(function(){
    var valor = $('#periodo_').val();
         //if (verify_campos() == true) {
        var url = "ver_rep2.php";                                      

        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#rep_periodo").serialize(),
           success: function(data)            
           {
             $('#resp2').html(data); 
             $('#resp2').show();          
           }
         });
     //}
      });
     //reporte 2
     $('#opt1').hide();
      $('#opt2').hide();
      //$('#resp2').hide();
      $('#ver_rep2').click(function(){
    //var valor = $('#periodo_').val();
         //if (verify_campos() == true) {
        var url = "ver_rep2.php";                                      

        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#rep_registro").serialize(),
           success: function(data)            
           {
             $('#resp2').html(data); 
             $('#resp2').show();            
           }
         });
     //}
      });

});
 