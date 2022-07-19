<?php

	include "conexion.php";
	$conexion=conexion();

	$datos=array(
			$conexion->real_escape_string(htmlentities($_POST['idOrden'])),
			$conexion->real_escape_string(htmlentities($_POST['fechaFactura']))
				);	
	$sql="INSERT into factura (idOrden,
								fechaFactura)
						values (?,?)";

	$query=$conexion->prepare($sql);
	$query->bind_param('ss',$datos[0],								
								$datos[1]);
	echo $query->execute();

	$query->close();
?>