<?php
//$hoy =strftime( "%Y-%m-%d-%H-%M-%S", time() );//FECHA CON HORA 
//$hoy =strftime( "%Y-%m-%d", time() );
/*$hoy=date("d-m-Y H:i:s");
print_r($hoy);*/
date_default_timezone_set("America/Bogota");
$hoy=date("Y-m-d h:i:sa");
echo "The time is " . $hoy
?>