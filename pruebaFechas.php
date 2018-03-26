<?php 
$i=$_GET['fecha'];

$c=strtotime($i)*1000;
echo $c;

?>