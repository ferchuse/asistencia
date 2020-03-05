<?php
	
	include("../../conexi.php");
	$link = Conectarse();
	$asistencia = 0;
	$inasistencia = 0;
	
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
?>
<pre hidden >
	<?php echo $consulta;?>
</pre>
<hr>
<?php if(count($registros) > 0){?>
	
	<table class="table table-striped table-hover">
		<thead>
			<tr class="success">
				<th>Alumno</th>
				<th>Entrada</th>
			</tr>
		</thead>
		<tbody>
			
			<?php 
				
				foreach($registros AS $i=>$fila){	
					if( $fila["hora_asistencia"] != ""){
						
						$asistencia++;
					}  
				?>
				<tr >
					<td><?= $fila["nombre_completo"] ?></td> 
					<td >
						<?php echo $fila["hora_asistencia"] != "" ?  
							"<span class='h4 badge badge-success'>{$fila["hora_asistencia"]}</span>" 
							: "<span class='badge badge-danger'>NA</span>"
						?>
					</td> 
				</tr>
				<?php
				}
			?>
		</tbody>
		<tfoot class="bg-primary text-white">
			<tr class="">
				<td><b>TOTAL DE ASISTENCIA</b></td> 
				<td><b><?php echo ($asistencia ."/".count($registros) ) ?></b></td> 
				
			</tr>
		</tfoot>
	</table>
	
	<button id="enviar_reporte" class="float-right btn btn-info d-print-none">
		<i class="fas fa-envelope"></i> Enviar Reporte
	</button>
	
<button  onclick="window.print()" class="float-right btn btn-secondary d-print-none">
		<i class="fas fa-print"></i> Imprimir
	</button>
	<?php
	}
	else{
		
		echo "<div class='alert alert-warning'>No hay registros en este periodo</div>";
	}
?>