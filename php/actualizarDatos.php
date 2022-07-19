<?php
	
	include "conexion.php";
	$conexion=conexion();

	$datos=array(			
			$conexion->real_escape_string(htmlentities($_POST['nombreContactou'])),
			$conexion->real_escape_string(htmlentities($_POST['direccionContactou'])),
			$conexion->real_escape_string(htmlentities($_POST['telefonoContactou'])),
			$conexion->real_escape_string(htmlentities($_POST['ciudadContactou'])),
			$conexion->real_escape_string(htmlentities($_POST['paisContactou'])),
			$conexion->real_escape_string(htmlentities($_POST['idContactou']))
				);
	$sql="UPDATE contactos set nombreContacto=?,
								direccionContacto=?,
								telefonoContacto=?,
								ciudadContacto=?,
								paisContacto=?
						where idContacto=?";
	$query=$conexion->prepare($sql);
	$query->bind_param('sssssi',$datos[0],
								$datos[1],
								$datos[2],
								$datos[3],
								$datos[4],
								$datos[5]);
	echo $query->execute();
	$query->close();
?>