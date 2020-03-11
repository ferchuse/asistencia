<?php
	if(isset($_GET["redirect_url"])){
		
		$redirect_url =$_GET["redirect_url"]; 
	} 
	else{
		$redirect_url = "";
		
	}
	
	
	include("../funciones/generar_select.php");
	include("../conexi.php");
	$link = Conectarse();
	
?>
<!DOCTYPE html>
<html lang="es">
	
	<head>
    <title>Iniciar Sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.10.0/css/alertify.min.css" />
		
    <link rel="stylesheet" type="text/css" href="login.css" />
		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../lib/alertify.min.js"></script>
    <script type="text/javascript" src="login.js"></script>
		<meta name="robots" content="noindex">
	</head>
	
	<body>
    <div class="container">
			<div class="row" id="pwd-container">
				<div class="col-md-4"></div>
				
				<div class="col-md-4">
					<section class="login-form">
						<form name="form_login" id="form_login" action="" role="login" method="post">
							
							<div id="login_logo">
																<img src="../img/logo_fenix.jpg" class="img-responsive">
							</div>
							
							<h4 class="text-center">Iniciar Sesión</h4>
								<div class="text-center"><a href="../entrada/index.php">Registrar Accesos</a></div>
							<div class="form-group">
								<?= generar_select($link, "usuarios", "id_usuarios", "nombre_usuarios", false, false, true);?>
							</div>
							<input type="password" name="password" class="form-control " id="password"
							placeholder="Contraseña" required="" />
							
							
							<button type="submit" id="btn_login" class="btn btn-lg btn-primary btn-block">
								<i class="fa fa-sign-in"></i> Iniciar Sesión 
							</button>
						</form>
						
					</section>
					
				</div>
			</div>
		</div>
	</body>

</html>