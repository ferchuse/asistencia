<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>jQuery File Upload Example</title>
		
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'>
		<link href="css/jquery.fileupload.css" rel='stylesheet' type='text/css'>
	</head>
	<body>
		<span class="btn btn-success fileinput-button">
			<i class="glyphicon glyphicon-picture"></i>
			<span>Cargar Foto Voucher</span>
			<input id="fileupload" type="file" name="files[]" data-url="file_server_upload.php" >
		</span>
		
		
		
		
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" >
				
			</div>
		</div>
		
		<script src="js/jquery.js"></script>
		<script src="js/jquery.ui.widget.js"></script>
		<script src="js/jquery.iframe-transport.js"></script>
		<script src="js/jquery.fileupload.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(function () {
			$('#fileupload').fileupload({
			dataType: 'json',
			done: function (e, data) {
			$.each(data.result.files, function (index, file) {
			$('<p/>').text(file.name).appendTo(document.body);
			});
			},
			progressall: function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$(".progress-bar").css("width" , progress +"%");
			$(".progress-bar").html(progress +"%");
			}
			});
			
			barsize = 0;
			
			//id_interval = setInterval( grow_bar, 50);
			
			function grow_bar(){
				if(barsize < 101){
					$(".progress-bar").css("width" , barsize +"%");
					$(".progress-bar").html(barsize +"%");
					
					barsize = barsize + 1;
					console.log("Bar size = " + barsize);
					
				}
				else{
					console.log("Terminado");
					clearInterval(id_interval);
					
				}
			}
		});
		
		
		//carga multiple
			$('.fileupload').fileupload({
		
		dataType: 'json',
		done: function (e, data) {
			
			$form_group = $(this).closest(".form-group");
			console.log($form_group);
			$.each(data.result.files, function (index, file) {
				$form_group.find(".url_foto").val(file.url);
				$form_group.find(".nombre_archivo").val(file.name);
				$form_group.find(".progress").removeClass("hide");
				$form_group.find(".mensaje_carga").removeClass("hide");
				$form_group.find(".fa-upload").removeClass("fa-upload fa-check");
				if($form_group.find(".url_foto").attr("id") == "url_huella"){
					console.log("cargaste huella");
					
					$("#img_huella").attr("src", file.url);
					
				}
				alertify.success("Cargado Correctamente");
				console.log(file.url);
				//$('<p/>').text(file.name).appendTo(document.body);
				console.log("Carga Completa");
				console.log("id", $form_group.find(".url_foto").attr("id"));
				console.log("id", $form_group.find(".url_foto").prop("id"));
				console.log("data", $form_group.find(".url_foto").data());
			});
		},
		progressall: function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$(this).closest(".form-group").find(".progress-bar").css("width" , progress +"%");
			$(this).closest(".form-group").find(".progress-bar").html(progress +"%");
		},
		fail: function(e, data){
			alertify.error("Ocurrio un Error, vuelve a intentar");
		}
	});
	
	
	</script>
</body> 
</html>