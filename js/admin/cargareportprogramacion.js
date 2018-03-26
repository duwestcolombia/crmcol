$(document).ready(function() {
	$("#graf").hide();
  
});
function cargaProgramacionVisitas(){
	var usuario = document.getElementById("lst_usuario").value;
	var finicio = document.getElementById("fecha_inicio").value;
	var ffin = document.getElementById("fecha_fin").value;
	var rol = document.getElementById("txt_rol").value;
	var url ='../php/admin/consulRepProgramacion.php';
	//alert(usuario);
	if (usuario==0) {
		alert("Debe seleccionar un usuario para consultar. Seleccione uno y vuelva a intentar.");
		document.getElementById("lst_usuario").focus();
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
			  $("#tab_rprogramacion").html("Procesando, espere por favor...");
			},
			success: function(response){
				$("#tab_rprogramacion").html(response);
				
			}

		});
	}
}