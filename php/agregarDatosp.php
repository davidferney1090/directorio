<?php

	include "conexion.php";
	$conexion=conexion();

	$datos=array(
			$conexion->real_escape_string(htmlentities($_POST['nombreProducto'])),
			$conexion->real_escape_string(htmlentities($_POST['precioProducto']))
				);	
	$sql="INSERT into producto (nombreProducto,
								precioProducto)
						values (?,?)";

	$query=$conexion->prepare($sql);
	$query->bind_param('ss',$datos[0],
								$datos[1]);
	echo $query->execute();

	$query->close();
?>