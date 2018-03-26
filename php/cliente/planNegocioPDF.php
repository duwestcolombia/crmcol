<?php 
//session_start();


//require '../../libPDF/fpdf.php';
/*$idCliente=$_POST['idCliente'];
$usuSesion=$_SESSION['usuario_sesion'];*/

/*class PDF extends FPDF
{

}
//Diseño de la hoja para pdf
//Propiedades: P=Vertical, mm=Milimetros, Tamaño hoja=Letter
$pdf=new PDF('P','mm','Letter');
$pdf->SetMargins(20,18);
$pdf->AliasNbPages();
$pdf->AddPage();

//Datos del titulo
$pdf->SetTextColor(0x00,0x00,0x00);
$pdf->SetFont("Arial","b",10);
//Este es el titulo del PDF
//Propiedades: 0 =ancho del recuadro, 0 indica automatico, alto = indica el alto del recuadro, titulo= el titulo entre comilla sencilla,
// 1= indica si deseo que el recuadro sea visible y 0 que no, 1 = indica que al finalizar haga  x  saltos de linea, C = texto centrado
$pdf->Cell(0, 10, 'Plan de negocios ', 0 , 1, 'C');

//Consulta Mysql
$consul=$db->query("SELECT c.id_cliente,c.nom_cliente,c.tipo_cliente,cm.id_cliente,cm.contacto_cliente,cc.id_cliente,cc.id_cultivo,cul.id_cultivo,cul.nom_cultivo
						FROM cliente c, cliente_municipio cm, cliente_cultivo cc, cultivo cul
						WHERE c.id_cliente='217721'
						AND cm.id_cliente=c.id_cliente
						AND cc.id_cliente=cm.id_cliente
						AND cul.id_cultivo=cc.id_cultivo
						GROUP BY c.id_cliente")or die ("Error al cargar los datos: " . $db->error);

while ($resul=$consul->fetch_assoc()) {
	$pdf->cell(30,5,$resul['contacto_cliente'],0,1,'C');
	$pdf->cell(30,5,$resul['nom_cliente'],0,0,'C');
}

$pdf->Output();*/
	
    require_once '../../libmPDF/mpdf/mpdf.php';
    $dav="david";
    $header = "<html>
    <head>
    <title></title>
    </head>
    <body>";
    $body="	<h1>Hola funciono el pdf html</h1>
    	<table>
    		<tr>
    			<th>Nombre</th>
    		</tr>
    		<tr>".date("d/m/Y")."</tr>
    	</table>";
    $footer="</body>
    </html>";

    $nomPdf="primerPdf.pdf";
    $mpdf=new mPDF();

    //$mpdf -> writehtml($archivo);
    $mpdf->SetHTMLHeader($header);
    $mpdf->SetHTMLFooter($footer);
    $mpdf->WriteHTML($body);
    //$mpdf->Output($nomPdf, 'I');
    $mpdf->Output();
    /*
    $dompdf = new Dompdf();
    $dompdf->loadHtml('hello world');
   $dompdf->setPaper('A4', 'landscape');

   // Render the HTML as PDF
   $dompdf->render();

   // Output the generated PDF to Browser
   $dompdf->stream();*/
