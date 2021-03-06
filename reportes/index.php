<?php
	
	include("../login/login_success.php");
	include("../conexi.php");
	include("../funciones/generar_select.php");
	$link = Conectarse();
	
	//declara fecha inicial y fecha final del mes
	$dt_fecha_inicial = new DateTime("first day of this month");
	$dt_fecha_final = new DateTime("last day of this month");
	
	$fa_inicial = $dt_fecha_inicial->format("Y-m-d");
	$fa_final = $dt_fecha_final->format("Y-m-d");
	
?>

<!DOCTYPE html>
<html lang="es">
	
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
    <title>Reporte de Asistencias</title>
		
		<?php include("../styles.php"); ?>
		<style>
			.clickable{
			cursor:pointer;
			}
		</style>
	</head>
	
	<body>
		<?php include("../menu.php");?>
		<div class="container d-print-none">
			<h1 class="text-center">Sitio Suspendido</h1>
		</div>
		<div class="container-fluid" hidden>
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center">Reporte de Asistencias</h3>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form id="form_reportes" class="form-inline">
						<div class="form-group mr-2">
							<label for="fecha_inicio">Fecha Reporte:</label>
							<input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?php echo date("Y-m-d");?>">
						</div>
						
						<button type="submit" class="btn btn-success d-print-none" id="btn_buscar">
							<i class="fa fa-search"></i> Buscar
						</button>
						
					</form>
				</div>
			</div>
			<hr>
			<div class="row text-center" >
				<div class="col-8 " id="listar_registros">
					
				</div>
			</div>
			
		</div >
				
		<?php  include('../scripts.php'); ?>
		<script src="reportes.js?v=<?= date("d-m-Y-h-i-s")?>"></script>
	</body>
	
	
	<script>

		
	</script>
</html>		