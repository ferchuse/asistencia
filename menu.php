<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-2 na ">
	
	<a class="navbar-brand" href="#">
		<!-- <img src="../img/.jpg" class="" width="40px">-->
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav mr-auto">
			<?php if($_COOKIE["permiso_usuarios"] == "administrador" ){?>
				
				<li class="nav-item">
					<a class="nav-link" href="../alumnos">
						<i class="fas fa-users"></i> Alumnos
					</a>
				</li>
				
				<li class="nav-item ">
					<a class="nav-link" href="../reportes">
						<i class="fas fa-chart-bar"></i> Reportes
					</a>
				</li>
				
				<?php
				}
			?>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="#1">
					<i class="fas fa-user"></i>	<?php echo $_COOKIE["nombre_usuarios"]?>
					<input type="hidden" id="cookie_id_usuarios" value="<?php echo $_COOKIE["id_usuarios"]?>">
					<input type="hidden" id="cookie_nombre_usuarios" value="<?php echo $_COOKIE["nombre_usuarios"]?>">
					<input type="hidden" id="cookie_permiso_usuarios" value="<?php echo $_COOKIE["permiso_usuarios"]?>">
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../login/logout.php">
					<i class="fas fa-sign-out-alt"></i>	Salir
				</a>
			</li>
		</ul>
	</div> 
</nav>

