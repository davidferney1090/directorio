<?php
	include "conexion.php";
	$conexion=conexion();
	$idContacto=$conexion->real_escape_string(htmlentities($_POST['idContacto']));

	$sql="DELETE from contactos where idContacto=?";
	$query=$conexion->prepare($sql);
	$query->bind_param("i",$idContacto);
	echo $query->execute();
	$query->close();
?>
