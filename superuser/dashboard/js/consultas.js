function cosultaVisitas(){
	usu=document.getElementById("lst_usuario").value;
	fini=document.getElementById("fecha_inicio").value;
	ffin=document.getElementById("fecha_fin").value;
	url="../model/consulVisitaModel.php";
	if (fini!=0) {
		if (ffin!=0) {
			$.ajax({
				type:'POST',
				url:url,
				data:{
					usu:usu,
					fini:fini,
					ffin:ffin
				},
				beforeSend: function () {
				  $("#tabla_repvisita").html("Procesando, espere por favor...");
				},
				success: function(response){
					$("#tabla_repvisita").html(response);
					
				}

			})
		}
		else{
			alert("Ingrese una fecha de finalizacion para consultar.");
			document.getElementById("fecha_fin").focus();
			return false;
		}
	}else{
		alert("Ingrese una fecha de inicio para consultar.");
		document.getElementById("fecha_inicio").focus();
		return false;
	}


}

function consulProgramacion(){
	usu=document.getElementById("lst_usuario").value;
	fini=document.getElementById("fecha_inicio").value;
	ffin=document.getElementById("fecha_fin").value;
	url="../model/consulProgramacionModel.php";
	if (fini!=0) {
		if (ffin!=0) {
			$.ajax({
				type:'POST',
				url:url,
				data:{
					usu:usu,
					fini:fini,
					ffin:ffin
				},
				beforeSend: function () {
				  $("#tab_rprogramacion").html("Procesando, espere por favor...");
				},
				success: function(response){
					$("#tab_rprogramacion").html(response);
					
				}

			})
		}
		else{
			alert("Ingrese una fecha de finalizacion para consultar.");
			document.getElementById("fecha_fin").focus();
			return false;
		}
	}else{
		alert("Ingrese una fecha de inicio para consultar.");
		document.getElementById("fecha_inicio").focus();
		return false;
	}
	
}