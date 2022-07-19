<?php 
	include "conexion.php";
	$conexion=conexion();

	$sql="SELECT fac.idFactura, ord.idOrden, cli.nombreCliente, cli.direccionCliente, cli.telefonoCliente, pro.nombreProducto, pro.precioProducto, fac.fechaFactura FROM factura fac INNER JOIN ordenPedido ord ON fac.idOrden = ord.idOrden INNER JOIN cliente cli ON ord.idCliente = cli.idCliente INNER JOIN producto pro ON ord.idProducto = pro.idProducto";
	$result=$conexion->query($sql);

	$tabla="";

	while($datos=$result->fetch_assoc()){
		$tabla=$tabla.'<tr>
							<td>'.$datos['idFactura'].'</td>
							<td>'.$datos['idOrden'].'</td>
							<td>'.$datos['nombreCliente'].'</td>
							<td>'.$datos['direccionCliente'].'</td>
							<td>'.$datos['telefonoCliente'].'</td>
							<td>'.$datos['nombreProducto'].'</td>
							<td>'.$datos['precioProducto'].'</td>
							<td>'.$datos['fechaFactura'].'</td>
							<td>
								<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdicionf('.$datos['idFactura'].')">
									<i class="fas fa-edit"></i>
								</span>
							</td>
							<td>
								<span class="btn btn-danger btn-sm" onclick="eliminarDatosf('.$datos['idFactura'].')">
									<i class="fas fa-trash-alt"></i>
								</span>
							</td>
					</tr>';
	}

	$conexion->close();

	echo '<table class="table table-stripped">
				<thead>
					<th># Factura</th>
					<th># Orden Pedido</th>
					<th>Nombre Cliente</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Producto</th>
					<th>Precio</th>
					<th>Fecha Factura</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>'.$tabla.'
				</tbody>';

 ?>