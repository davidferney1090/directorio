<?php
	session_start();
	require_once "conexion1.php";

	$c= new conectar();
	$conexion=$c->conexion();

	$idCliente=$_POST['idCliente'];
	$idProducto=$_POST['idProducto'];
	$precioProducto=$_POST['precioProducto'];
	$fechaOrden=$_POST['fechaOrden'];
	$fechaEntrega=$_POST['fechaEntrega'];

	$sql="SELECT nombreCliente 
			from cliente
			where idCliente='$idCliente'";
	$result=mysqli_query($conexion,$sql);

	$c=mysqli_fetch_row($result);

	$ncliente=$c[0];

	$sql="SELECT nombreProducto 
			from producto
			where idProducto='$idProducto'";
	$result=mysqli_query($conexion,$sql);

	$nombreproducto=mysqli_fetch_row($result)[0];

	$producto=$idProducto."||".
				$nombreproducto."||".
				$precioProducto."||".
				$fechaOrden."||".
				$fechaEntrega."||".
				$idCliente;

	$_SESSION['tablaComprasTemp'][]=$producto;

?>