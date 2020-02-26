<!DOCTYPE html>
<html lang="es">
	<head>
		
		
		<meta charset="UTF-8">
		<title>FileUpload </title>
		
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		
		<!-- jQuery library -->
		
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		
    <link href="file_upload.css" rel='stylesheet' type='text/css'>
	  
		
	</head>
	<body>
		
		
		<div class="container ">		
			
			<div class="row">
				<div class="col-sm-12">
					
					<form id="form_nuevo_registro" >
						<div class="row">
							<div class="col-sm-6">
								
								<div class="form-group">
								
									<div>
										<span class="btn btn-success fileinput-button">
											
											<span>Cargar Foto</span>
											<input id="fileupload" type="file" accept="image/*" name="files[]" data-url="server_upload.php" >
											<input id="url_foto" type="hidden" name="url_foto" data-invalid="No has agregado ninguna foto" >
											<input id="url_thumb" type="hidden" name="url_thumb" >
										</span> 
										
										<div id="mensaje_carga" hidden class=" alert alert-success">
											<strong>Archivo <span id="nombre_archivo"> </span> cargado correctamente</strong> 
										</div>
										<img class="img-responsive " hidden alt="Vista Previa" id="vista_previa" >
										<div class="progress " id="barra_carga">
											<div class="progress-bar progress-bar-striped active" >
											</div>
										</div>					 
									</div>					 
								</div>
								
							</div>
						</div><!-- /.row -->
					</form>
					
				</div> <!-- /.col-sm-12 -->
			</div><!-- /.row --> 
			
		</div>
		
		
		
		
		
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
		<script src="jquery.ui.widget.js"></script>
		<script src="jquery.fileupload.js"></script>
		<script src="file_upload.js"></script>
		
	</body>
</html>									