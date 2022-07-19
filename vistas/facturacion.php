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
	<title>Sistema de Facturación - Facturación</title>
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
	<script src="../js/funcionesf.js"></script>
	
	<style type="text/css">
		.container{
			margin-top: 6em;
		}
	</style>
</head>
<body style="background-color:#043009">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="card text-white bg-dark mb-3">
					<div class="card-header">
						<li class="fas fa-file-invoice"></li> <strong>FACTURA</strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<section class="text-center">
									<span class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalInsertar">
										<i class="far fa-plus-square"></i> Agregar Nuevo
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
					<form id="frmAgregarDatosf">
						<label>Orden de Pedido</label>
						<select type="text" id="idOrden" name="idOrden" class="form-control form-control-sm">
							<option value="A">Selecciona # Orden de Pedido</option>
							<?php 
								$sql="SELECT idOrden from ordenpedido";
								$result=mysqli_query($conexion, $sql);
							while ($ordenpedido=mysqli_fetch_row($result)):
							?>
							<option value="<?php echo $ordenpedido[0]?>"><?php echo $ordenpedido[0]?></option>	
							<?php endwhile; ?>
						</select>
						<label>Nombre Cliente</label>
						<input type="text" id="nombreCliente" name="nombreCliente" class="form-control form-control-sm" readonly="true">
						<label>Dirección</label>
						<input type="text" id="direccionCliente" name="direccionCliente" class="form-control form-control-sm" readonly="true">
						<label>Teléfono</label>
						<input type="text" id="telefonoCliente" name="telefonoCliente" class="form-control form-control-sm" readonly="true">
						<label>Producto</label>
						<input type="text" id="nombreProducto" name="nombreProducto" class="form-control form-control-sm" readonly="true">
						<label>Precio Producto</label>
						<input type="text" id="precioProducto" name="precioProducto" class="form-control form-control-sm" readonly="true">
						<label>Fecha Factura (aaaa-mm-dd)</label>
						<input type="date" id="fechaFactura" name="fechaFactura" class="form-control form-control-sm">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarDatos" onclick="agregarDatosf()">Guardar</button>
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
					<form id="frmAgregarDatosfu">
						<label># Factura</label>
						<input type="text" id="idFacturau" name="idFacturau" class="form-control form-control-sm" readonly="true">
						<label># Orden</label>
						<select type="text" id="idOrdenu" name="idOrdenu" class="form-control form-control-sm">
							<option value="A">Selecciona # Orden de Pedido</option>
							<?php 
								$sql="SELECT idOrden from ordenpedido";
								$result=mysqli_query($conexion, $sql);
							while ($ordenpedido=mysqli_fetch_row($result)):
							?>
							<option><?php echo $ordenpedido[0]?></option>	
							<?php endwhile; ?>
						</select>
						<label>Nombre Cliente</label>
						<input type="text" id="nombreClienteu" name="nombreClienteu" class="form-control form-control-sm" readonly="true">
						<label>Dirección</label>
						<input type="text" id="direccionClienteu" name="direccionClienteu" class="form-control form-control-sm" readonly="true">
						<label>Teléfono</label>
						<input type="text" id="telefonoClienteu" name="telefonoClienteu" class="form-control form-control-sm" readonly="true">
						<label>Producto</label>
						<input type="text" id="nombreProductou" name="nombreProductou" class="form-control form-control-sm" readonly="true">
						<label>Precio Producto</label>
						<input type="text" id="precioProductou" name="precioProductou" class="form-control form-control-sm" readonly="true">
						<label>Fecha Factura (aaaa-mm-dd)</label>
						<input type="date" id="fechaFacturau" name="fechaFacturau" class="form-control form-control-sm">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal" onclick="actualizarDatosf()">Actualizar</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#idOrden').change(function(){
				$.ajax({
					type:"POST",
					data:"idOrden=" + $('#idOrden').val(),
					url:"../php/llenarFactura.php",
					success:function(r){
						dato=jQuery.parseJSON(r);

						$('#nombreCliente').val(dato['nombreCliente']);
						$('#direccionCliente').val(dato['direccionCliente']);
						$('#telefonoCliente').val(dato['telefonoCliente']);
						$('#nombreProducto').val(dato['nombreProducto']);
						$('#precioProducto').val(dato['precioProducto']);
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#idOrdenu').change(function(){
				$.ajax({
					type:"POST",
					data:"idOrden=" + $('#idOrdenu').val(),
					url:"../php/llenarFactura.php",
					success:function(r){
						dato=jQuery.parseJSON(r);

						$('#nombreClienteu').val(dato['nombreCliente']);
						$('#direccionClienteu').val(dato['direccionCliente']);
						$('#telefonoClienteu').val(dato['telefonoCliente']);
						$('#nombreProductou').val(dato['nombreProducto']);
						$('#precioProductou').val(dato['precioProducto']);
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			mostrarDatosf();
		});
	</script>
</body>
</html>