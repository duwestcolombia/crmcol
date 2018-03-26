$(document).ready(function(){
	//document.getElementById("btn_grafcuadrante").disabled=true;
	//$("#btn_grafcuadrante").btn_grafcuadrante("disabled","true");
	
});

function graficar(){
	var usu=document.getElementById("lst_usuario").value;
	//alert(usu);
	var url='../php/admin/consultaGrafico.php';

	$.ajax({
		type:'POST',
		url:url,
		data:{usu},
		beforeSend: function () {
		  $("#container").html("Procesando, espere por favor...");
		},
		success:function(response){
			console.log(response);




			$(function () {
				//$('#container').highcharts({*/
				var option={
				    chart: {
				    	renderTo: 'container',
				    	type: 'scatter',
				        //type: 'bubble',
				        //Tamaño del recuadro
				        plotBorderWidth: 3,
				        //Color del recuadro #346691=>azul
				        plotBorderColor: '#346691',
				        
				        //Imagen de fondo para el grafico
				        plotBackgroundImage: '../img/flecha.jpg',
				        //zoomType: 'xy'
				    },
				    title: {
				        text: 'Grafico Portafolio de Clientes'
				    },
				    subtitle: {
				        text: 'FUERTE ---------- RPN = FUERZA DE NUESTRA POSICION ---------- DÉBIL'
				    },
				    //DATOS EN EJE X
				    xAxis: {
				        //Tamaño de lineas verticales 
				        gridLineWidth: 1,
				        allowDecimals: false,
				        max: -4,
				        min: -20,
				        //intervalo de los puntos
				        pointInterval:4,
				        tickInterval: 4,
				        title: {
				            //este es el texto de la parte inferior del grafico
				            enabled: false,
				            text: ''
				        },
				        plotLines: [{
				            //Color de linea y
				            color: 'blue',
				            //este es el estilo de la linea - "dot" es linea punteada y "long" linea continua
				            //dashStyle: 'dot',
				            dashStyle: 'long',
				            //grosor linea division en x
				            width: 3,
				            value: -12,
				            label: {
				                rotation: 0,
				                y: 12,
				                style: {
				                    fontStyle: 'arial'
				                },
				                text: ''
				            },
				            zIndex: 3
				        }],
				   
				        startOnTick: true,
				        endOnTick: true,
				        showLastLabel: true
				        
				    },
				    yAxis: {
				        //Tamaño de lineas horizontales 
				        gridLineWidth: 1,
				        allowDecimals: false,
				        //numero maximo del eje
				        max: 20,
				        //numero minimo del eje
				        min: 4,
				        pointInterval:4,
				        tickInterval: 4,
				        title: {
				            text: 'BAJO -------  POTENCIAL DE LA CUENTA  ------- ALTO'
				        },
				        plotLines: [{
				            //Color de linea horizontal
				            color: 'blue',
				            //este es el estilo de la linea - "dot" es linea punteada y "long" linea continua
				            //dashStyle: 'dot',
				            dashStyle: 'long',
				            //grosor linea division en x
				            width: 3,
				            value: 12,
				            label: {
				                align: 'right',
				                style: {
				                    fontStyle: 'arial'
				                },
				                //este texto esta sobre el eje x en el plano
				                text: '',
				                x: -12
				            },
				            zIndex: 3
				        }]
				    },
				    //esto es las leyendas que aparecen en la parte derecha de la pantalla
				    legend: {
				        layout: 'vertical',
				        align: 'right',
				        verticalAlign: 'middle'
				    },
				    //oculta los creditos de highcharts
				    credits: {
				        enabled: false
				    },
				    /*Quito el boton imprimir grafico*/
				    exporting: { 
				        enabled: false 
				    },
				   
				    //aqui las series de datos
				    
				    series: [{}],
			        //finaliza serie de datos

			        tooltip: {

			         //dentro de{point.?} el point corresponde a los valores impresos con la consulta php y lo que sigue es el titulo del campo
			         useHTML: true,
			         headerFormat: '<table ">',
			         pointFormat: '<tr><th colspan="2"><h3>{point.name}</h3></th></tr>' +
			         '<tr><th>Total Potencial economico de la cuenta: </th><td>{point.y}</td></tr>' +
			         '<tr><th>Total relacion personal negocios:</th><td>{point.x}</td></tr>' +
			         '<tr><th>Tipo de Cliente:</th><td>{point.tcliente}</td></tr>',
			         footerFormat: '</table>',
			         followPointer: true
			        },
			        //muestro el nit sobre cada punto
					plotOptions: {
                     	series: {
                         	dataLabels: {
                             	//cambiando esta propiedad muesto u oculto el nombre sobre el punto
                             	enabled: true,
                             	format: '{point.idcliente}'
                         	},
                         	//showCheckbox: true
                     	}
                    }
				};

				$.getJSON(url, function(json) {
				           /*option.series[0].showInLegend="false";
				           option.series[0].name="Clientes";
				           //option.series[0].type="scatter";
				           option.series[0].color=Highcharts.getOptions().colors[3];*/
				           option.series[0].data = json;
				           chart = new Highcharts.Chart(option);
				       });
				
			});

		//Cierro el success	
		},
		//inicio error
		error:function(response){
			$("#container").html(response);
		}

	});
}