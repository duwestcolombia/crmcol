function depto(){
	//Evalua la compatibilidad con una version y otra de AJAX

	//Esta es la vercion actualizada
	/*if (window.XMLHttpRequest) {
		xmlhttp3 = new XMLHttpRequest();
	}
	//vercion anterior
	else
	{
		xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp3.onreadystatechange=function()
	{
		//Valida que el estado y estatus de la pagina esta correcto
		//El valor  4 y 200 son los indicados para la evaluacion
		if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
*/
			if (window.XMLHttpRequest) {
					xmlhttp3 = new XMLHttpRequest();
					} else { 
					xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp3.onreadystatechange=function() {
					if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
			//Si pasa esta validacion, se envian los elementos al select de los departamentos
			document.getElementById("listdepto").innerHTML=xmlhttp3.responseText;
		}
		
	}
	//Abrimos el archivo que trae los datos del Departamento
	xmlhttp3.open("GET","llenarDepto.php",true);
	xmlhttp3.send();
}