/*} else{
    require_once 'alumnos.php';
    
    header("Content-type: application/vnd.ms-$tipo");
    header("Content-Disposition: attachment; filename=mi_archivo$extension");
    header("Pragma: no-cache");
    header("Expires: 0");    
}*/
/*class PDF extends FPDF
{

}*//*
$consulCliente=$db->query("SELECT c.id_cliente,c.nom_cliente,c.tipo_cliente,cm.id_cliente,cm.contacto_cliente,cc.id_cliente,cc.id_cultivo,cul.id_cultivo,cul.nom_cultivo
						FROM cliente c, cliente_municipio cm, cliente_cultivo cc, cultivo cul
						WHERE c.id_cliente='$idCliente'
						AND cm.id_cliente=c.id_cliente
						AND cc.id_cliente=cm.id_cliente
						AND cul.id_cultivo=cc.id_cultivo
						GROUP BY c.id_cliente")or die($db->error);
echo'<form name="frmPlanNegocio" action="../php/cliente/adminPlanNegocio.php" method="post" style="margin-top:1.5em;">
	 				<!-- Columna de datos Cliente -->
	 			<div class="table-responsive">
	 				<table class="table table-striped table-bordered table-condensed table-hover" id="tabla">
	 				<!--*****************Info Cliente*************************-->';
	 				while ($resul=$consulCliente->fetch_assoc()) {
	 					echo'

	 					<tr>
	 						<td><label for="contacto">Contacto</label></td>
	 						<td colspan="2"><input type="text" id="txt_contacto" name="txt_contacto" class="form-control" value="'.$resul['contacto_cliente'].'" readonly="readonly"> </td>
	 						<input type="hidden" id="txt_idCliente" name="txt_idCliente" class="form-control" value="'.$resul['id_cliente'].'">
	 					</tr>
	 					<tr>
	 						<td><label for="ncliente">Nombre cliente</label></td>
	 						<td colspan="2"><input type="text" id="txt_ncliente" name="txt_ncliente" class="form-control" value="'.$resul['nom_cliente'].'" readonly="readonly"> </td>
	 					</tr>
	 					<tr>
	 						<td><label for="ncuadrante">Numero de cuadrante</label></td>
	 						<td><input type="number" id="txt_ncuadrante" name="txt_ncuadrante" class="form-control" min="1" max="4"> </td>
	 						<td><label for="cultivo">Cultivo</label></td>
	 						<td><input type="text" id="txt_cultivo" name="txt_cultivo" class="form-control" value="'.$resul['nom_cultivo'].'" readonly="readonly"> </td>
	 						<td><label for="tcliente">Tipo Cliente</label></td> 
	 						<td><input type="text" id="txt_tcliente" name="txt_tcliente" class="form-control" value="'.$resul['tipo_cliente'].'" readonly="readonly"> </td>
	 					</tr>';
	 				}	
	 				echo'	<!--*************************************************************-->
	 					<tr>
	 						<td colspan="6" class="success"><h3>Potencial Biologico</h3></td>
	 					</tr>	

	 					<tr>

	 						<td><label for="anio">Año</label></td>
	 						<td><label for="hsembradas">Hectareas Sembradas</label></td>
	 						<td><label for="vpotencialb">Valor Potencial Biológico por ha.</label></td>
	 						<td><label for="totvpotencial">Total  valor Potencial Biológico por cliente</label></td>
	 						<td><label for="vhistoricas">Ventas históricas </label></td>
	 						<td><label for="metaventas">Meta de  Ventas total </label></td>
	 					</tr>
	 					<tr>
	 						<!--esta parte no funcion-->
	 						<td><input type="text" id="txt_anio1" name="txt_anio1" value="Año" class="form-control" readonly="readonly"></td>
	 						<!-- -->
	 						<td><input type="number" id="txt_hecsembradas" name="txt_hecsembradas" class="form-control" onkeyup="opMatematicas();"></td>
	 						<td><input type="number" id="txt_vpotbiologico" name="txt_vpotbiologico" class="form-control" onkeyup="opMatematicas();"></td>
	 						<td><input type="number" id="txt_totpotencialbiologico" name="txt_totpotencialbiologico" class="form-control" onkeyup="opMatematicas();" readonly="readonly"></td>
	 						<td><input type="number" id="txt_vhistoricas" name="txt_vhistoricas" class="form-control" onkeyup="costumerShare();"></td>
	 						<td><input type="number" id="txt_metaventastotal" name="txt_metaventastotal" class="form-control" readonly="readonly"></td>
	 					</tr>
	 					<tr>
	 						<td><input type="text" id="txt_anio2" name="txt_anio2" value="Año" class="form-control" readonly="readonly" ></td>

	 						<td><input type="number" id="txt_hecsembradas2" name="txt_hecsembradas2" class="form-control" onkeyup="opMatematicas2();"></td>
	 						<td><input type="number" id="txt_vpotbiologico2" name="txt_vpotbiologico2"  class="form-control" onkeyup="opMatematicas2();"></td>
	 						<td><input type="number" id="txt_totpotencialbiologico2" name="txt_totpotencialbiologico2" class="form-control" onkeyup="opMatematicas2();" readonly="readonly"></td>
	 						<td><input type="number" id="txt_vhistoricas2" name="txt_vhistoricas2" class="form-control" readonly="readonly"></td>
	 						<td><input type="number" id="txt_metaventastotal2" name="txt_metaventastotal2" class="form-control" readonly="readonly"></td>
	 					</tr>
	 					<tr>
	 						<td rowspan="2" class="warning text-right"><h4>Participación en el cliente (Customer share) en %</h4></td>
	 						<td><div id="lbl_anio">Año</div></td>
	 						<td><div id="lbl_anio2">Año</td>
	 					</tr>
	 					<tr>
	 						
	 						<td><input type="text" id="txt_anioporcentaje" name="txt_anioporcentaje" class="form-control" readonly="readonly"></td>
	 						<td><input type="text" id="txt_anio2porcentaje" name="txt_anio2porcentaje" class="form-control" readonly="readonly"></td>
	 					</tr>
	 					<tr>
	 						<td colspan="6" class="success"><h3>Metas por producto</h3></td>
	 					</tr>
	 					
	 					</table>
	 				</div>
	 					<!--**************TABLA METAS POR PRODUCTO****************************-->
	 				<div class="table-responsive">
	 					<table class="table table-striped table-bordered table-condensed table-hover" id="tabMetasProducto">
	 						<tr>
	 							<td><label for="producto">Producto</label></td>
	 							<td><label for="kilolitro">kilos/Litros</label></td>
	 							<td><label for="valor">Valor</label></td>
	 						
	 							
	 							<td colspan="2"><label for="accion">Accion</label></td>
	 						</tr>
	 						<tr class="fila-fija">

	 							<td><input type="text" class="form-control" name="txt_producto[]" id="txt_producto[]" placeholder="Producto"></td>
	 							<td><input type="number" class="form-control" name="txt_kilolitro[]" id="txt_kilolitro[]" placeholder="kilos/Litros"></td>
	 							<td><div id="valArray"><input type="number" class="form-control" name="txt_valor[]" id="txt_valor[]" placeholder="Valor" onkeyup=""></div></td>
	 							<td class="adicional"><input id="adicional" name="adicional" type="button" class="btn btn-warning" value="Más +"></td>
	 							<td class="eliminar"><input type="button"   class="btn btn-danger" value="Menos -"/></td>
	 						</tr>


	 					</table>
	 				</div>	
	 					<!--*******************************FIN TABLA**********************************-->
	 				<div class="table-responsive">	
	 					<table class="table table-striped table-bordered table-condensed table-hover">
	 						<tr>
	 							<td colspan="2" class="warning text-right"><h4>Suma en valor</h4></td>
	 							
	 							<td colspan="2"><input type="text" id="txt_sumvalor" class="form-control" readonly="readonly"></td>
	 							<!--*******************************bonton sumar**********************************-->

	 							<td ><input type="button" name="btn_sumar" id="btn_sumar" class="btn btn-primary" value="sumar" onclick="sumMetaProducto();"></td>

	 							<!--*******************************FIN boton sumar**********************************-->
	 						</tr>
	 						
	 						<tr>
	 						  <td colspan="5" class="success"><h3>Acciones Personalidas para aumentar la R.P.N. <small >(Propuestas para general valor agregado) </small></h3></td>
	 						</tr>
	 					</table>
	 				</div>
	 					<!--*******************************TABLA ACCIONES RPN ********************************-->
	 				<div class="table-responsive">	
	 					 <table class="table table-striped table-bordered table-condensed table-hover" id="tabrpn">					
	 				
	 					
	 					<tr>
	 						<td colspan="2"><label for="actividad">Acción</label></td>
	 						<td ><label for="actividad">Indicador de Logro de la acción</label></td>
	 						<td colspan="2"><label for="recursos">Recursos (tiempo, gente, dinero)</label></td>
	 						<td ><label for="actividad">Fecha</label></td>
	 						<td colspan="2">Accion</td>
	 					</tr>
	 					<tr class="fila-fija2">
	 						<td colspan="2"><input type="text" name="txt_accion[]" id="txt_accion[]" class="form-control"></td>
	 						<td ><input type="text" name="txt_indicadorLogro[]" id="txt_indicadorLogro[]" class="form-control"></td>
	 						<td colspan="2"><input type="text" name="txt_recursos[]" id="txt_recursos[]" class="form-control"></td>
	 						<td ><input type="date" name="dtp_fecha[]" id="dtp_fecha[]" class="form-control"></td>
	 						<td class="adicional2"><input id="adicional2" name="adicional" type="button" class="btn btn-warning" value="Más +"></td>
	 						<td class="eliminar2"><input type="button"   class="btn btn-danger" value="Menos -"/></td>
	 					</tr>

	 				</table>
	 			</div>
	 			<div class="table-responsive">
	 				<table class="table table-striped table-bordered table-condensed table-hover">
	 					
	 					<tr>
	 						<td colspan="6" class="success"><h3>Plan de visitas al cliente</h3></td>
	 					</tr>
	 					<tr>	
	 						<td><label for="numvisitas">Número de visitas</label></td>
	 						<td ><input type="text" name="txt_nvistas" id="txt_nvistas" class="form-control"></td>
	 						<td><label for="Frecuencia">Frecuencia</label></td>
	 						<td ><input type="text" name="txt_frecuencia" id="txt_frecuencia" class="form-control"></td>
	 						

	 					</tr>
	 					<tr>
	 						<td><label for="flimite">Fecha Limite para Lograrlo</label></td>
	 						<td ><input type="date" name="txt_flimite" id="txt_flimite" class="form-control"></td>
	 						<td><label for="responsable">Responsable</label></td>
	 						<td ><input type="text" name="txt_responsable" id="txt_responsable" class="form-control" readonly="readonly" value="'.$usuSesion.'"></td>
	 					</tr>

	 				</table>
	 				</dvi>
						

						<br>
						<input type="submit" class="btn btn-primary" name="insertar" value="Registrar"/>

					</form>';
					
*/

?>
