//*****************TODO LO DE ESTE CODIGO SUCEDE CUANDO SE MUESTRA EL FORMULARIO *************************************
$(document).ready(function() {

	document.getElementById("btn_consultar").disabled=true;
	//document.getElementById("btn_verplannegocio").disabled=true;


});	
//Defino el objeto fecha con Date
var fecha = new Date();
//consigo el año actual
var ano = fecha.getFullYear();
//Sumo un año a este año actual
var sano=fecha.setFullYear(fecha.getFullYear()-1);
//Consigo el resultado de la suma
var a = fecha.getFullYear();
//Muestro variables
//cuANDO ESTE LISTO EL FORMULARIO REALICE LO QUE SIGUE A CONTINUACION
//$(document).ready(function() {
 function cargarAnios(){ 
  /*document.getElementById("btn_sumar").disabled=true;*/
  
  document.getElementById("txt_anio1").value= a ;
  document.getElementById("txt_anio2").value= ano ;
  $("#lbl_anio").text("Año " + a );

   $("#lbl_anio2").text ("Año " + ano );
}
//});

//*******************************************************************************************************************
function opMatematicas(){

	var hectsembra = 0;
	var potbiologico = 0;
	var totpotbiologico = 0;
	

hectsembra=document.getElementById("txt_hecsembradas").value;
potbiologico=document.getElementById("txt_vpotbiologico").value;
totpotbiologico=parseInt(hectsembra)*parseInt(potbiologico);


//totpotbiologico=document.getElementById("txt_totpotencialbiologico").value;
if (isNaN(totpotbiologico)) {

	document.getElementById("txt_totpotencialbiologico").value=0;
}
else
{
	document.getElementById("txt_totpotencialbiologico").value=totpotbiologico;
};


}
function opMatematicas2(){
	var hectsembra2 = 0;
	var potbiologico2 = 0;
	var totpotbiologico2 = 0;

	/*document.getElementById("btn_sumar").disabled=false;*/

	hectsembra2=document.getElementById("txt_hecsembradas2").value;
	potbiologico2=document.getElementById("txt_vpotbiologico2").value;
	totpotbiologico2=parseInt(hectsembra2)*parseInt(potbiologico2);

if (isNaN(totpotbiologico2)) {
	
	document.getElementById("txt_totpotencialbiologico2").value=0;
}
else
{
	document.getElementById("txt_totpotencialbiologico2").value=totpotbiologico2;
};
}
function costumerShare(){
	/*Este es el costumer share del primer año*/
	var vhistoricas = 0;
	var totpotbiologico=0;
	var total=0;
	vhistoricas=document.getElementById("txt_vhistoricas").value;
	totpotbiologico=document.getElementById("txt_totpotencialbiologico").value;
	total=parseFloat(vhistoricas)/parseFloat(totpotbiologico)*100;
	//con toFixed, acorto los decimales a dos
	var tot=total.toFixed(2);
	if (tot>100) {
		alert("Su Costumer Share no puede ser superior al 100%, revise los valores insertados.");
		return false;
		document.getElementById("txt_vhistoricas").focus();
	}
	if (isNaN(total)) {
		document.getElementById("txt_anioporcentaje").value=0;

	}
	else
	{
		document.getElementById("txt_anioporcentaje").value=tot + "%";		
	}
}
function costumerShare2(){

	/*Este es el costumer share del año siguiente*/
	var vhistoricas2 = 0;
	var totpotbiologico2=0;
	var total2=0;

	vhistoricas2=document.getElementById("txt_metaventastotal2").value;
	totpotbiologico2=document.getElementById("txt_totpotencialbiologico2").value;
	
	total2=parseFloat(vhistoricas2)/parseFloat(totpotbiologico2)*100;
	//con toFixed, acorto los decimales a dos
	var tot2=total2.toFixed(2);
	if (tot2>100) {
		alert("Su Costumer Share para el siguiente año no puede ser superior al 100%, revise los valores insertados.");
		return false;
		document.getElementById("txt_metaventastotal2").focus();
	}
	if (isNaN(total2)) {
		document.getElementById("txt_anio2porcentaje").value=0;

	}
	else
	{
		document.getElementById("txt_anio2porcentaje").value=tot2 + "%";		
	}
}

function gestionPlanNegocio(){
	
	var idCliente=document.getElementById("lst_cliente").value;
	var idCultivo=document.getElementById("lst_cultivo").value
	var url='../php/cliente/gestionPlanNegocio.php';

	if (idCultivo==0) {
			alert("Debe seleccionar un cultivo para consultar.");
			document.getElementById("lst_cultivo").focus();
		
	}
	else
	{

	$.ajax({
		type:'POST',
		url:url,
		data:{
			idCliente:idCliente,
			idCultivo:idCultivo
		},
		
		success:function(response){
			$("#frmPlanNegocio").html(response);
			//cargo la funcion que me muestra los años y me bloquea el boton sumar
			cargarAnios();
		}
	});

	}
}
function verPlanNegocio(){
	var idCliente=document.getElementById("lst_cliente").value;
	var url='../php/cliente/tabPlanNegocio.php';

	if (idCliente==0) {
		alert("Debe seleccionar un cliente para consultar.");
		document.getElementById("lst_cliente").focus();
	}
	else
	{

	$.ajax({
		type:'POST',
		url:url,
		data:{
			cli:idCliente
		},
		
		success:function(response){
			$("#frmPlanNegocio").html(response);
			
		}
	});

	}
}

function sumMetaProducto(){
		var oi=0;  //Objeto indicie
	    var thisObj;
	    var suma=0;

	    //Capturo todos los valores de los input
	    var objs = document.getElementsByName(["txt_valor[]"]);
	    if (objs.length>0) {
	    	//ejecuto este ciclo para sumar los valores solamente hasta la cantidad de valores obtenidos
	    for (oi=0;oi<objs.length;oi++) {  
	        //Almaceno el valor de la la posicion que me indica el oi en thisobj
	        thisObj = objs[oi];  
	        //paso este valor como entero y lo sumo 
	        suma=suma+parseInt(thisObj.value);
	       
	    }
	    //paso este valor al input text de suma
	    document.getElementById("txt_metaventastotal2").value=suma;
	    document.getElementById("txt_sumvalor").value=suma;
	    costumerShare2();
	}
	else
	{
		alert("No ingreso un valor para sumar, debe diligenciar un valor para cada producto.");
		//document.getElementById("").focus();
		return 0;
	}
	    
	    
   
	
}

function cargaFiltroCultivos(){
	var cliente = document.getElementById("lst_cliente").value;
	var url='../php/cliente/cargaFiltroCultivos.php';

	$.ajax({
		type:'POST',
		url:url,
		data:{
			idCliente:cliente
		},
		success:function(response){
			$("#lst_cultivo").html(response);
				document.getElementById("btn_consultar").disabled=false;
				//document.getElementById("btn_verplannegocio").disabled=false;
		}
	});
}


function pNegocioPDF(cli,cul){
	
	window.open('../reportesPDF/planNegocioPDF.php?cli='+cli+'&cul='+cul);
	
}
