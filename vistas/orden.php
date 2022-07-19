<?php
session_start();

if($_SESSION["s_usuario"] === null){
    header("Location: ../index.php");
}

?>

<?php
	
	include "../php/conexion.php";
	$conexion=conexion();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Facturación - Orden de Pedido</title>
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
	<script src="../js/funcioneso.js"></script>
	
	<style type="text/css">
		.container{
			margin-top: 6em;
		}
	</style>
</head>
<body style="background-color:#624A1E">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="card text-white bg-dark mb-3">
					<div class="card-header">
						<li class="fas fa-book"></li> <strong>ORDEN DE PEDIDO</strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<section class="text-center">
									<span class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalInsertar">
										<i class="fas fa-plus-circle"></i> Agregar Nuevo
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
					<form id="frmAgregarDatoso">
						<label>Cédula o NIT</label>
						<select type="text" id="idCliente" name="idCliente" class="form-control form-control-sm"> 	
							<option value="A">Selecciona Cliente</option>
							<?php 
								$sql="SELECT idCliente, nombreCliente from cliente";
								$result=mysqli_query($conexion, $sql);
							while ($cliente=mysqli_fetch_row($result)):
							?>
							<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1]?></option>	
							<?php endwhile; ?>
						</select>				
						<label>Producto</label>
						<select type="text" id="idProducto" name="idProducto" class="form-control form-control-sm">
							<option value="A">Selecciona Producto</option>
							<?php 
								$sql="SELECT idProducto, nombreProducto from producto";
								$result=mysqli_query($conexion, $sql);
							while ($producto=mysqli_fetch_row($result)):
							?>
							<option value="<?php echo $producto[0] ?>"><?php echo $producto[1]?></option>	
							<?php endwhile; ?>
						</select>
						<label>Precio</label>
						<input type="text" id="precioProducto" name="precioProducto" class="form-control form-control-sm">
						<label>Fecha Orden</label>
						<input type="date" id="fechaOrden" name="fechaOrden" class="form-control form-control-sm">
						<label>Fecha Entrega</label>
						<input type="date" id="fechaEntrega" name="fechaEntrega" class="form-control form-control-sm">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarDatos" onclick="agregarDatoso()">Guardar</button>
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
					<form id="frmAgregarDatosou">
						<label>Id Orden</label>
						<input type="text" id="idOrdenu" name="idOrdenu" class="form-control form-control-sm" readonly="true">
						<label>Cédula o NIT</label>
						<select type="text" id="idClienteu" name="idClienteu" class="form-control form-control-sm"> 	
							<option value="A">Selecciona Cliente</option>
							<?php 
								$sql="SELECT idCliente, nombreCliente from cliente";
								$result=mysqli_query($conexion, $sql);
							while ($cliente=mysqli_fetch_row($result)):
							?>
							<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1]?></option>	
							<?php endwhile; ?>
						</select>
						<label>Producto</label>
						<select type="text" id="idProductou" name="idProductou" class="form-control form-control-sm">
							<option value="A">Selecciona Producto</option>
							<?php 
								$sql="SELECT idProducto, nombreProducto from producto";
								$result=mysqli_query($conexion, $sql);
							while ($producto=mysqli_fetch_row($result)):
							?>
							<option value="<?php echo $producto[0] ?>"><?php echo $producto[1]?></option>	
							<?php endwhile; ?>
						</select>
						<label>Precio</label>
						<input type="text" id="precioProductou" name="precioProductou" class="form-control form-control-sm">
						<label>Fecha Orden</label>
						<input type="date" id="fechaOrdenu" name="fechaOrdenu" class="form-control form-control-sm">
						<label>Fecha Entrega</label>
						<input type="date" id="fechaEntregau" name="fechaEntregau" class="form-control form-control-sm">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal" onclick="actualizarDatoso()">Actualizar</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#idProducto').change(function(){
				$.ajax({
					type:"POST",
					data:"idProducto=" + $('#idProducto').val(),
					url:"../php/llenarOrden.php",
					success:function(r){
						dato=jQuery.parseJSON(r);

						$('#precioProducto').val(dato['precioProducto']);
						/*$('#fechaOrdenu').val(dato['fechaOrden']);
						$('#fechaEntregau').val(dato['fechaEntrega']);*/
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#idProductou').change(function(){
				$.ajax({
					type:"POST",
					data:"idProducto=" + $('#idProductou').val(),
					url:"../php/llenarOrden.php",
					success:function(r){
						dato=jQuery.parseJSON(r);

						$('#precioProductou').val(dato['precioProducto']);
						/*$('#fechaOrdenu').val(dato['fechaOrden']);
						$('#fechaEntregau').val(dato['fechaEntrega']);*/
					}
				});
			});
		});
	</script>


	<script type="text/javascript">
		$(document).ready(function(){
			mostrarDatoso();
		});
	</script>	
</body>
</html>