<?php
	include "conexion.php";
	$conexion=conexion();
	$idFactura=$conexion->real_escape_string(htmlentities($_POST['idFactura']));

	$sql="DELETE from factura where idFactura=?";
	$query=$conexion->prepare($sql);
	$query->bind_param("i",$idFactura);
	echo $query->execute();
	$query->close();
?>
