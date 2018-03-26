<?php 
session_start();
if(!$_SESSION)
{
    //header("location:../ingreso.php");
    echo "<script>location.href='../../../ingreso.php'</script>";
}
require('../controller/conexionbd.php');
require('../controller/conexionbdaudi.php');


//echo '<script>console.log('.$anio.')</script>';
if (empty($_POST['anio']) && isset($_POST['anio'])) {
	date_default_timezone_set("America/Bogota");
	$anio=date('Y');
	//echo $anio;
}
else
{
	$anio=$_POST['anio'];
}



//Consultamos mes a mes cuantos registros existen
$enero=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='1' and year(fecha_visita)='$anio'");
$febrero=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='2' and year(fecha_visita)='$anio'");
$marzo=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='3' and year(fecha_visita)='$anio'");
$abril=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='4' and year(fecha_visita)='$anio'");
$mayo=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='5' and year(fecha_visita)='$anio'");
$junio=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='6' and year(fecha_visita)='$anio'");
$julio=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='7' and year(fecha_visita)='$anio'");
$agosto=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='8' and year(fecha_visita)='$anio'");
$septiembre=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='9' and year(fecha_visita)='$anio'");
$octubre=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='10' and year(fecha_visita)='$anio'");
$noviembre=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='11' and year(fecha_visita)='$anio'");
$diciembre=$db->query("SELECT count(id_visita) as r from visita  where month(fecha_visita)='12' and year(fecha_visita)='$anio'");

$enerop=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='1' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$febrerop=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='2' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$marzop=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='3' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$abrilp=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='4' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$mayop=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='5' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$juniop=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='6' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$juliop=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='7' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$agostop=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='8' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$septiembrep=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='9' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$octubrep=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='10' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$noviembrep=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='11' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");
$diciembrep=$dbaudi->query("SELECT count(id) as rp from eventos  where month(freg_eventos)='12' and year(freg_eventos)='$anio' and tiporeg_eventos='r'");


$data = array(
	0 => $enero->fetch_assoc(),
	1 => $febrero->fetch_assoc(),
	2 => $marzo->fetch_assoc(),
	3 => $abril->fetch_assoc(),
	4 => $mayo->fetch_assoc(),
	5 => $junio->fetch_assoc(),
	6 => $julio->fetch_assoc(),
	7 => $agosto->fetch_assoc(),
	8 => $septiembre->fetch_assoc(),
	9 => $octubre->fetch_assoc(),
	10 => $noviembre->fetch_assoc(),
	11 => $diciembre->fetch_assoc(),
	
	12 => $enerop->fetch_assoc(),
	13 => $febrerop->fetch_assoc(),
	14 => $marzop->fetch_assoc(),
	15 => $abrilp->fetch_assoc(),
	16 => $mayop->fetch_assoc(),
	17 => $juniop->fetch_assoc(),
	18 => $juliop->fetch_assoc(),
	19 => $agostop->fetch_assoc(),
	20 => $septiembrep->fetch_assoc(),
	21 => $octubrep->fetch_assoc(),
	22 => $noviembrep->fetch_assoc(),
	23 => $diciembrep->fetch_assoc()
	);


echo json_encode($data,JSON_NUMERIC_CHECK);

$db->close();


?>