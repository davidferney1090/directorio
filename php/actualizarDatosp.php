<?php
	
	include "conexion.php";
	$conexion=conexion();

	$datos=array(			
			$conexion->real_escape_string(htmlentities($_POST['nombreProductou'])),
			$conexion->real_escape_string(htmlentities($_POST['precioProductou'])),
			$conexion->real_escape_string(htmlentities($_POST['idProductou']))
				);
	$sql="UPDATE producto set nombreProducto=?,
								precioProducto=?
						where idProducto=?";
	$query=$conexion->prepare($sql);
	$query->bind_param('ssi',$datos[0],
								$datos[1],
								$datos[2]);
	echo $query->execute();
	$query->close();
?>