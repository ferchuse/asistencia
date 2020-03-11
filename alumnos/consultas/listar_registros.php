<?php
	include("../../conexi.php");
	$link = Conectarse();
	
	$consulta = '
	SELECT 
	
	matricula,
	CONCAT(ape_pat, " ", ape_mat, " ", nombre_alumno) AS nombre_completo
	FROM 
	alumnos
	';
	
	$consulta.="
	ORDER BY
	{$_GET["sort"]} {$_GET["order"]}
	";
	
	
	$result = mysqli_query($link, $consulta) or die("<pre>Error en $consulta" . mysqli_error($link) . "</pre>");
	
	while ($fila = mysqli_fetch_assoc($result)) {
		
		$registros[] = $fila;
	}
?>
<pre hidden>
	<?php echo $consulta; ?>
</pre>

<table class="table table-hover" id="tabla_registros">
	<thead class=" text-white">
		<tr>
			<th class="text-center"><a class="sort" href="#!" data-columna="matricula">Matricula</a> </th>
			<th class="text-center"><a class="sort" href="#!" data-columna="nombre_completo">Nombre</a> </th>
			<th class="text-center">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$total_deuda=0;
			foreach ($registros as $i => $fila) {
			?>
			<tr class="text-center">
				<td><?php echo $fila["matricula"]; ?></td>
				<td><?php echo $fila["nombre_completo"]; ?></td>
				
				<td>
					<a target="_blank" class="btn btn-info btn_editar" href="imprimir_codigo.php?matricula=<?= $fila["matricula"]?>&nombre_completo=<?= $fila["nombre_completo"]?>">
						<i class="fa fa-barcode"></i> Imprimir Código
					</a>
					<button class="btn btn-warning btn_editar" data-id_registro="<?php echo $fila["matricula"] ?>">
						<i class="fa fa-edit"></i> Editar
					</button>
					<button class="btn btn-danger btn_borrar" data-id_registro="<?php echo $fila["matricula"] ?>">
						<i class="fa fa-trash"></i> Borrar
					</button>
				</td>
				
			</tr>
			<?php
			}
		?>
	</tbody>
	<tfoot>
		<tr class="text-center bg-info text-white h5">
			
			
		</tr>
	</tfoot>
</table>
