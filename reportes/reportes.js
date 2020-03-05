
$("#form_reportes").submit(listarRegistros);


function listarRegistros(event){
	console.log("listarRegistros()");
	event.preventDefault();
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
		$("#enviar_reporte").click(enviarReporte);
		
		}).always(function(){
		
		$boton.prop("disabled", false);
		$icono.toggleClass("fa-search fa-spinner fa-spin");	
	});
}

function enviarReporte(event){
	console.log("enviarReporte()");
	event.preventDefault();
	let $boton = $(this);
	let $icono = $(this).find(".fas");
	
	$boton.prop("disabled", true);
	$icono.toggleClass("fa-envelope fa-spinner fa-spin");			
	
	$.ajax({
		"url": "consultas/enviar_reporte.php",
		"method": "POST",
		"data": $("#form_reportes").serialize()
		}).done( function alTerminar (respuesta){					
		alertify.success(respuesta.estatus_correo.length + "Correos Enviados")
		console.log(respuesta)
		
		}).always(function(){
		
		$boton.prop("disabled", false);
		$icono.toggleClass("fa-envelope fa-spinner fa-spin");			
		
	});
}

