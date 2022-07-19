<?php 
	include "conexion.php";
	$conexion=conexion();

	$sql="SELECT ord.idOrden, cl.nombreCliente, pro.nombreProducto, pro.precioProducto, ord.fechaOrden, ord.fechaEntrega FROM ordenpedido ord INNER JOIN cliente cl ON ord.idCliente = cl.idCliente INNER JOIN producto pro ON ord.idProducto = pro.idProducto";
	$result=$conexion->query($sql);

	$tabla="";

	while($datos=$result->fetch_assoc()){
		$tabla=$tabla.'<tr>
							<td>'.$datos['idOrden'].'</td>
							<td>'.$datos['nombreCliente'].'</td>
							<td>'.$datos['nombreProducto'].'</td>
							<td>'.$datos['precioProducto'].'</td>
							<td>'.$datos['fechaOrden'].'</td>
							<td>'.$datos['fechaEntrega'].'</td>
							<td>
								<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdiciono('.$datos['idOrden'].')">
									<i class="fas fa-edit"></i>
								</span>
							</td>
							<td>
								<span class="btn btn-danger btn-sm" onclick="eliminarDatoso('.$datos['idOrden'].')">
									<i class="fas fa-trash-alt"></i>
								</span>
							</td>
					</tr>';
	}

	$conexion->close();

	echo '<table class="table table-stripped">
				<thead>
					<th># Orden</th>
					<th>Cliente</th>
					<th>Producto</th>
					<th>Precio Prod.</th>
					<th>Fecha Orden</th>
					<th>Fecha Entrega</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>'.$tabla.'
				</tbody>';

 ?>