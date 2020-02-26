<?php
	header("Content-Type: application/json");
	include ("../../conexi.php");
	$link = Conectarse();
	$respuesta = Array();
	
	$consulta = "INSERT INTO alumnos SET 
	
	matricula = '{$_POST["matricula"]}',
	nombre_alumno = '{$_POST["nombre_alumno"]}',
	ape_pat = '{$_POST["ape_pat"]}',
	ape_mat = '{$_POST["ape_mat"]}',
	correo = '{$_POST["correo"]}',
	contrasena = '{$_POST["contrasena"]}'
	
	
	ON DUPLICATE KEY UPDATE 
	
	matricula = '{$_POST["matricula"]}',
	nombre_alumno = '{$_POST["nombre_alumno"]}',
	ape_pat = '{$_POST["ape_pat"]}',
	ape_mat = '{$_POST["ape_mat"]}',
	correo = '{$_POST["correo"]}',
	contrasena = '{$_POST["contrasena"]}'
	";
	
	$result = mysqli_query($link, $consulta);
	
	$respuesta["consulta"] = $consulta;
	
	if($result){
		$respuesta["status"] = "success";
		$respuesta["mensaje"] = "Guardado";
		
	}	
	else{
		$respuesta["status"] = "error";
		$respuesta["mensaje"] = "Error $consulta  ".mysqli_error($link);		
	}
	
	echo json_encode($respuesta);
?>