
function cargaClientes(){
	var usuario = document.getElementById("lst_usuario").value;
	var radio1=document.getElementById("radio1").checked;
	if (radio1==true) {
		return false;
	}
	else
	{

		var funcion="cargaAnios();"
		var url='../php/llenarcombos.php';
		$.ajax({
			type:'POST',
			url:url,
			data:{
				usuario:usuario,
				funcion:funcion
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
}
/*
function cargaAnios(){
	var usuario = document.getElementById("lst_usuario").value;
	var cliente = document.getElementById("lst_consulcliente").value;
	var numConsul=1;

	if (cliente==0) {
		alert("No selecciono un cliente, verifique y vuelva a intentar");
		return false;
		document.getElementById("lst_anioini").focus();
	}
	else
	{
	var url='../php/admin/aniosPlanNegocio.php';
	$.ajax({
		type:'POST',
		url:url,
		data:{
			usu:usuario,
			cli:cliente,
			numConsul:numConsul
		},/*
		beforeSend: function () {
		  $("#lista_cliente").html("Procesando, espere por favor...");
		},*/
		/*success:function(response){
			$("#lista_anioini").html(response);
			//document.getElementById("lista_cliente").value=

		}

	})

	}

}

*/

/*
function cargaAnios2(){
		var usuario = document.getElementById("lst_usuario").value;
		var cliente = document.getElementById("lst_consulcliente").value;
		var numConsul=2;

		if (cliente==0) {
			alert("No selecciono un Año de finalizacion, verifique y vuelva a intentar");
			return false;
			document.getElementById("lst_aniofin").focus();
		}
		else
		{
		var url='../php/admin/aniosPlanNegocio.php';
		$.ajax({
			type:'POST',
			url:url,
			data:{
				usu:usuario,
				cli:cliente,
				numConsul:numConsul
			},/*
			beforeSend: function () {
			  $("#lista_cliente").html("Procesando, espere por favor...");
			},*/
			/*success:function(response){
				$("#lista_aniofin").html(response);
				//document.getElementById("lista_cliente").value=

			}

		})

		}
}
*/
function cargaTabPlanNegocio(){
	var usuario = document.getElementById("lst_usuario").value;

	var radio1=document.getElementById("radio1").checked;
	var url = '../php/admin/cargaTabPlanNegocio.php';
	if (document.getElementById("lst_consulcliente")) {
		var cliente = document.getElementById("lst_consulcliente").value;
	}
	else
	{
		var cliente = document.getElementById("lst_cliente").value;
	}
	if (radio1==true) {

		
		$.ajax({
			type:'POST',
			url:url,
			data:{
				usu:usuario,
				
			},
			beforeSend: function(){
				$("#tabla_planNegocios").html("Procesando, espere por favor...")
			},
			success: function(response){
				$("#tabla_planNegocios").html(response);
				
			}
		});
	}
	else
	{

		$.ajax({
			type:'POST',
			url:url,
			data:{
				usu:usuario,
				cli:cliente
			},
			beforeSend: function(){
				$("#tabla_planNegocios").html("Procesando, espere por favor...")
			},
			success: function(response){
				$("#tabla_planNegocios").html(response);
				
			}
		})
	}
}


function pNegocioPDF(cli,cul){
	var usu=document.getElementById("lst_usuario").value;
	if (usu=="todos") {

		window.open('../reportesPDF/planNegocioPDF.php?cli='+cli+'&cul='+cul);
	}
	else
	{
		//var s = document.getElementById("tab_planNegocio").rows[fila].cells[1].innerText; 
		window.open('../reportesPDF/planNegocioPDF.php?cli='+cli+'&cul='+cul+'&usu='+usu);
	}
}
