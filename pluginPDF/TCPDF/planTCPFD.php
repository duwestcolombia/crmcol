<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
require_once('conexionbd.php');



// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('David Zambrano');
$pdf->SetTitle('Plan de Negocio');
$pdf->SetSubject('Plane de negocio Duwest Colombia SAS');
//Estos keywords es para que genere busquedas en el navegador
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData('logo.png', '17', 'Formato Plan de negocio', 'Duwest Colombia SAS'.' '.'Nit: 900091949-8');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', '14'));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin('10');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example
$txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua assssssssssssssss sssssssssssssssa  aaaaaaaaaaaaaaaaaaaaaaaaa.';

$pdf->SetFillColor(255,255,255);
//$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(260,6,utf8_decode('Acciones personalizadas para generar valor agregado'),1,0,'C',1);
$pdf->SetFillColor(2,157,116);//Fondo verde de celda
$pdf->SetTextColor(240, 255, 240); //Letra color blanco
$pdf->Ln();
$pdf->Cell(50,6,utf8_decode('Acción:'),1,0,'C',1);
$pdf->Cell(60,6,'Indicador de logro:',1,0,'C',1);
$pdf->Cell(106,6,'Recursos:',1,0,'C',1);
$pdf->Cell(44,6,'Fecha:',1,0,'C',1);
$pdf->Ln();
//AQUI DEFINEN LA CANTIDAD DE COLUMNAS QUE VAN A REQUERIR.

$pdf->SetFillColor(229, 229, 229);
$pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
$bandera = false; //Para alternar el relleno
//$pdf->SetFont('Arial','B',10);

$consulTabAcciones=$db->query("SELECT pn.id_pnegocio, rpn.id_rpn, rpn.accion_rpn,rpn.indilogro_rpn,rpn.recursos_rpn,rpn.id_pnegocio,rpn.fecha_rpn
	FROM plan_negocio pn, rpn rpn
	WHERE rpn.id_pnegocio='55'
	
	GROUP BY rpn.id_rpn")or die("Error al cargar la tabla rpn: " . $db->error);


while ($resRpn=$consulTabAcciones->fetch_assoc()) {
	

//	$pdf->Cell(50,6,utf8_decode($resRpn['accion_rpn']),1,0,'C', $bandera);
	$pdf->MultiCell(30,6,utf8_decode($resRpn['accion_rpn']),1,"L", 1, 0, '', '', true);
//	$pdf->Cell(60,6,utf8_decode($resRpn['indilogro_rpn']),1,0,'C', $bandera);

	$pdf->MultiCell(30,6,utf8_decode($resRpn['indilogro_rpn']),1,'L', 1, 0, '', '', true);
//	$pdf->Cell(106,6,utf8_decode($resRpn['recursos_rpn']),1,0,'C', $bandera);
	$pdf->MultiCell(106,6,utf8_decode($resRpn['recursos_rpn']),1,'L', 1, 0, '', '', true);
//	$pdf->Cell(44,6,$resRpn['fecha_rpn'],1,0,'C',$bandera);
	$pdf->MultiCell(106,6,utf8_decode($resRpn['fecha_rpn']),1,'L', 1, 0, '', '', true);
	$pdf->Ln();
	$bandera = !$bandera;//Alterna el valor de la bandera
}

// Multicell test
//$pdf->MultiCell(55, 5, '[LEFT] '.$txt, 1, 'L', 1, 0, '', '', true);
/*$pdf->MultiCell(55, 5, '[RIGHT] '.$txt, 1, 'R', 0, 1, '', '', true);
$pdf->MultiCell(55, 5, '[CENTER] '.$txt, 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, '[JUSTIFY] '.$txt."\n", 1, 'J', 1, 2, '' ,'', true);
$pdf->MultiCell(55, 5, '[DEFAULT] '.$txt, 1, '', 0, 1, '', '', true);*/

//$pdf->Ln();
/*
// set color for background
$pdf->SetFillColor(220, 255, 220);

// Vertical alignment
$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - TOP] '.$txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'T');
$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - MIDDLE] '.$txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'M');
$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - BOTTOM] '.$txt, 1, 'J', 1, 1, '', '', true, 0, false, true, 40, 'B');

$pdf->Ln(4);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// set color for background
$pdf->SetFillColor(215, 235, 255);

// set some text for example
$txt = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.

Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.';

// print a blox of text using multicell()
$pdf->MultiCell(80, 5, $txt."\n", 1, 'J', 1, 1, '' ,'', true);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// AUTO-FITTING

// set color for background
$pdf->SetFillColor(255, 235, 235);

// Fit text on cell by reducing font size
$pdf->MultiCell(55, 60, '[FIT CELL] '.$txt."\n", 1, 'J', 1, 1, 125, 145, true, 0, false, true, 60, 'M', true);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// CUSTOM PADDING

// set color for background
$pdf->SetFillColor(255, 255, 215);

// set font
$pdf->SetFont('helvetica', '', 8);

// set cell padding
$pdf->setCellPaddings(2, 4, 6, 8);

$txt = "CUSTOM PADDING:\nLeft=2, Top=4, Right=6, Bottom=8\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue.\n";

$pdf->MultiCell(55, 5, $txt, 1, 'J', 1, 2, 125, 210, true);

// move pointer to last page
$pdf->lastPage();
*/
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_005.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+