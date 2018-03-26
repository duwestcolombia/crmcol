<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
.highcharts-tooltip h3 {
    margin: 0.3em 0;
}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({

        chart: {
            type: 'bubble',
            plotBorderWidth: 2,
            zoomType: 'xy'
        },

        legend: {
            enabled: false
        },

        title: {
            text: 'Grafico Clasificacion Presupuesto'
        },

        subtitle: {
            text: 'Agricultores'
        },

        xAxis: {
            gridLineWidth: 1,
            title: {
                text: 'Texto parte inferior grafico eje x'
            },
            labels: {
                format: '{value}'
            },
            plotLines: [{
                color: 'red',
                dashStyle: 'dot',
                width: 2,
                value: 12,
                label: {
                    rotation: 0,
                    y: 15,
                    style: {
                        fontStyle: 'italic'
                    },
                    text: 'Linea que traza eje y'
                },
                zIndex: 3
            }]
        },

        yAxis: {
            startOnTick: false,
            endOnTick: false,
            title: {
                text: 'Texto que pasa por eje y'
            },
            labels: {
                format: '{value} '
            },
            maxPadding: 0.2,
            plotLines: [{
                color: 'black',
                dashStyle: 'dot',
                width: 2,
                value: 12,
                label: {
                    align: 'right',
                    style: {
                        fontStyle: 'italic'
                    },
                    text: 'Linea que traza eje x',
                    x: -10
                },
                zIndex: 3
            }]
        },

        tooltip: {
            useHTML: true,
            headerFormat: '<table>',
            pointFormat: '<tr><th colspan="2"><h3>{point.nusuario}</h3></th></tr>' +
                '<tr><th>ejex:</th><td>{point.x}</td></tr>' +
                '<tr><th>ejey:</th><td>{point.y}</td></tr>' +
                '<tr><th>valor eje z:</th><td>{point.z}</td></tr>',
            footerFormat: '</table>',
            followPointer: true
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },

        series: [{
            data: [
            <?php
            // el valor de z: corresponde altamaño del circulo, el valor despues del . modificagrandemente el tamano
            require 'conexionbd.php';

            $consultotal=$db->query("SELECT * FROM cliente Where id_usuario='dzambrano'")or die($db->error);

            while ($resul = $consultotal ->fetch_array(MYSQLI_BOTH))
            {
                echo'
                { x: '.$resul['totalpeconomico'].', y: '.$resul['totalrpersonal'].', z: 31.3, name: "'.$resul['nom_cliente'].'", nusuario: "'.$resul['nom_cliente'].'" },
                
                
                
                

                ';

            }


            ?>

                
                 
            ]
        }]

    });
});
		</script>
	</head>
	<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="height: 400px; min-width: 310px; max-width: 600px; margin: 0 auto"></div>
	</body>
</html>
