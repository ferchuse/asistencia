<?php
	include("../login/login_success.php");
	include("../conexi.php");
	$link = Conectarse();
	
	$menu_activo = "alumnos";
	
?>
<!DOCTYPE html>
<html lang="es">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Lista de Alumnos</title>
		
		<?php include("../styles.php"); ?>
		
	</head>
	
	<body>
		<?php include("../menu.php"); ?>
		
		<div class="container d-print-none">
			<div class="row">
				<div class="col-12 border-bottom mb-3">
					<h3 class="text-center">Alumnos <span class="badge badge-success" id="contar_registros">0</span></h3>
				</div>
				
				<div class="row col-12 mb-4">
					<div class="col-5" >
						<input class="buscar  form-control float-left" type="search" placeholder="Buscar">
						
					</div>
					<div class="col-7">
						<form class="form-inline" id="form_filtros">
							<input type="hidden" id="sort" name="sort" value="matricula">
							<input type="hidden" id="order" name="order" value="ASC">
						</form>
					</div>
					<div class="ml-auto">
						<button type="button" class="btn btn-success float-right" id="btn_nuevo">
							<i class="fa fa-plus"></i> Nuevo
						</button>
					</div>
				</div>
				
				<div class="text-center" id="lista_registros">
					
				</div>
				
			</div>
		</div>
		
		
		<?php include('../scripts.php'); ?>
		<?php include('form_alumno.php'); ?>
		<script src="index.js?v=<?= date("d-m-Y-H-i-s")?>"></script>
		
	</body>
	
</html>										