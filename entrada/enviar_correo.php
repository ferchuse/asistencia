<?php
	
	require '../lib/phpmailer/PHPMailerAutoload.php';
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	
	
	// $mail->Encoding = 'base64';
	// $mail->isSMTP();                                    
	// $mail->Host = 'smtp.live.com';  
	// $mail->SMTPAuth = true;                              
	// $mail->Username = 'facturacion@glifo.mx';                
	// $mail->Password = 'glifo951';                            
	// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	// $mail->Port = 587;                                    
	// $mail->SMTPDebug = 0;                            //Activa depuracion SMTP
	
	
	function enviarCorreo($destinatario, $nombre_alumno ,$fecha, $hora, $mail){
		
		$mail->setFrom('control_escolar@micrositio.mx', 'Control de Asistencia');
		$mail->addAddress($destinatario);     
		
		// $mail->addAddress($correo); 
		$mail->addBCC("ferchuse@hotmail.com");  
		// $mail->addBCC("ferchuse16@gmail.com");  
		
		
		$mail->isHTML(true);                                  
		
		$mail->Subject = 'Registro de Asistencia';
		$mail->Body    = "<center><b>$nombre_alumno , Fecha: $fecha, Hora: $hora</b> </center>
		<hr>
		<small><a href='www.glifo.mx'>glifo.mx</a></small>
		";
		// $mail->AltBody = "Adjunto Factura  ";
		
		if(!$mail->send()) {
			$resultado["estatus_correo"] = "error";
			$resultado["mensaje_correo"] = 'No se envio el correo.'. $mail->ErrorInfo;
			
			} else {
			$resultado["mail"] = $mail;
			$resultado["estatus_correo"] = "success";
			$resultado["mensaje_correo"] = "Correo Enviado Correctamente";
			
		}
		return $resultado;
	}
	
?>