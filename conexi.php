<?php
	function Conectarse()
	{
		
		$host="localhost";
		
		if($_SERVER["SERVER_NAME"] == "micrositio.mx"){
			
			$db="microsit_asistencia";
			$usuario="microsit_practic";
			$pass="UAEH@2018";
			
		}
		else{
			$db="asistencia";
			$usuario="sistemas";
			$pass="Glifom3dia";
			
		}
		
		date_default_timezone_set('America/Mexico_City');
		setlocale(LC_ALL,"es_MX"); 
		setlocale(LC_NUMERIC, 'en_US'); 
		
    if (!($link=mysqli_connect($host,$usuario,$pass)))
		{
			die( "Error conectando a la base de datos.". mysqli_error($link));
		}
		
		if (!mysqli_select_db($link, $db))
		{
			die( "Error seleccionando la base de datos.". mysqli_error($link));
		}
		

		return $link;
	}
?>