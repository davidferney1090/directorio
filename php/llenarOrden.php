<?php
	require_once "conexion1.php";
	require_once "mostrarOrden.php";

	$obj= new mostrarOrden();

	echo json_encode($obj->obtenerDatosProducto($_POST['idProducto']));

?>
