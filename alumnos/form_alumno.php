<form id="form_alumno" autocomplete="off" class="was-validated">
	<div id="modal_alumno" class="modal fade" role="dialog">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title text-center">Editar Alumno</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="matricula">Matrícula:</label>
								<input  type="text" class="form-control" name="matricula" id="matricula" required>
							</div>
							<div class="form-group">
								<label for="alias_clientes">Nombre :</label>
								<input  type="text" class="form-control" name="alias_clientes" id="alias_clientes" required>
							</div>
							<div class="form-group">
								<label for="ape_pat">Apellido Paterno:</label>
								<input  class="form-control" type="text" name="ape_pat" id="ape_pat" required>
							</div>
							<div class="form-group">
								<label for="ape_mat">Apellido Materno:</label>
								<input  class="form-control" type="text" name="ape_mat" id="ape_mat" required>
							</div>
							<div class="form-group">
								<label for="contrasena">Contraseña:</label>
								<input  class="form-control" type="password" name="contrasena" id="contrasena" required>
							</div>
							<div class="form-group">
								<label for="id_vendedores">Correo Padre:</label>
									<input  class="form-control" type="email" name="correo" id="ape_mat" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
					<button type="submit" class="btn btn-success" id="btn_formAlta">
						<i class="fa fa-save"></i> Guardar
					</button>
				</div>
			</div>
		</div>
	</div>
</form>	