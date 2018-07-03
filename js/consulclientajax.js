
function buscarcliente(){
var id=document.getElementById("lst_tipusuario").value

if (id==0) {
	alert("Debe seleccionar un usuario antes de hacer clic en el boton buscar");
	document.getElementById("lst_tipusuario").focus();
}
else
{

var url="../php/cliente/consultacliente.php";

$.ajax({
	type:"POST",
	url:url,
	data:{lst_tipusuario:id},

	success:function(datos){

		
		$("#mostrardatos").html(datos);
		document.getElementById('txtnombre').focus()
		document.getElementById("txtzona").disabled=true;
		//HabilitarMun();
	}
})
}
}
//----------------------------------------------------------------------------------------------------------------------------------------------------
/*function actualizarcliente(){
var id=document.getElementById("lst_tipusuario").value
var nom=document.getElementById("txtnombre").value
var tip=document.getElementById("txttipo").value
var zona=document.getElementById("txtzona").value
var mun=document.getElementById("txtmunicipio").value
var hec=document.getElementById("txthect").value
var hectsem=document.getElementById("txthectsem").value
var contacto=document.getElementById("txtcontacto").value
var tel=document.getElementById("txttelefono").value
var dir=document.getElementById("txtdir").value
var div=document.getElementById("txtdivision").value
var email=document.getElementById("txtemail").value
var fcumple=document.getElementById("txtfcumple").value
var totcomp=document.getElementById("txttotcompras").value
//Recopilacion de datos de Potencial Economico
var tamano=document.getElementById("txttamano").value
var creci=document.getElementById("txtcrecimiento").value 
var finanza=document.getElementById("txtfinanza").value 
var compt=document.getElementById("txtcompentencia").value
var totpecono=document.getElementById("txttotpeconomico").value
//Recopilacion Datos Relacion Personal Negocios
var cono=document.getElementById("txtconocimiento").value
var responsab=document.getElementById("txtresponsab").value
var pps=document.getElementById("txtpps").value
var actitud=document.getElementById("txtactitud").value
var totrpersonal=document.getElementById("txttotrpersonal").value

var url="../php/cliente/actualizacliente.php";



$.ajax({
	type:"POST",
	url:url,
	//dentro de esto el valor antes de los : es el nombre de la variable que llega a PHP
	//y el valor despues de : es la variable que contiene los datos anteriores.
	data:{
		idcliente:id,
		nomcliente:nom,
		tipo:tip,
		zona:zona,
		municipio:mun,
		hecta:hec,
		hectsem:hectsem,
		contacto:contacto,
		telefono:tel,
		direccion:dir,
		division:div,
		email:email,
		fcumple:fcumple,
		totcomp:totcomp,
		
		tamano:tamano,
		crecimiento:creci,
		finanza:finanza,
		compe:compt,
		totpecono:totpecono,

		conocimiento:cono,
		responsab:responsab,
		pps:pps,
		actitud:actitud,
		totrpersonal:totrpersonal


	},

	success:function(datos){
		$("#mensaje").html(datos);
	}
})
 
}*/
//------------------------------------------------------------------------------------------------------------------------------------------------
function HabilitarMun(){

	var idzona=document.getElementById("txtzona").value

	var url="../php/cliente/cargarmun.php";

	$.ajax({

		type:"POST",
		url:url,

		data:{
			idzona:idzona
		},

		success:function(datos){
			$("#txtmunicipio").html(datos);
			//console.log(datos);
			//document.getElementById("txtmunicipio").disabled=false;
		}
	})
}		

//----------------------------------------------------------------------
//Mensajes popUp sobre las cajas de texto
function mostarPopUp(){
	var popup = document.getElementById('myPopup');
	    popup.classList.toggle('show');
}
//Mensajes popUp sobre las cajas de texto
function mostarPopUp2(){
	var popup = document.getElementById('myPopup2');
	    popup.classList.toggle('show');
}
function mostarPopUp3(){
	var popup = document.getElementById('myPopup3');
	    popup.classList.toggle('show');
}
function mostarPopUp4(){
	var popup = document.getElementById('myPopup4');
	    popup.classList.toggle('show');
}
function mostarPopUp5(){
	var popup = document.getElementById('myPopup5');
	    popup.classList.toggle('show');
}
function mostarPopUp6(){
	var popup = document.getElementById('myPopup6');
	    popup.classList.toggle('show');
}
function mostarPopUp7(){
	var popup = document.getElementById('myPopup7');
	    popup.classList.toggle('show');
}
function mostarPopUp8(){
	var popup = document.getElementById('myPopup8');
	    popup.classList.toggle('show');
}
function mostarPopUp9(){
	var popup = document.getElementById('myPopup9');
	    popup.classList.toggle('show');
}

//--------FUNCION PARA ACTUALIZAR CONTRASEÑA------------------------------------------------------------------------------------------------
/*function actualizapass(){

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

	})

}*/
/*$("#btn_definirDireccion").click(function(){
        alert("pulsaste en definir");
        $("#myModal").modal("hide");
});*/

function direccionVentanaModal(){
	var uno=document.getElementById("lst_nomenclatura").value;
	var dos=document.getElementById("txt_campUno").value;
	var tres=document.getElementById("lst_nomenclaturaDos").value;
	var cuatro=document.getElementById("txt_campDos").value;
	if (uno!="") 
	{
		if (dos!="") 
		{
			if (tres!="") 
			{
				if (cuatro!="") {
					var newDireccion=uno + " " + dos + " " + tres + " " + cuatro;
					document.getElementById("txtdir").value=newDireccion;
					document.getElementById("encabezado").innerHTML="<div class='alert alert-success'><strong>Bien direccion actualizada, cierra la ventana</strong></div>";
				}
				else
				{
					var newDireccion=uno + " " + dos + " " + tres;
					document.getElementById("txtdir").value=newDireccion;
					document.getElementById("encabezado").innerHTML="<div class='alert alert-success'><strong>Bien direccion actualizada, cierra la ventana</strong></div>";
				}
			}
			else
			{
				var newDireccion=uno + " " + dos;
				document.getElementById("txtdir").value=newDireccion;
				document.getElementById("encabezado").innerHTML="<div class='alert alert-success'><strong>Bien direccion actualizada, cierra la ventana</strong></div>";
			}
		}else
		{
			document.getElementById("encabezado").innerHTML="<div class='alert alert-danger'><strong>Debe diligenciar el campo #2</strong></div>";
			document.getElementById("txt_campUno").focus();
		}
	}
	else
	{
		document.getElementById("encabezado").innerHTML="<div class='alert alert-danger'><strong>Debe diligenciar el campo #1</strong></div>";
		document.getElementById("lst_nomenclatura").focus();
	}

	
	
}

function eliminarCultivo(idClienteCultivo){

	var id=idClienteCultivo;
	var url='../php/cliente/deleteCultivoCliente.php';
	
	var confi=confirm("Se va a elimiar este cultivo");

	if (confi==true) {
		$.ajax({
			type:'POST',
			url:url,
			data:{
				idClienteCultivo:id
			},
			success:function(response){

				 $("#mensaje").html(response);
				
				 buscarcliente();
				               
			}
		})
	}
	else
	{
		return false;
	}
}



