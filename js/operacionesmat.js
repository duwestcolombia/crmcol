function sumpeconomico(){
	var num1 = 0;
	var num2 = 0;
	var num3 = 0;
	var num4 = 0;
	var resultado=0;

	num1 = document.getElementById("txttamano").value;
	num2 = document.getElementById("txtcrecimiento").value;
	num3 = document.getElementById("txtfinanza").value;
	num4 = document.getElementById("txtcompentencia").value;
	resultado=parseInt(num1)+parseInt(num2)+parseInt(num3)+parseInt(num4);
	if (isNaN(resultado)) {
		document.getElementById("txttotpeconomico").value=0;
	}
	else
	{
		document.getElementById("txttotpeconomico").value=resultado;
	}
	

}
function sumrpersonal(){
	var num1 = 0;
	var num2 = 0;
	var num3 = 0;
	var num4 = 0;
	var resultado=0;

	num1 = document.getElementById("txtconocimiento").value;
	num2 = document.getElementById("txtresponsab").value;
	num3 = document.getElementById("txtpps").value;
	num4 = document.getElementById("txtactitud").value;
	resultado=parseInt(num1)+parseInt(num2)+parseInt(num3)+parseInt(num4);
	if (isNaN(resultado)) {
		document.getElementById("txttotrpersonal").value=0;
	}
	else
	{
		document.getElementById("txttotrpersonal").value=resultado;
	}


}

function sumhectareaCultivo(){
		var oi=0;  //Objeto indicie
	    var thisObj;
	    var suma=0;

	    //Capturo todos los valores de los input
	    var objs = document.getElementsByName(["txt_nhectareas[]"]);
	   
	    if (objs.length>0) {
	    	//ejecuto este ciclo para sumar los valores solamente hasta la cantidad de valores obtenidos
	    for (oi=0;oi<objs.length;oi++) {  
	        //Almaceno el valor de la la posicion que me indica el oi en thisobj
	        thisObj = objs[oi];  
	        //paso este valor como entero y lo sumo 
	        suma=suma+parseInt(thisObj.value);
	       
	    }
	    
	    //paso este valor al input text de suma
	    document.getElementById("txthectsem").value=suma;
	   
	    
	}
	else
	{
		alert("No ingreso un valor para sumar, debe diligenciar un valor para cada producto.");
		//document.getElementById("").focus();
		return 0;
	}
	    
	    
   
	
}
