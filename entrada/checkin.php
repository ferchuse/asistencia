<?php	header("Content-Type: application/json");	include("../conexi.php");	include("enviar_correo.php");		$response= array();	$link=Conectarse();	$mail = new PHPMailer;	$mail->CharSet = 'UTF-8';		$matricula = stripslashes($_POST['matricula']);		$sql="SELECT	*	FROM alumnos 	WHERE matricula='$matricula'";			$result=mysqli_query($link, $sql);	if (!$result){		die('Error: ' . mysqli_error($link));	}		$count=mysqli_num_rows($result);			if($count==1){		$response["existe"] = "SI";						$fila = mysqli_fetch_assoc($result);		$insert= "INSERT INTO asistencias SET		fecha_asistencia = CURDATE() ,		hora_asistencia = CURTIME(),		matricula = '{$_POST["matricula"]}'";				$result_insert=mysqli_query($link, $insert);				if (!$result_insert){			$response["checkin"] = false;			if(mysqli_errno($link) == 1062){ // Error por clave duplicada							$response["mensaje"] = "Ya has registrado entrada previamente";							}			$response["error"] = mysqli_error($link);		}		else{									$response["fila"] = $fila;			$response["checkin"] = true;						//Enviar Correo			// $response["enviar_correo"] =	enviarCorreo($fila["correo"], $fila["nombre_alumno"], date("d-m-Y"), date("H:i:s"), $mail);					}					}	else{		$response["existe"] = "NO";		$response["query"] = $sql;		$response["mensaje"] = "La Matricula no existe, verificar";	}		echo json_encode($response);?>