<?php 
	include "conexion.php";
	$conexion=conexion();

	$sql="SELECT * from producto";
	$result=$conexion->query($sql);

	$tabla="";

	while($datos=$result->fetch_assoc()){
		$tabla=$tabla.'<tr>
							<td>'.$datos['idProducto'].'</td>
							<td>'.$datos['nombreProducto'].'</td>
							<td>'.$datos['precioProducto'].'</td>
							<td>
								<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdicionp('.$datos['idProducto'].')">
									<i class="fas fa-edit"></i>
								</span>
							</td>
							<td>
								<span class="btn btn-danger btn-sm" onclick="eliminarDatosp('.$datos['idProducto'].')">
									<i class="fas fa-trash-alt"></i>
								</span>
							</td>
					</tr>';
	}

	$conexion->close();

	echo '<table class="table table-stripped">
				<thead>
					<th>Código</th>
					<th>Nombre Producto</th>
					<th>Precio</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>'.$tabla.'
				</tbody>';

 ?>