
$("#form_reportes").submit(listarRegistros);


function listarRegistros(event){
	event.preventDefault();
	console.log("listarRegistros()");
	let $boton = $(this).find(":submit");
	let $icono = $(this).find(".fas");
	
	$boton.prop("disabled", true);
	$icono.toggleClass("fa-search fa-spinner fa-spin");			
	
	$.ajax({ 
		"url": "consultas/lista_registros.php",
		"method": "POST",
		"data": $("#form_reportes").serialize()
		}).done( function alTerminar (respuesta){					
		
		$("#listar_registros").html(respuesta);
		// $(".clickable").click(detalleComisiones);
		
		}).always(function(){
		
		$boton.prop("disabled", false);
		$icono.toggleClass("fa-search fa-spinner fa-spin");	
	});
}

