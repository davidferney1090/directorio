function mostrarDatoso(){
	$.ajax({
		url:"../php/mostrarDatoso.php",
		success:function(r){
			$('#tablaDatos').html(r);
		}
	});
}

function agregarDatoso(){

	if($('#idCliente').val()==""){
		swal("Debes agregar Identificación del Cliente!");
		return false;
	}else if($('#idProducto').val()==""){
		swal("Debes agregar Identificación del Producto!");
		return false;
	}else if($('#fechaOrden').val()==""){
		swal("Debes agregar fecha de la Orden!");
		return false;
	}else if($('#fechaEntrega').val()==""){
		swal("Debes agregar fecha de entrega!");
		return false;
	}
	$.ajax({
		type:"POST",
		data:$('#frmAgregarDatoso').serialize(),
		url:"../php/agregarDatoso.php",
		success:function(r){
			if(r==1){
				$('#frmAgregarDatoso')[0].reset();
				mostrarDatoso();
				swal("Agregado Correctamente", {icon: "success"});
			}else{
				swal("Error al agregar", {icon: "error"});
			}
		}
	});
}

function eliminarDatoso(idOrden){
	swal({
		title: "Estás seguro de eliminar este registro?",
		text: "NO se podrá recuperar!!!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				data:"idOrden=" + idOrden,
				url:"../php/eliminaro.php",
				success:function(r){
					if(r==1){						
						mostrarDatoso();
						swal("Eliminado Correctamente", {icon: "success"});
					}else{
						swal("Error al eliminar", {icon: "error"});
					}
				}
			});
		} 
	});
}

function agregaDatosParaEdiciono(idOrden){
	$.ajax({
		type:"POST",
		data:"idOrden=" + idOrden,
		url:"../php/datosUpdateo.php",
		success:function(r){
			datos=jQuery.parseJSON(r);
			$('#idOrdenu').val(datos['idOrden']);
			$('#idClienteu').val(datos['idCliente']);
			$('#idProductou').val(datos['idProducto']);
			$('#fechaOrdenu').val(datos['fechaOrden']);			
			$('#fechaEntregau').val(datos['fechaEntrega']);
		}
	});
}
	function actualizarDatoso(){
		if($('#idOrdenu').val()==""){
			swal("Debes agregar Identificación del Cliente!");
			return false;
		}

		$.ajax({
			type:"POST",
			data:$('#frmAgregarDatosou').serialize(),
			url:"../php/actualizarDatoso.php",
			success:function(r){
				if(r==1){					
					mostrarDatoso();
					swal("Actualizado Correctamente", {icon: "success"});
				}else{
					swal("Error al Actualizar", {icon: "error"});
				}
			}
		});

	}

function validarFormVacio(formulario){
		datos=$('#' + formulario).serialize();
		d=datos.split('&');
		vacios=0;
		for(i=0;i< d.length;i++){
				controles=d[i].split("=");
				if(controles[1]=="A" || controles[1]==""){
					vacios++;
				}
		}
		return vacios;
}