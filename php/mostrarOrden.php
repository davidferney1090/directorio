<?php
	
	/*include "conexion.php";
	$conexion=conexion();*/

	class mostrarOrden{
		public function obtenerDatosProducto($idProducto){
			$c = new conectar();
			$conexion = $c->conexion();

			$sql="SELECT idProducto,
							nombreProducto,
							precioProducto
					from producto
					where idProducto='$idProducto'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
					'nombreProducto' => $ver[1],
					'precioProducto' => $ver[2]
						);
			return $datos;
		}
	}

?>