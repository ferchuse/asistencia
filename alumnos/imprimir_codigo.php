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
		
		<title>Imprimir Código</title>
		
		<?php include("../styles.php"); ?>
		
	</head>
	
	<body>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-4 pt-4">
					<div class="border text-center">
						<h4>
							<?= $_GET["nombre_completo"]?>
							
						</h4>
						Matrícula: <span id="matricula"><?= $_GET["matricula"]?></span>
						<br>
						<br>
						<center id="codigo" class="mx-auto" >
							
						</center>
					</div>
					<hr>
					<button type="button" class="btn btn-info btn-block d-print-none" onclick="window.print();">
						<i class="fa fa-print"></i> Imprimir
					</button>
					
				</div>
			</div>
		</div>
		
		
		<?php include('../scripts.php'); ?>
		
		<script src="../lib/jquery-barcode.min.js"></script >
		<script >
			$(document).ready(function(){
				
				$("#codigo").barcode($("#matricula").text(), "code128", {
					 barWidth: 3,
          barHeight: 100
					});  
				
			})
		</script>
		
	</body>
	
</html>											