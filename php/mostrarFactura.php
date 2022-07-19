<?php	

	class mostrarFactura{
		public function obtenerDatosOrden($idOrden){
			$c = new conectar();
			$conexion = $c->conexion();

			$sql="SELECT ord.idOrden,
							cli.nombreCliente,
							cli.direccionCliente,
							cli.telefonoCliente,
							pro.nombreProducto,
							pro.precioProducto
					from ordenpedido as ord
					inner join cliente as cli
					on ord.idCliente = cli.idCliente
					inner join producto as pro
					on ord.idProducto = pro.idProducto
					where idOrden='$idOrden'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
					'nombreCliente' => $ver[1],
					'direccionCliente' => $ver[2],
					'telefonoCliente' => $ver[3],
					'nombreProducto' => $ver[4],
					'precioProducto' => $ver[5]
						);
			return $datos;
		}
	}

?>