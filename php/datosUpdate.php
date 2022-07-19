<?php

	include "conexion.php";
	$conexion=conexion();
	$idContacto=$conexion->real_escape_string(htmlentities($_POST['idContacto']));

$sql="SELECT idContacto,
			nombreContacto,
			direccionContacto,
			telefonoContacto,
			ciudadContacto,
			paisContacto
	from contactos where idContacto=?";
$query=$conexion->prepare($sql);
$query->bind_param('i',$idContacto);
$query->execute();
$datos= $query->get_result()->fetch_assoc();

echo json_encode($datos);
?>