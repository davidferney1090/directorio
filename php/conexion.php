<?php 

	function conexion(){
		$conexion= new mysqli("localhost", "root" ,"","dir");
		if($conexion->connect_errno){
			echo "Fallo al conectar :". $conexion->connect_error;
		}
		$conexion->set_charset("utf8");
		return $conexion;
	}
 ?>