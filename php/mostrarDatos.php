<?php 
	include "conexion.php";
	$conexion=conexion();

	$sql="SELECT * from contactos";
	$result=$conexion->query($sql);

	$tabla="";

	while($datos=$result->fetch_assoc()){
		$tabla=$tabla.'<tr>
							<td>'.$datos['idContacto'].'</td>
							<td>'.$datos['nombreContacto'].'</td>
							<td>'.$datos['direccionContacto'].'</td>
							<td>'.$datos['telefonoContacto'].'</td>
							<td>'.$datos['ciudadContacto'].'</td>
							<td>'.$datos['paisContacto'].'</td>
							<td>
								<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="agregaDatosParaEdicion('.$datos['idContacto'].')">
									<i class="fas fa-edit"></i>
								</span>
							</td>
							<td>
								<span class="btn btn-danger btn-sm" onclick="eliminarDatos('.$datos['idContacto'].')">
									<i class="fas fa-trash-alt"></i>
								</span>
							</td>
					</tr>';
	}

	$conexion->close();

	echo '<table class="table table-stripped">
				<thead>
					<th>Cédula</th>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Telefono</th>
					<th>Ciudad</th>
					<th>País</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>'.$tabla.'
				</tbody>';

 ?>