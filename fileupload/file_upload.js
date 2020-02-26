
$('#fileupload').fileupload({
	//loadImageMaxFileSize: 1000,
	dataType: 'json',
	done: function (e, data) {
		$.each(data.result.files, function (index, file) {
			if(file.error){
				//console.error("File limit upload");
				//console.log();
				alertify.error("Error", file.error);
				
				$(".progress").toggleClass("hide");
			}
			else{
				$("#url_foto").val(file.url);
				$("#url_thumb").val(file.thumbnailUrl);
				$("#nombre_archivo").html(file.name);
				$("#vista_previa").attr("src", file.thumbnailUrl);
				
				
				$(".progress").prop("hidden", false);
				$("#mensaje_carga").prop("hidden", false);
				$("#vista_previa").prop("hidden", false);
				// $(".progress").show();
				
			}
			
			/* 	console.log("---------data.textStatus.---------");
				console.log(data.textStatus);
				console.log("---------data.textStatus.---------");
				console.log(file);
				//$('<p/>').text(file.name).appendTo(document.body);
			console.log("FileUpload Complete"); */
		});
	},
	progressall: function (e, data) {
		var progress = parseInt(data.loaded / data.total * 100, 10);
		$(".progress-bar").css("width" , progress +"%");
		$(".progress-bar").html(progress +"%");
	},
	fail: function(e, data){
		alertify.error("Ocurrio un Error, vuelve a intentar");
	}
});