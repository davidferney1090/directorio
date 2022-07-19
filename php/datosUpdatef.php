<?php

	include "conexion.php";
	$conexion=conexion();
	$idFactura=$conexion->real_escape_string(htmlentities($_POST['idFactura']));

$sql="SELECT idFactura,
			idOrden,
			fechaFactura
	from factura where idFactura=?";
$query=$conexion->prepare($sql);
$query->bind_param('i',$idFactura);
$query->execute();
$datos= $query->get_result()->fetch_assoc();

echo json_encode($datos);
?>