<?php

	include "conexion.php";
	$conexion=conexion();
	$idProducto=$conexion->real_escape_string(htmlentities($_POST['idProducto']));

$sql="SELECT idProducto,
			nombreProducto,
			precioProducto
	from producto where idProducto=?";
$query=$conexion->prepare($sql);
$query->bind_param('i',$idProducto);
$query->execute();
$datos= $query->get_result()->fetch_assoc();

echo json_encode($datos);
?>