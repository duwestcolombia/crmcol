<?php
ob_start();
//Con la linea anterior ya puedo usar los headers online
session_start();

if(!$_SESSION)
{
	header("location:../ingreso.php");
}
require('fpdf/fpdf.php');
//require('multicell.php');
require('../php/conexionbd.php');

$cli=$_GET['cli'];
$cul=$_GET['cul'];
//$usu=$_GET['usu'];



date_default_timezone_set("America/Bogota");
$hoy=date("Y-m-d");

class PDF extends FPDF
{
	

	function AcceptPageBreak(){
		$this->AddPage();
		$this->Ln(10);
		$this->SetFillColor(2,157,116);//Fondo verde de celda
		$this->SetTextColor(240, 255, 240); //Letra color blanco
		$this->SetFont('Arial','B',12);
		$this->Cell(60,6,utf8_decode('Acción:'),1,0,'C',1);
		$this->Cell(50,6,'Indicador de logro:',1,0,'C',1);
		$this->Cell(106,6,'Recursos:',1,0,'C',1);
		$this->Cell(44,6,'Fecha:',1,0,'C',1);
		$this->Ln();
		$this->SetFillColor(229, 229, 229);
		$this->SetTextColor(3, 3, 3); //Color del texto: Negro
		$bandera = false; //Para alternar el relleno
		$this->SetFont('Arial','B',10);
	}

	protected $B = 0;
	protected $I = 0;
	protected $U = 0;
	protected $HREF = '';

	function WriteHTML($html)
	{
	    // Intérprete de HTML
	    $html = str_replace("\n",' ',$html);
	    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
	    foreach($a as $i=>$e)
	    {
	        if($i%2==0)
	        {
	            // Text
	            if($this->HREF)
	                $this->PutLink($this->HREF,$e);
	            else
	                $this->Write(5,$e);
	        }
	        else
	        {
	            // Etiqueta
	            if($e[0]=='/')
	                $this->CloseTag(strtoupper(substr($e,1)));
	            else
	            {
	                // Extraer atributos
	                $a2 = explode(' ',$e);
	                $tag = strtoupper(array_shift($a2));
	                $attr = array();
	                foreach($a2 as $v)
	                {
	                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
	                        $attr[strtoupper($a3[1])] = $a3[2];
	                }
	                $this->OpenTag($tag,$attr);
	            }
	        }
	    }
	}


	function OpenTag($tag, $attr)
	{
	    // Etiqueta de apertura
	    if($tag=='B' || $tag=='I' || $tag=='U')
	        $this->SetStyle($tag,true);
	    if($tag=='A')
	        $this->HREF = $attr['HREF'];
	    if($tag=='BR')
	        $this->Ln(5);
	}

	function CloseTag($tag)
	{
	    // Etiqueta de cierre
	    if($tag=='B' || $tag=='I' || $tag=='U')
	        $this->SetStyle($tag,false);
	    if($tag=='A')
	        $this->HREF = '';
	}

