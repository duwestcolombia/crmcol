<?php
	include('conexion.php');
	
	$año = $_POST['año'];
	
	$enero = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=1 AND YEAR(fecha_venta)='$año'"));
	$febrero = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=2 AND YEAR(fecha_venta)='$año'"));
	$marzo = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=3 AND YEAR(fecha_venta)='$año'"));
	$abril = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=4 AND YEAR(fecha_venta)='$año'"));
	$mayo = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=5 AND YEAR(fecha_venta)='$año'"));
	$junio = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=6 AND YEAR(fecha_venta)='$año'"));
	$julio = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=7 AND YEAR(fecha_venta)='$año'"));
	$agosto = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=8 AND YEAR(fecha_venta)='$año'"));
	$septiembre = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=9 AND YEAR(fecha_venta)='$año'"));
	$octubre = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=10 AND YEAR(fecha_venta)='$año'"));
	$noviembre = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=11 AND YEAR(fecha_venta)='$año'"));
	$diciembre = mysql_fetch_array(mysql_query("SELECT SUM(monto_venta) AS r FROM ventas WHERE MONTH(fecha_venta)=12 AND YEAR(fecha_venta)='$año'"));
	
	$data = array(0 => round($enero['r'],1),
				  1 => round($febrero['r'],1),
				  2 => round($marzo['r'],1),
				  3 => round($abril['r'],1),
				  4 => round($mayo['r'],1),
				  5 => round($junio['r'],1),
				  6 => round($julio['r'],1),
				  7 => round($agosto['r'],1),
				  8 => round($septiembre['r'],1),
				  9 => round($octubre['r'],1),
				  10 => round($noviembre['r'],1),
				  11 => round($diciembre['r'],1)
				  );			 
	echo json_encode($data);
?>