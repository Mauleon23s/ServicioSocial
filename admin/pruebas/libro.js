function buscar (valor){
	$.ajax({
		url:'../home/libros.php',
		type:'POST',
		data:'valor='+boton+'&boton=buscar'

	}).done(function(resp){
		alert(resp);
	});

