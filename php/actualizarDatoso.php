<?php
	
	include "conexion.php";
	$conexion=conexion();

	$datos=array(			
			$conexion->real_escape_string(htmlentities($_POST['idClienteu'])),
			$conexion->real_escape_string(htmlentities($_POST['idProductou'])),
			$conexion->real_escape_string(htmlentities($_POST['fechaOrdenu'])),
			$conexion->real_escape_string(htmlentities($_POST['fechaEntregau'])),
			$conexion->real_escape_string(htmlentities($_POST['idOrdenu']))
				);
	$sql="UPDATE ordenpedido set idCliente=?,
								idProducto=?,
								fechaOrden=?,
								fechaEntrega=?
						where idOrden=?";
	$query=$conexion->prepare($sql);
	$query->bind_param('ssssi',$datos[0],
									$datos[1],
									$datos[2],
									$datos[3],
									$datos[4]);
	echo $query->execute();
	$query->close();
?>