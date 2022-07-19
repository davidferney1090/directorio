<?php
	
	include "conexion.php";
	$conexion=conexion();

	$datos=array(			
			$conexion->real_escape_string(htmlentities($_POST['idOrdenu'])),
			$conexion->real_escape_string(htmlentities($_POST['fechaFacturau'])),			
			$conexion->real_escape_string(htmlentities($_POST['idFacturau']))
				);
	$sql="UPDATE factura set idOrden=?,
								fechaFactura=?
						where idFactura=?";
	$query=$conexion->prepare($sql);
	$query->bind_param('ssi',$datos[0],
									$datos[1],
									$datos[2]);
	echo $query->execute();
	$query->close();
?>