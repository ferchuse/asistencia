<?php	header("Content-Type: application/json");	include("../conexi.php");	include("enviar_correo.php");		$response= array();	$link=Conectarse();	$mail = new PHPMailer;	$mail->CharSet = 'UTF-8';		$matricula = stripslashes($_POST['matricula']);		$sql="SELECT	matricula	FROM alumnos 	WHERE matricula='$matricula'";			$result=mysqli_query($link, $sql);	if (!$result){		die('Error: ' . mysqli_error($link));	}		$count=mysqli_num_rows($result);			if($count==1){		$response["existe"] = "SI";								$insert= "INSERT INTO asistencias SET		fecha_asistencia = CURDATE() ,		hora_asistencia = CURTIME(),		matricula = '{$_POST["matricula"]}'";				$result_insert=mysqli_query($link, $insert);				if (!$result_insert){			$response["checkin"] = false;			if(mysqli_errno($link) == 1062){				// die('Error: ' . mysqli_error($link). mysqli_errno($link));				// $response["mensaje"] = "La Matricula no existe, verificar";				$response["mensaje"] = "Ya has registrado entreda Previamente";							}			$response["error"] = mysqli_error($link);		}		else{						$fila = mysqli_fetch_assoc($result_insert);			$response["fila"] = $fila;			$response["checkin"] = true;						//Enviar Correo			$response["enviar_correo"] =	enviarCorreo($fila["correo"], $fila["nombre_alumno"], date("d-m-Y"), date("H:i:s"), $mail);					}					}	else{		$response["existe"] = "NO";		$response["query"] = $sql;		$response["mensaje"] = "La Matricula no existe, verificar";	}		echo json_encode($response);?>