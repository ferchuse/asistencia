
var boton, icono;

$(document).ready(onLoad);

function onLoad() {
	console.log("onLoad");
	$("#btn_nuevo").click(function nuevo() {
		$('#form_alumno')[0].reset();
		
		$("#modal_alumno").modal("show");
		
	});
	
	
	$("#form_filtros").submit(listarRegistros);
	
	$("#form_filtros").submit();
	
	
	$(".buscar").keyup(buscarFila);
	$(".buscar").change(buscarFila);
	
	
	$('#form_alumno').submit(guardarRegistro);
	
}


function listarRegistros(event) {
	event.preventDefault();
	boton = $(this).find(":submit");
	icono = boton.find("i");
	
	boton.prop("disabled", true);
	icono.toggleClass("fa-search fa-spinner fa-spin");
	
	
	$.ajax({
		"url": "consultas/listar_registros.php",
		"data": $("#form_filtros").serialize()
	}).done(alCargar);
}


function alCargar(respuesta) {
	$("#lista_registros").html(respuesta);
	
	$('.buscar').prop("disabled", false);
	
	$('.btn_editar').click(editarRegistro);
	$('.btn_borrar').click(confirmaBorrar);
	$('.sort').click(ordenarTabla);
	
	
	
	contarRegistros("tabla_registros");
	
	boton.prop("disabled", false);
	icono.toggleClass("fa-search fa-spinner fa-spin");
	
}


function ordenarTabla() {
	$(this).toggleClass("asc desc");
	console.log("ordenarTabla");
	
	if(	$("#order").val() ==  "ASC"){
		$("#order").val("DESC");
	}
	else{
		$("#order").val("ASC");
	}
	
	$("#sort").val($(this).data("columna"));
	$('#form_filtros').submit();
}

function contarRegistros(id_tabla) {
	console.log("contarRegistros", $("#"+id_tabla+" tbody tr:visible"));
	
	$("#contar_registros").text($("#"+id_tabla+" tbody tr:visible").length);
}



function editarRegistro() {
	
	let boton = $(this);
	let icono = boton.find(".fas");
	let id_registro = boton.data("id_registro");
	
	boton.prop("disabled", true);
	icono.toggleClass("fa-edit fa-spinner fa-spin");
	
	$.ajax({
		url: "../funciones/fila_select.php",
		
		dataType: "JSON",
		data: {
			tabla: "alumnos",
			id_campo: "matricula",
			id_valor: id_registro
			
		}
		
		}).done(function (respuesta) {
		console.log("respuesta", respuesta);
		if (respuesta.encontrado == 1) {
			$.each(respuesta.data, function (name, value) {
				$("#form_alumno #" + name).val(value);
			});
			
			$("#modal_alumno").modal("show");
			
		}
		}).fail(function (xht, error, errnum) {
		
		alertify.error("Error", errnum);
		}).always(function () {
		boton.prop("disabled", false);
		icono.toggleClass("fa-edit fa-spinner fa-spin");
		
	});
	
	
}

function confirmaBorrar(event){
	console.log("confirmaBorrar")
	let $boton = $(this);
	let $fila = $(this).closest('tr');
	let $icono = $(this).find(".fas");
	$boton.prop("disabled", true);
	$icono.toggleClass("fa-trash fa-spinner fa-spin");
	
	if(confirm("¿Estás Seguro?")){
		$.ajax({ 
			"url": "../funciones/fila_delete.php",
			"dataType": "JSON",
			"method": "POST",
			"data": {
				"tabla": "alumnos",
				"id_campo": "matricula",
				"id_valor": $boton.data("id_registro")
			}
			}).done( function alTerminar (respuesta){
			console.log("respuesta", respuesta);
			
			$fila.remove();
			contarRegistros("tabla_registros");
			}).fail(function(xhr, textEstatus, error){
			console.log("textEstatus", textEstatus);
			console.log("error", error);
			
			}).always(function(){
			
			$boton.prop("disabled", false);
			$icono.toggleClass("fa-trash fa-spinner fa-spin"); 
		});
	}
}		

function guardarRegistro() {
	
	event.preventDefault();
	
	let boton = $(this).find(":submit");
	let icono = boton.find(".fas");
	
	boton.prop("disabled", true);
	icono.toggleClass("fa-save fa-spinner fa-spin");
	
	$.ajax({
		url: "consultas/guardar.php",
		method: "POST",
		dataType: "JSON",
		data: $("#form_alumno").serialize()
		
		}).done(function (respuesta) {
		console.log("respuesta", respuesta);
		if (respuesta.status == "success") {
			
			alertify.success(respuesta.mensaje);
			
			$("#modal_alumno").modal("hide");
			$("#form_filtros").submit();
		}
		}).fail(function (xht, error, errnum) {
		
		alertify.error("Error", errnum);
		}).always(function () {
		boton.prop("disabled", false);
		icono.toggleClass("fa-save fa-spinner fa-spin");
		
	});
	
}

function buscarFila(event) {
	var value = $(this).val().toLowerCase();
	console.log("buscando", value);
	$("#lista_registros tbody tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
}	