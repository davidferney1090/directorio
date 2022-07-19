<?php
session_start();

if($_SESSION["s_usuario"] === null){
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Facturación - Productos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script
	src="http://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="../js/funcionesp.js"></script>
	
	<style type="text/css">
		.container{
			margin-top: 6em;
		}
	</style>
</head>
<body style="background-color: #5B101D">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="card text-white bg-dark mb-3">
					<div class="card-header">
						<li class="fas fa-stroopwafel"></li> <strong>PRODUCTOS</strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<section class="text-center">
									<span class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalInsertar">
										<i class="fas fa-plus-square"></i> Agregar Nuevo
									</span>
									<div class="text-right">
										<a class="btn btn-outline-warning btn-lg-4" href="modulos.php" role="button">Regresar a Módulos</a>
									</div>
									<div>
										<br>
									</div>
								</section>
								<div id="tablaDatos"></div>
							</div>
						</div>
					</div>					
					<div class="card-footer text-muted text-right">
						Sistema de Facturación
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--Ventana de Inserción de Datos-->
	
	<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Insertar Datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmAgregarDatosp">
						<!--<label>Id</label>
						<input type="text" id="idProducto" name="idProducto" class="form-control form-control-sm">-->
						<label>Nombre Producto</label>
						<input type="text" id="nombreProducto" name="nombreProducto" class="form-control form-control-sm">
						<label>Precio</label>
						<input type="text" id="precioProducto" name="precioProducto" class="form-control form-control-sm">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarDatos" onclick="agregarDatosp()">Guardar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Ventana Actualización de Datos-->

	<div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmAgregarDatospu">
						<label>Código</label>
						<input type="text" id="idProductou" name="idProductou" class="form-control form-control-sm" readonly="true">
						<label>Nombre Producto</label>
						<input type="text" id="nombreProductou" name="nombreProductou" class="form-control form-control-sm">
						<label>Precio</label>
						<input type="text" id="precioProductou" name="precioProductou" class="form-control form-control-sm">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal" onclick="actualizarDatosp()">Actualizar</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			mostrarDatosp();
		});
	</script>
</body>
</html>