<?php
	include "conexion.php";
	$conexion=conexion();
	$idProducto=$conexion->real_escape_string(htmlentities($_POST['idProducto']));

	$sql="DELETE from producto where idProducto=?";
	$query=$conexion->prepare($sql);
	$query->bind_param("i",$idProducto);
	echo $query->execute();
	$query->close();
?>
