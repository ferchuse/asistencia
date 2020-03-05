<!DOCTYPE html>
<html lang="es">
	
	<head>
    <title>Registrar Entrada</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.10.0/css/alertify.min.css" />
		
    <link rel="stylesheet" type="text/css" href="checkin.css" />
		
		
		<meta name="robots" content="noindex">
	</head>
	
	<body>
    <div class="container">
			<div class="row" id="pwd-container">
				<div class="col-md-4"></div>
				
				<div class="col-md-4">
					<section class="login-form">
						<form name="form_login" id="form_login" autocomplete="off" action="" role="login" method="post">
							
							<div id="login_logo">
								<i class="fa fa-sign-in fa-4x"></i>
							</div>
							
							<h3 class="text-center">Registrar Entrada</h3>
							
							
							<input type="text" name="matricula" class="form-control input-lg" id="matricula"
							placeholder="Matrícula" required="" autofocus="true"/>
							
						</form>
					</section>
				</div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../lib/alertify.min.js"></script>
    <script type="text/javascript" src="index.js?v=<?= date("d-m-Y-h-i-s")?>"></script>
	</body>
	
</html>