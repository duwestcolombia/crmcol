function actualizapass(){
	var usu=document.getElementById('txtidusuario').value;
	var pass=document.getElementById('txtpass').value;
	var pass2=document.getElementById('txtpass2').value;

	var url="../php/actualizapass.php";

	$.ajax({
		type:"POST",
		url:url,
		data:{
			usu:usu,
			pass:pass,
			pass2:pass2
		},
		success:function(datos){
			$("#txtpass").val('');
			$("#txtpass2").val('');
			$("#mensajealerta").html(datos);
			$("#txtpass").focus();

		}

	});
}

function validapass(){
	var pass;
	var pass2;

	pass=document.getElementById("txtpass").value;
	pass2=document.getElementById("txtpass2").value;

	if (pass!="") 
	{
		if (pass2!="") 
		{
			if (pass!=pass2)
			{
				document.getElementById("mensajealerta").innerHTML='<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close"> ×</a><strong>Error!! </strong> Las contraseñas no coinciden. </div>';
				document.getElementById("btn_update").disabled=true;
			}
			else
			{
				document.getElementById("mensajealerta").innerHTML='<div class="alert alert-info fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close"> ×</a><strong>Bien!! </strong> Las contraseñas son iguales. </div>';
				document.getElementById("btn_update").disabled=false;
			}
		}
		else
		{
			document.getElementById("mensajealerta").innerHTML='<div class="alert alert-warning fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close"> ×</a><strong>Bien ahora solo!! </strong> Confirme su contraseña. </div>';
			document.getElementById("btn_update").disabled=true;
		}
	}
	else
	{
		document.getElementById("mensajealerta").innerHTML='<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close"> ×</a><strong>Error!! </strong> Su contraseña esta en blanco. </div>';
		document.getElementById("btn_update").disabled=true;
	}

	
}