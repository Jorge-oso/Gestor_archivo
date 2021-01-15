<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
	<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
	<style>
		.container {
			max-width: 550px;
		}
		.push-top {
			margin-top: 80px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="card push-top"><!--Contorno-->
			<div class="row">
				<div class="col-sm-12">
					<div class="card-header"><!--Cabecera-->
						<h3>REGISTRO DE USUARIO</h3>
					</div>
					<form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
						<div class="card-body"><!--Formulario centrado-->
							<div class="form-group col-md-12">
								<label>Nombre personal</label>
								<input type="text" name="nombre" id="nombre" class="form-control" required="">
							</div>
							<div class="form-group col-md-12">
								<label>Fecha de nacimiento</label>
								<input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" readonly="">
							</div>
							<div class="form-group col-md-12">
								<label>E-mail o correo</label>
								<input type="email" name="correo" id="correo" class="form-control" required="">
							</div>
							<div class="form-group col-md-12">
								<label>Nombre de Usuario</label>
								<input type="text" name="usuario" id="usuario" class="form-control" required="">
							</div>
							<div class="form-group col-md-12">
								<label>Password o contraeña</label>
								<input type="password" name="password" id="password" class="form-control" required="">
							</div>
							<div class="row">
							<div class="col-sm-6 text-left">
								<button class="btn btn-primary">Registrar</button>		
							</div>
							<div class="col-sm-6 text-right">		
								<a href="index.php" class="btn btn-success">Login</a>
							</div>
						</div>
						</div>
					</form>
				</div>
				<div class="col-sm-4"></div>	
			</div>
		</div>
	</div>
	<script src="librerias/js/jquery-3.5.1.min.js"></script>
	<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="librerias/sweetalert.min.js"></script>

	<script type="text/javascript">


		$(function(){
			var fechaA = new Date();
			var yyyy = fechaA.getFullYear();

			$("#fechaNacimiento").datepicker({

				changeMonth: true,
				changeYear: true,
				yearRange: '1990:' + yyyy,
				dateFormat: "dd-mm-yy"
			});
		});
		

		function agregarUsuarioNuevo() {
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "procesos/usuario/registro/agregarUsuario.php",
				success:function(respuesta){
					console.log(respuesta);
					respuesta = respuesta.trim();
					if (respuesta == 1) {
						swal(":(", "FALLO AL AGREGAR", "error");
					}else if (respuesta == 2) {
						swal("NOMBRE DE USUARIO YA EXISTE, POR FAVOR, ESCRIBE OTRO!!!");
					}else {
						$('#frmRegistro')[0].reset();
						swal(":D", "Agregado con exito", "success");
					}
				}
			});

			return false;
		}
	</script>
</body>
</html>
