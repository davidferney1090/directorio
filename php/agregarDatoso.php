<?php

	include "conexion.php";
	$conexion=conexion();

	$datos=array(
			$conexion->real_escape_string(htmlentities($_POST['idCliente'])),
			$conexion->real_escape_string(htmlentities($_POST['idProducto'])),
			$conexion->real_escape_string(htmlentities($_POST['fechaOrden'])),
			$conexion->real_escape_string(htmlentities($_POST['fechaEntrega']))
				);	
	$sql="INSERT into ordenpedido (idCliente,
								idProducto,
								fechaOrden,
								fechaEntrega)
						values (?,?,?,?)";

	$query=$conexion->prepare($sql);
	$query->bind_param('ssss',$datos[0],
								$datos[1],
								$datos[2],
								$datos[3]);
	echo $query->execute();

	$query->close();
?>