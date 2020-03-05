<?php
	
	include("../../conexi.php");
	require '../../lib/phpmailer/PHPMailerAutoload.php';
	$link = Conectarse();
	
	
	
	$consulta = "SELECT
	*, CONCAT(
	ape_pat,
	' ',
	ape_mat,
	' ',
	nombre_alumno
	) AS nombre_completo
	FROM
	alumnos
	LEFT JOIN (
	SELECT
	*
	FROM
	asistencias
	WHERE
	DATE(fecha_asistencia) = '{$_POST['fecha_inicio']}'
	) t_asistencias USING (matricula) 
	
	
	";
	$result = mysqli_query($link, $consulta);
	
	if($result){
		while($fila = mysqli_fetch_assoc($result)){
			$registros[] = $fila;
		}
	}
	else{
		die("Error en la consulta $consulta". mysqli_error($link));
	}
	
	
	foreach($registros AS $i=>$fila){
		$mail = new PHPMailer;
		$mail->CharSet = 'UTF-8';
		
		$mail->setFrom('control_escolar@micrositio.mx', 'Control de Asistencia');
		$mail->addAddress($fila["correo"]);     
		
		
		$mail->addBCC("ferchuse@hotmail.com");  
		$mail->addBCC("ferchuse16@gmail.com");  
		
		$mail->isHTML(true);                                  
		
		$mail->Subject = 'Registro de Asistencia';
		$body = "<center><b>{$fila["nombre_completo"]}</center><br>";
		
		
		if($fila["hora_asistencia"] != ""){
			$body.= "<center><b>Fecha: </b>{$fila["fecha_asistencia"]}</center><br>";
			$body.= "<center><b>Hora: </b>{$fila["hora_asistencia"]}</center><br>";
			
			}else{
			$body.= "<center ><b>NO ASISTIÓ</b> </center>";
			
		}
		
		
		$mail->Body  = $body;
		
		if(!$mail->send()) {
		$respuesta["estatus_correo"][] = "error";
		$respuesta["mensaje_correo"][] = 'No se envio el correo.'. $mail->ErrorInfo;
		
		} else {
		$respuesta["mail"] = $mail;
		$respuesta["estatus_correo"][] = "success";
		$respuesta["mensaje_correo"][] = "Correo Enviado Correctamente";
		
		}
		
	}
	
	
	echo json_encode($respuesta);
?>		