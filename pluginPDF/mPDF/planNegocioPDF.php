<?php 
ob_start();
//Con la linea anterior ya puedo usar los headers online
session_start();
if(!$_SESSION)
{
  header("location:../../ingreso.php");
}

require 'plugin/mpdf.php';
require('../../php/conexionbd.php');

$cli=$_GET['cli'];
$cul=$_GET['cul'];



date_default_timezone_set("America/Bogota");
$hoy=date("Y-m-d");

if (isset($_GET['usu'])&& !empty($_GET['usu'])) {   

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

    

    //$numfil=mysql_num_rows($consulTab);
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



$header='
<div name="myHeader1">

  <table width="100%" style="vertical-align: bottom; font-family: arial; font-size: 16pt; margin-bottom: 1cm;">
      <tr>
        <td width="33%"><img style="vertical-align: top" src="../../img/logo.png" width="90" /></td>

        <td width="33%" align="center" >
        
        <div style="font-weight: bold;">Formato plan de negocio</div>
        <p style="font-size:12pt;">
        
        Duwest Colombia S.A.S.<br>    
        Nit: 900091949-8
        </p>

        </td>

        <td width="33%" style="text-align: right; "></td>

      </tr>
  </table>

</div>';





class PDF extends mPDF{


   /* function AcceptPageBreak(){
        
        $a='
    <h4 class="text-center">Acciones personalizadas para generar valor agregado</h4>
        <table align="center" class="table table-bordered table-striped">
                <tr>
                    <th>Acción</th>
                    <th>Indicador de logro</th>
                    <th>Recursos</th>
                    <th>Fecha</th>
                </tr>
           
        ';
        $this->AddPage('L','','','','',20,20,15,20,10,10);
         $this->WriteHTML($a);
         /*$this->Ln();*/
        /*$this->Ln(10);
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
        $this->SetFont('Arial','B',10);*/
    //}

    function Footer()
    {

        $html=('<div id="footer">
          <p>Las información contenida en este documento es confidencial, por lo tanto no podrá ser divulgada, trasmitida, copiada, comunicada, 
    adquirida o usada de ninguna forma sin la previa y expresa autorización de <strong>Duwest Colombia S.A.S.</strong>, 
    quien es su legítimo propietario.</p></div>');
        
        // Posición: a 1,5 cm del final
        $this->SetY(-25);
        
        $this->WriteHTML($html);
        $this->Ln();
        // Número de página
        $this->Cell(0,10,$this->PageNo().'/{nb}',0,0,'C');
        
       
    }

  

}




$mpdf = new mPDF();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','','','','',20,20,10,20,10,10);
//$pdf->SetHTMLHeaderByName('MyHeader1');
  
//$stylesheet = file_get_contents('bootstrap.min.css');
$stylesheet2 = file_get_contents('mpdfstyletables.css');
//$pdf->WriteHTML($stylesheet,1);
$pdf->SetTitle('Plan de negocio.php');
$pdf->SetAuthor($_SESSION['usuario_sesion']);

$pdf->WriteHTML($stylesheet2,1);
$pdf->WriteHTML($header);


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
   
   $html='
   <div id="tabcliente">
       <table class="table table-bordered table-striped">
           <tr>
               <th>Cliente </th>
               <th>Cultivo</th>
               <th># Cuadrante</th>
           </tr>
           <tr>
               <td>'.$nomCliente.'</td>
               <td>'.$nomCultivo.'</td>
               <td>'.$numCuadrante.'</td>
           </tr>
       </table>
       <br>
         
       
       <div id="tabparticipacion">
         <table class="table table-bordered table-striped">
             <tr>
                <td colspan="6"><h4 class="text-center">Porcentaje de participación</h4></td>
             </tr>
             <tr>
                 <th>Año</th>
                 <th>Hect. Sembradas</th>
                 <th>Val. P. Biologico</th>
                 <th>Tot. P.Biologico</th>
                 <th>Ventas Historicas</th>
                 <th>Meta de Ventas</th>
             </tr>
             <tr>
                 <td>'.$anio.'</td>
                 <td>'.$hecSem.'</td>
                 <td>'.$vPotBio.'</td>
                 <td>'.$totPBio.'</td>
                 <td>'.$vHisto.'</td>
                 <td>'.$metVentaIni.'</td>
             </tr>
             <tr>
                 <td>'.$anioFin.'</td>
                 <td>'.$hecSemFin.'</td>
                 <td>'.$vPotBioFin.'</td>
                 <td>'.$totPBioFin.'</td>
                 <td>'.$vHistoFin.'</td>
                 <td>'.$metVentaFin.'</td>
             </tr>
         </table>
        </div>
       <br>
       <div id="tabcustomer">
           <table align="center" >
               <tr>
                   <th>Año</th>
                   <th>Customer Share %</th>
               </tr>
               <tr>
                   <td>'.$anio.'</td>
                   <td>'.$partiIni.'</td>
               </tr>
               <tr>
                   <td>'.$anioFin.'</td>
                   <td>'.$partiFin.'</td>
               </tr>
           </table>
       </div>

       <br>
       
       
   </div>

   ';

   $tabresp='<div id="tabrpn">
       
           <table align="center">
                   <tr>
                     <td colspan="4"><h4 class="text-center">Plan de visitas al cliente</h4></td>
                   </tr>
                   <tr>
                       <th>Numero de Visitas</th>
                       <th>Frecuencia</th>
                       <th>Fecha limite para lograrlo</th>
                       <th>Responsable</th>
                   </tr>

                   <tr>
                      <td>'.$nvisitas.'</td>
                      <td>'.$frecuencia.'</td>
                      <td>'.$flimite.'</td>
                      <td>'.utf8_encode($resp).'</td>
                   </tr>
            </table>
          </div>
   ';

   
}
$pdf->WriteHTML($html,2);

$consulTabAcciones=$db->query("SELECT pn.id_pnegocio, rpn.id_rpn, rpn.accion_rpn,rpn.indilogro_rpn,rpn.recursos_rpn,rpn.id_pnegocio,rpn.fecha_rpn
        FROM plan_negocio pn, rpn rpn
        WHERE rpn.id_pnegocio=$idPnegocio
        GROUP BY rpn.id_rpn")or die("Error al cargar la tabla rpn: " . $db->error);


$headerAccion='<div id="tabrpn">
    
        <table align="center">
                <tr>
                  <td colspan="4"><h4 class="text-center">Acciones personalizadas para generar valor agregado</h4></td>
                </tr>
                <tr>
                    <th>Acción</th>
                    <th>Indicador de logro</th>
                    <th>Recursos</th>
                    <th>Fecha</th>
                </tr>
           
';
$pdf->WriteHTML($headerAccion,2);

while ($resRpn=$consulTabAcciones->fetch_assoc()) {

    // funcion wordwrap pone saltos de linea una vez se le define el limite sintaxys
    //wordwrap($texto que vamos a dividir,numero de caracteres que se divide,\n para saltar de linea, false o true en false deja la ultima palabra completa)
    $accion=wordwrap($resRpn['accion_rpn'], 8, "\n", false); 
    $indilogro=wordwrap($resRpn['indilogro_rpn'], 8, "\n", false);
    $recursos=wordwrap($resRpn['recursos_rpn'], 8, "\n", false);
    
    $htmlAccion='
           <tr>
               <td>'.$accion.'</td>
               <td>'.$indilogro.'</td>
               <td>'.$recursos.'</td>
               <td>'.$resRpn['fecha_rpn'].'</td>
           </tr>
    ';
      $pdf->WriteHTML($htmlAccion,2);
}



$footerAccion='</table> </div> <br>';




$pdf->WriteHTML($footerAccion,2);
$pdf->WriteHTML($tabresp,2);

$name='Plan Negocio '.$hoy.'.pdf';

$pdf->Output($name,'I');
$db->close();

exit;
ob_end_flush();
//Con esta linea ya puedo utilizar los headers
?>

