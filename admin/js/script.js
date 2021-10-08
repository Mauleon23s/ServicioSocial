function env_datos() {
	var cursos = document.getElementByEd('cursos').value;

	var url = "home/procesar.php";

	$.ajax({
		type:"post";,
		url:url,
		data:{cursos:cursos},
		success:function(datos){
			$("$mostrar_datos").html(datos); 
		}


	}
		)
	// body...
}