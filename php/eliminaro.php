<?php
	include "conexion.php";
	$conexion=conexion();
	$idOrden=$conexion->real_escape_string(htmlentities($_POST['idOrden']));

	$sql="DELETE from ordenpedido where idOrden=?";
	$query=$conexion->prepare($sql);
	$query->bind_param("i",$idOrden);
	echo $query->execute();
	$query->close();
?>
