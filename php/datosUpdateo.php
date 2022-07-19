<?php

	include "conexion.php";
	$conexion=conexion();
	$idOrden=$conexion->real_escape_string(htmlentities($_POST['idOrden']));

$sql="SELECT idOrden,
			idCliente,
			idProducto,
			fechaOrden,
			fechaEntrega
	from ordenpedido where idOrden=?";
$query=$conexion->prepare($sql);
$query->bind_param('i',$idOrden);
$query->execute();
$datos= $query->get_result()->fetch_assoc();

echo json_encode($datos);
?>