function mostrarDatos(){
	$.ajax({
		url:"../php/mostrarDatos.php",
		success:function(r){
			$('#tablaDatos').html(r);
		}
	});
}

function agregarDatos(){

	if($('#idContacto').val()==""){
		swal("Debes agregar Cédula!");
		return false;
	}else if($('#nombreContacto').val()==""){
		swal("Debes agregar Nombre!");
		return false;
	}else if($('#direccionContacto').val()==""){
		swal("Debes agregar Dirección!");
		return false;
	}else if($('#telefonoContacto').val()==""){
		swal("Debes agregar Teléfono!");
		return false;
	}else if($('#ciudadContacto').val()==""){
		swal("Debes agregar Ciudad!");
		return false;
	}else if($('#paisContacto').val()==""){
		swal("Debes agregar Pais!");
		return false;
	}
	$.ajax({
		type:"POST",
		data:$('#frmAgregarDatos').serialize(),
		url:"../php/agregarDatos.php",
		success:function(r){
			if(r==1){
				$('#frmAgregarDatos')[0].reset();
				mostrarDatos();
				swal("Agregado Correctamente", {icon: "success"});
			}else{
				swal("Error al agregar", {icon: "error"});
			}
		}
	});
}

function eliminarDatos(idContacto){
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
				data:"idContacto=" + idContacto,
				url:"../php/eliminar.php",
				success:function(r){
					if(r==1){						
						mostrarDatos();
						swal("Eliminado Correctamente", {icon: "success"});
					}else{
						swal("Error al eliminar", {icon: "error"});
					}
				}
			});
		} 
	});
}

function agregaDatosParaEdicion(idContacto){
	$.ajax({
		type:"POST",
		data:"idContacto=" + idContacto,
		url:"../php/datosUpdate.php",
		success:function(r){
			datos=jQuery.parseJSON(r);

			$('#idContactou').val(datos['idContacto']);
			$('#nombreContactou').val(datos['nombreContacto']);
			$('#direccionContactou').val(datos['direccionContacto']);
			$('#telefonoContactou').val(datos['telefonoContacto']);
			$('#ciudadContactou').val(datos['ciudadContacto']);
			$('#paisContactou').val(datos['paisContacto']);
		}
	});
}
	function actualizarDatos(){
		if($('#nombreContactou').val()==""){
			swal("Debes agregar un nombre!");
			return false;
		}

		$.ajax({
			type:"POST",
			data:$('#frmAgregarDatosu').serialize(),
			url:"../php/actualizarDatos.php",
			success:function(r){
				if(r==1){					
					mostrarDatos();
					swal("Actualizado Correctamente", {icon: "success"});
				}else{
					swal("Error al Actualizar", {icon: "error"});
				}
			}
		});

	}