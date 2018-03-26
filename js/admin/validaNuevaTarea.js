$(document).ready(function() {
	$("#graf").hide();
  
});
function cargaClientes(){
	var usuario = document.getElementById("lst_usuario").value;
	var url='../php/llenarcombos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:{
			usuario:usuario
		},
		beforeSend: function () {
		  $("#lista_cliente").html("Procesando, espere por favor...");
		},
		success:function(response){
			$("#lista_cliente").html(response);
			//document.getElementById("lista_cliente").value=

		}

	})

}

function addTarea(){
	var usu=document.getElementById("lst_usuario").value;
	var cli =document.getElementById("lst_consulcliente").value;
	var fini=document.getElementById("from").value;
	var ffin=document.getElementById("to").value;
	var tipo = document.getElementById("tipo").value;
	var titulo = document.getElementById("title").value;
	var descrip = document.getElementById("body").value;
	var url = '../php/admin/addNuevaTarea.php';

	if (usu==0) {
		alert("Debe seleccionar un usuario.");
		document.getElementById("lst_usuario").focus();
	}
	
	if(fini.indexOf('T') != -1){
		if (ffin.indexOf('T') != -1) {
			//este metodo reemplaza la T por un espacio para poder formatear la fecha
			var from=fini.replace("T"," ");
			var to=ffin.replace("T"," ");
		}
		else
		{
			var from=fini.replace("T"," ");
		}
		
	}
	else{
		var to=ffin.replace("T"," ");
	}

	//alert(from);
	$.ajax({
		type:'POST',
		url:url,
		data:{
			from:from,
			to:to,
			usu:usu,
			cliente:cli,
			tipo:tipo,
			titulo:titulo,
			descrip:descrip
		},
		success:function(response){
			$("#response").html(response);

		}

	})
}