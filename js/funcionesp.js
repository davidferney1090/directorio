function mostrarDatosp(){
	$.ajax({
		url:"../php/mostrarDatosp.php",
		success:function(r){
			$('#tablaDatos').html(r);
		}
	});
}

function agregarDatosp(){

	if($('#nombreProducto').val()==""){
		swal("Debes agregar Nombre de Producto!");
		return false;
	}else if($('#precioProducto').val()==""){
		swal("Debes agregar Precio al Producto!");
		return false;
	}
	$.ajax({
		type:"POST",
		data:$('#frmAgregarDatosp').serialize(),
		url:"../php/agregarDatosp.php",
		success:function(r){
			if(r==1){
				$('#frmAgregarDatosp')[0].reset();
				mostrarDatosp();
				swal("Agregado Correctamente", {icon: "success"});
			}else{
				swal("Error al agregar", {icon: "error"});
			}
		}
	});
}

function eliminarDatosp(idProducto){
	swal({
		title: "Estas seguro de eliminar este registro?",
		text: "El registro NO se podra recuperar!!!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				data:"idProducto=" + idProducto,
				url:"../php/eliminarp.php",
				success:function(r){
					if(r==1){						
						mostrarDatosp();
						swal("Eliminado Correctamente", {icon: "success"});
					}else{
						swal("Error al eliminar", {icon: "error"});
					}
				}
			});
		} 
	});
}

function agregaDatosParaEdicionp(idProducto){
	$.ajax({
		type:"POST",
		data:"idProducto=" + idProducto,
		url:"../php/datosUpdatep.php",
		success:function(r){
			datos=jQuery.parseJSON(r);
			$('#idProductou').val(datos['idProducto']);
			$('#nombreProductou').val(datos['nombreProducto']);
			$('#precioProductou').val(datos['precioProducto']);
		}
	});
}
	function actualizarDatosp(){
		if($('#nombreProductou').val()==""){
			swal("Debes agregar un Nombre al Producto!");
			return false;
		}

		$.ajax({
			type:"POST",
			data:$('#frmAgregarDatospu').serialize(),
			url:"../php/actualizarDatosp.php",
			success:function(r){
				if(r==1){					
					mostrarDatosp();
					swal("Actualizado Correctamente", {icon: "success"});
				}else{
					swal("Error al Actualizar", {icon: "error"});
				}
			}
		});

	}