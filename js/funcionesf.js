function mostrarDatosf(){
	$.ajax({
		url:"../php/mostrarDatosf.php",
		success:function(r){
			$('#tablaDatos').html(r);
		}
	});
}

function agregarDatosf(){

	if($('#idOrden').val()==""){
		swal("Debes agregar Orden de Pedido!");
		return false;
	}else if($('#fechaFactura').val()==""){
		swal("Debes agregar fecha de Factura!");
		return false;
	}
	$.ajax({
		type:"POST",
		data:$('#frmAgregarDatosf').serialize(),
		url:"../php/agregarDatosf.php",
		success:function(r){
			if(r==1){
				$('#frmAgregarDatosf')[0].reset();
				mostrarDatosf();
				swal("Agregado Correctamente", {icon: "success"});
			}else{
				swal("Error al agregar", {icon: "error"});
			}
		}
	});
}

function eliminarDatosf(idFactura){
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
				data:"idFactura=" + idFactura,
				url:"../php/eliminarf.php",
				success:function(r){
					if(r==1){						
						mostrarDatosf();
						swal("Eliminado Correctamente", {icon: "success"});
					}else{
						swal("Error al eliminar", {icon: "error"});
					}
				}
			});
		} 
	});
}

function agregaDatosParaEdicionf(idFactura){
	$.ajax({
		type:"POST",
		data:"idFactura=" + idFactura,
		url:"../php/datosUpdatef.php",
		success:function(r){
			datos=jQuery.parseJSON(r);
			$('#idFacturau').val(datos['idFactura']);
			$('#idOrdenu').val(datos['idOrden']);			
			$('#fechaFacturau').val(datos['fechaFactura']);
		}
	});
}
function actualizarDatosf(){
	if($('#idFacturau').val()==""){
		swal("Debes agregar número de Factura!");
		return false;
	}else if($('#fechaFacturau').val()==""){
		swal("Debes agregar fecha de Factura!");
		return false;
	}
	$.ajax({
		type:"POST",
		data:$('#frmAgregarDatosfu').serialize(),
		url:"../php/actualizarDatosf.php",
		success:function(r){
			if(r==1){					
				mostrarDatosf();
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