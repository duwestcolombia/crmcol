$(document).ready(function() {
	$("#graf").hide();
  
});
function paginarTabla(){

}

function cargarReporteVisita(){

var usuario = document.getElementById("lst_usuario").value;
var finicio = document.getElementById("fecha_inicio").value;
var ffin = document.getElementById("fecha_fin").value;
var rol = document.getElementById("txt_rol").value;
var url = '../php/admin/consulRepVisita.php';

if (usuario==0) {
	alert("Debe seleccionar un usuario para consultar. Seleccione uno y vuelva a intentar.");
	
	document.getElementById("lst_usuario").focus();
	return false;
}
else
{

$.ajax({
	type:'POST',
	url:url,
	data:{
		usu:usuario,
		finicio:finicio,
		ffin:ffin,
		rol:rol
	},
	beforeSend: function () {
	  $("#tabla_repvisita").html("Procesando, espere por favor...");
	},
	success: function(response){
		$("#tabla_repvisita").html(response);
		
	}

});
}


}

function exportarExcel(){

	var usuario = document.getElementById("lst_usuario").value;
	var finicio = document.getElementById("fecha_inicio").value;
	var ffin = document.getElementById("fecha_fin").value;
	var rol = document.getElementById("txt_rol").value;
	var url = '../admin/exportar/excelrvisitas.php';

	if (usuario==0) {
		alert("Debe seleccionar un usuario para consultar. Seleccione uno y vuelva a intentar.");
		
		document.getElementById("lst_usuario").focus();
		return false;

	}
	else
	{
		var responses = null;
		$.ajax({
			type:'POST',
			url:url,
			data:{
				usu:usuario,
				finicio:finicio,
				ffin:ffin,
				rol:rol
			},
			/*beforeSend: function () {
				$("#tabla_repvisita").html("Procesando, espere por favor...");
			},*/
			
			success: function(response){
				/*$("#tabla_repvisita").load(response);*/
				

				/*alert(response);*/

			}

		});
		
	}


}