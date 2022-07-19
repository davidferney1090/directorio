<?php
	require_once "conexion1.php";
	require_once "mostrarFactura.php";

	$obj= new mostrarFactura();

	echo json_encode($obj->obtenerDatosOrden($_POST['idOrden'])) 

?>
