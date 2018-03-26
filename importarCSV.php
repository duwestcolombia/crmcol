<?php 

require 'php/conexionbd.php';
//obtenemos el archivo .csv
$tipo = $_FILES['archivo']['type'];
 
$tamanio = $_FILES['archivo']['size'];
 
$archivotmp = $_FILES['archivo']['tmp_name'];
 
//cargamos el archivo
$lineas = file($archivotmp);
 
//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
$i=0;
 
//Recorremos el bucle para leer línea por línea
foreach ($lineas as $linea_num => $linea)
{ 
   //abrimos bucle
   /*si es diferente a 0 significa que no se encuentra en la primera línea 
   (con los títulos de las columnas) y por lo tanto puede leerla*/
   if($i != 0) 
   { 
       //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
       leyendo hasta que encuentre un ; */
       $datos = explode(";",$linea);
 
       //Almacenamos los datos que vamos leyendo en una variable
       $idcli = trim($datos[0]);
       $codcli = trim($datos[1]);
       $nomcli = trim($datos[2]);
       $tipcli = trim($datos[3]);
       $divcli = trim($datos[4]);
       $estacli = trim($datos[5]);
 
 		echo 'insert = '.$idcli.','.$codcli.',';
 		echo '<br>';
       //guardamos en base de datos la línea leida
       //mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$nombre','$edad','$profesion')");
 		$db->query("INSERT INTO cliente(id_cliente, cod_cliente, nom_cliente, tipo_cliente, division_cliente, estado_cliente) values('$idcli','$codcli','$nomcli','$tipcli','$divcli','$estacli')") or die($db->error);
       //cerramos condición
   }
 
   /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
   entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
   $i++;
   //cerramos bucle
}
//$db->close();
echo 'Cantidad de archivos ingresados, debe restar una fila correspondiente a los titulos '.$i;
 ?>