	function SetStyle($tag, $enable)
	{
	    // Modificar estilo y escoger la fuente correspondiente
	    $this->$tag += ($enable ? 1 : -1);
	    $style = '';
	    foreach(array('B', 'I', 'U') as $s)
	    {
	        if($this->$s>0)
	            $style .= $s;
	    }
	    $this->SetFont('',$style);
	}


// Cabecera de página
function Header()
{
	
    // Logo
    //(Nom imagen, posicion en x, posicion en y, ancho, alto)
    $this->Image('../img/logo.png',10,10,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(100);
    // Título
    $this->Cell(50,10,'Formato plan de negocio',0,0,'C');
   
    // Salto de línea de 10 puntps
    $this->Ln(7);
    // Movernos a la derecha
    $this->Cell(100);
    // Título
    $this->SetFont('Arial','B',10);
    $this->Cell(50,10,'Duwest Colombia S.A.S.',0,0,'C');
    $this->Ln(7);
    $this->Cell(100);
    $this->Cell(50,10,'Nit: 900091949-8',0,0,'C');
    // Salto de línea de 10 puntps
    $this->Ln(10);
    

}


// Pie de página
function Footer()
{

	$html=utf8_decode('<p>La información contenida en este documento es confidencial, por lo tanto no podrá ser divulgada, trasmitida, copiada, comunicada, 
adquirida o usada de ninguna forma sin la previa y expresa autorización de <strong>Duwest Colombia S.A.S.</strong>, 
quien es su legítimo propietario.</p>');
	
    // Posición: a 1,5 cm del final
    $this->SetY(-20);
    // Arial italic 8
    $this->SetFont('Arial','B',8);
    $this->WriteHTML($html);
    $this->Ln();
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    
   
}



}

//Verifico si el campo usuario existe y esta lleno
//if (isset($usu) && !empty($usu)) {
if (isset($_GET['usu'])&& !empty($_GET['usu'])) {	
	//echo 'existo';
	$usu=$_GET['usu'];
	$consulTab=$db->query("SELECT pn.id_pnegocio, pn.id_cliente, pn.id_usuario, pn.ncuadrante_pnegocio, pn.id_cultivo, pn.anioini_pnegocio, pn.hecsemini_pnegocio, 
		pn.vpbiologicoini_pnegocio, pn.totpbiologicoini_pnegocio, pn.vhistoricasini_pnegocio, pn.aniofin_pnegocio, pn.hecsemfin_pnegocio, 
		pn.vpbiologicofin_pnegocio, pn.totpbiologicofin_pnegocio, pn.metaventatotalfin_pnegocio, pn.costumershareini_pnegocio, pn.costumersharefin_pnegocio,
		pn.numvisitas_pnegocio, pn.frecuencia_pnegocio, pn.flimite_pnegocio, pn.fregistro_pnegocio, pn.id_cultivo,c.id_cliente, c.nom_cliente, cul.id_cultivo,
		cul.nom_cultivo, u.id_usuario, u.nom_usuario
		FROM plan_negocio pn, rpn r, cliente c, cultivo cul, usuario u
		WHERE c.id_cliente='$cli'
		AND pn.id_cliente=c.id_cliente 
		AND cul.id_cultivo='$cul'
		AND pn.id_cultivo = cul.id_cultivo
		AND pn.id_usuario='$usu' 
		AND pn.id_usuario=u.id_usuario
		GROUP BY pn.id_pnegocio")or die("Error al cargar la tabla: " . $db->error);
}

//de lo contrario le paso el ususario de session
else
{
	
	$usu=$_SESSION['usuario_sesion'];
	$consulTab=$db->query("SELECT pn.id_pnegocio, pn.id_cliente, pn.id_usuario, pn.ncuadrante_pnegocio, pn.id_cultivo, pn.anioini_pnegocio, pn.hecsemini_pnegocio, 
		pn.vpbiologicoini_pnegocio, pn.totpbiologicoini_pnegocio, pn.vhistoricasini_pnegocio, pn.aniofin_pnegocio, pn.hecsemfin_pnegocio, 
		pn.vpbiologicofin_pnegocio, pn.totpbiologicofin_pnegocio, pn.metaventatotalfin_pnegocio, pn.costumershareini_pnegocio, pn.costumersharefin_pnegocio,
		pn.numvisitas_pnegocio, pn.frecuencia_pnegocio, pn.flimite_pnegocio, pn.fregistro_pnegocio, pn.id_cultivo,c.id_cliente, c.nom_cliente, cul.id_cultivo,
		cul.nom_cultivo, u.id_usuario, u.nom_usuario
		FROM plan_negocio pn, rpn r, cliente c, cultivo cul, usuario u
		WHERE c.id_cliente='$cli'
		AND pn.id_cliente=c.id_cliente 
		AND cul.id_cultivo='$cul'
		AND pn.id_cultivo = cul.id_cultivo
		AND pn.id_usuario='$usu' 
		AND pn.id_usuario=u.id_usuario
		GROUP BY pn.id_pnegocio")or die("Error al cargar la tabla: " . $db->error);
}

//--------------------------LAS CONSULTAS Y LAS TABLAS AQUI-------------------------------------------------------------



while ($res=$consulTab->fetch_assoc()) {
	$idPnegocio=$res['id_pnegocio'];

	$nomCliente=$res['nom_cliente'];
	$nomCultivo=$res['nom_cultivo'];
	$numCuadrante=$res['ncuadrante_pnegocio'];

	$anio=$res['anioini_pnegocio'];
	$hecSem=$res['hecsemini_pnegocio'];
	$vPotBio=$res['vpbiologicoini_pnegocio'];
	$totPBio=$res['totpbiologicoini_pnegocio'];
	$vHisto=$res['vhistoricasini_pnegocio'];
	$metVentaIni="-";

	

	$anioFin=$res['aniofin_pnegocio'];
	$hecSemFin=$res['hecsemfin_pnegocio'];
	$vPotBioFin=$res['vpbiologicofin_pnegocio'];
	$totPBioFin=$res['totpbiologicofin_pnegocio'];
	$vHistoFin="-";
	$metVentaFin=$res['metaventatotalfin_pnegocio'];

	$partiIni=$res['costumershareini_pnegocio'];
	$partiFin=$res['costumersharefin_pnegocio'];

	$nvisitas=$res['numvisitas_pnegocio'];
	$frecuencia=$res['frecuencia_pnegocio'];
	$flimite=$res['flimite_pnegocio'];
	$resp=$res['nom_usuario'];


}




//--- SE CREA UN OBJETO DE LA CLASE PARA CREAR LA TABLA-------------------------------------

	// Creación del objeto de la clase heredada P=Vertical, L=Horizontal
	$pdf = new PDF('L','mm','Letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	// Colores, ancho de línea y fuente en negrita
	$pdf->SetFillColor(184,184,184);
	//$pdf->SetTextColor(255);
	$pdf->SetDrawColor(0,0,0);
	$pdf->SetLineWidth(.3);
	$pdf->SetFont('','B');
	$pdf->SetFont('Arial','B',12);

	// Salto de línea de 10 puntps
	$pdf->Ln(10);
	//$pdf->Setx(15);
	$pdf->SetFillColor(2,157,116);//Fondo verde de celda
	$pdf->SetTextColor(240, 255, 240); //Letra color blanco
	$pdf->Cell(90,6,'Cliente:',1,0,'C',1);
	$pdf->Cell(50,6,'Cultivo:',1,0,'C',1);
	$pdf->Cell(50,6,'# Cuadrante:',1,0,'C',1);
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(184,184,184);
	$pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$pdf->Cell(90,6,$nomCliente,1,0,'C');
	$pdf->Cell(50,6,$nomCultivo,1,0,'C');
	$pdf->Cell(50,6,$numCuadrante,1,0,'C');

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',12);
	$pdf->Ln(15);
	$pdf->Cell(239,6,utf8_decode('Porcentaje de participación '),1,0,'C',1);

	$pdf->SetFillColor(2,157,116);//Fondo verde de celda
	$pdf->SetTextColor(240, 255, 240); //Letra color blanco
	$pdf->Ln();
	$pdf->Cell(20,6,utf8_decode('Año:'),1,0,'C',1);
	$pdf->Cell(40,6,'Hect. Sembradas:',1,0,'C',1);
	$pdf->Cell(44,6,'Val. P. Biologico:',1,0,'C',1);
	$pdf->Cell(44,6,'Tot. P. Biologico:',1,0,'C',1);
	$pdf->Cell(44,6,'Ventas historicas:',1,0,'C',1);
	$pdf->Cell(47,6,'Meta de Ventas:',1,0,'C',1);
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(184,184,184);
	$pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$pdf->Cell(20,6,$anio,1,0,'C');
	$pdf->Cell(40,6,$hecSem,1,0,'C');
	$pdf->Cell(44,6,$vPotBio,1,0,'C');
	$pdf->Cell(44,6,$totPBio,1,0,'C');
	$pdf->Cell(44,6,$vHisto,1,0,'C');
	$pdf->Cell(47,6,$metVentaIni,1,0,'C');
	$pdf->Ln();

	$pdf->Cell(20,6,$anioFin,1,0,'C');
	$pdf->Cell(40,6,$hecSemFin,1,0,'C');
	$pdf->Cell(44,6,$vPotBioFin,1,0,'C');
	$pdf->Cell(44,6,$totPBioFin,1,0,'C');
	$pdf->Cell(44,6,$vHistoFin,1,0,'C');
	$pdf->Cell(47,6,$metVentaFin,1,0,'C');

	$pdf->SetFillColor(255,255,0);
	$pdf->SetFont('Arial','B',12);
	$pdf->Ln(10);
	$pdf->Cell(100);
	$pdf->Cell(20,6,utf8_decode('Año:'),1,0,'C',1);
	$pdf->Cell(40,6,'Costumer Share %',1,0,'C',1);
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(100);
	$pdf->Cell(20,6,$anio,1,0,'C');
	$pdf->Cell(40,6,$partiIni,1,0,'C');
	$pdf->Ln();
	$pdf->Cell(100);
	$pdf->Cell(20,6,$anioFin,1,0,'C');
	$pdf->Cell(40,6,$partiFin,1,0,'C');

	
//------------------------------
//---Aqui tabla acciones

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',12);
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
	$pdf->SetFont('Arial','B',10);
	$consulTabAcciones=$db->query("SELECT pn.id_pnegocio, rpn.id_rpn, rpn.accion_rpn,rpn.indilogro_rpn,rpn.recursos_rpn,rpn.id_pnegocio,rpn.fecha_rpn
		FROM plan_negocio pn, rpn rpn
		WHERE rpn.id_pnegocio=$idPnegocio
		
		GROUP BY rpn.id_rpn")or die("Error al cargar la tabla rpn: " . $db->error);

	while ($resRpn=$consulTabAcciones->fetch_assoc()) {
		
	
		$pdf->Cell(50,6,utf8_decode($resRpn['accion_rpn']),1,0,'C', $bandera);
		//$pdf->MultiCell(30,6,utf8_decode($resRpn['accion_rpn']),1,"L",false);
		$pdf->Cell(60,6,utf8_decode($resRpn['indilogro_rpn']),1,0,'C', $bandera);

		//$pdf->MultiCell(30,6,utf8_decode($resRpn['indilogro_rpn']),1,'J');
		$pdf->Cell(106,6,utf8_decode($resRpn['recursos_rpn']),1,0,'C', $bandera);
		//$pdf->MultiCell(106,6,utf8_decode($resRpn['recursos_rpn']),1,'J');
		$pdf->Cell(44,6,$resRpn['fecha_rpn'],1,0,'C',$bandera);
		//$pdf->MultiCell(106,6,utf8_decode($resRpn['fecha_rpn']),1,'J');
		$pdf->Ln();
		$bandera = !$bandera;//Alterna el valor de la bandera
	}


//--------------------
//------------------------Aqui responsable


	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',12);
	$pdf->Ln(15);
	$pdf->Cell(260,6,utf8_decode('Plan de visitas al cliente'),1,0,'C',1);
	$pdf->SetFillColor(184,184,184);
	$pdf->Ln();
	$pdf->SetFillColor(2,157,116);//Fondo verde de celda
	$pdf->SetTextColor(240, 255, 240); //Letra color blanco
	$pdf->Cell(55,6,utf8_decode('Numero de visitas:'),1,0,'C',1);
	$pdf->Cell(55,6,utf8_decode('Frecuencia:'),1,0,'C',1);
	$pdf->Cell(80,6,'Fecha limite plan negocio:',1,0,'C',1);
	$pdf->Cell(70,6,'Responsable:',1,0,'C',1);
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
	$pdf->Cell(55,6,$nvisitas,1,0,'C');
	$pdf->Cell(55,6,$frecuencia,1,0,'C');
	$pdf->Cell(80,6,$flimite,1,0,'C');
	$pdf->Cell(70,6,$resp,1,0,'C');


//---------------------------------------	


	



$name='Plan Negocio '.$hoy.'.pdf';
//El parametro D=descargar, I= visualizar online.
$pdf->Output($name,'I');

$db->close();
ob_end_flush();
//Con esta linea ya puedo utilizar los headers
?>
